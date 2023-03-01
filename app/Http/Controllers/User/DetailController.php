<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\TagService;

class DetailController extends Controller
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

    public function show($id)
    {
        // $books = $this->bookService->getBookFeatured();
        $categories = $this->categoryService->getAll();
        $book = $this->bookService->getBookById($id);
        return view('user.pages.detail', compact('categories','book'));
    }
}
