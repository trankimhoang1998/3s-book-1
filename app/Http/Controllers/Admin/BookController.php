<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\TagService;

class BookController extends Controller
{

    private $bookService;
    private $categoryService;
    private $tagService;

    public function __construct(BookService $bookService, CategoryService $categoryService,TagService $tagService)
    {
        $this->bookService = $bookService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
    }

    public function index()
    {
        $books = $this->bookService->getAll();
        return view('admin.pages.book.index', compact('books'));
    }

    public function create()
    {
        $categories = $this->categoryService->getAll();
        $tags = $this->tagService->getAll();
        return view('admin.pages.book.create', compact('categories','tags'));
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'name',
            'image',
            'thumb_1',
            'thumb_2',
            'thumb_3',
            'thumb_4',
            'slug',
            'description',
            'code',
            'size',
            'price',
            'number_of_pages',
            'status',
            'category_id',
            'tag',
        ]);

        //validator

        $validator = Validator::make($data, [
            'name' => 'required',
            'image' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'code' => 'required',
            'size' => 'required',
            'price' => 'required',
            'number_of_pages' => 'required',
            'status' => 'required',
            'category_id' => 'required',
            'tag' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('books.create')->with('error', 'Thêm sách không thành công');
        }

        $result = ['status' => 200];

        try {
            $result['data'] = $this->bookService->saveBookData($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage(),
            ];
        }

        return redirect()->route('books.index')->with('message','Thêm sách thành công!');
    }
}
