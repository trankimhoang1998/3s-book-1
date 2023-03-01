<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\TagService;

class CheckoutController extends Controller
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
        $categories = $this->categoryService->getAll();
        return view('user.pages.checkout', compact('categories'));
    }
}
