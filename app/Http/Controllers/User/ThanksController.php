<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\TagService;
use App\Services\OrderService;

class ThanksController extends Controller
{

    private $bookService;
    private $categoryService;
    private $tagService;
    private $orderService;

    public function __construct(
        BookService $bookService,
        CategoryService $categoryService,
        TagService $tagService,
        OrderService $orderService,
    )
    {
        $this->bookService = $bookService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
        $this->orderService = $orderService;
    }

    public function show($id)
    {
        $order = $this->orderService->findOrder($id);
        return view('user.pages.thanks', compact('order'));
    }
}
