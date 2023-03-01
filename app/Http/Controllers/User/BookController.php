<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function index(Request $request)
    {
        // $categories = $this->categoryService->getAll();
        // $tags = $this->tagService->getAll();
        // if($request->category) {
        //     $books = $this->bookService->getBooksByCategoryId($request->category);
        // }
        // else if($request->tag) {
        //     $books = $this->bookService->getBooksByTagId($request->tag);
        // }else {
        //     $books = $this->bookService->getAll();
        // }
        $params = $request->all();
        $books = $this->bookService->getBookList($params);
        $categories = $this->categoryService->getAll();
        $tags = $this->tagService->getAll();
        return view('user.pages.books', compact('books','categories','tags'));
    }
}
