<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\TagService;
use App\Services\OrderService;

class OrderController extends Controller
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

    public function index()
    {
        $orders = $this->orderService->getAll();
        return view('admin.pages.order.index', compact('orders'));
    }

    public function show($id)
    {
        $order = $this->orderService->findOrder($id);
        return view('admin.pages.order.show', compact('order'));
    }
}
