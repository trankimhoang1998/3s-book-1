<?php

namespace App\Http\Controllers\User;

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
        OrderService $orderService
    )
    {
        $this->bookService = $bookService;
        $this->categoryService = $categoryService;
        $this->tagService = $tagService;
        $this->orderService = $orderService;
    }

    public function store(Request $request) {
        $data = $request->only([
            'name',
            'address',
            'phone',
            'facebook',
            'currentCart',
        ]);

        //validator

        $validator = Validator::make($data, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'facebook' => 'required',
            'currentCart' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'failed']);
        }

        $result = ['status' => 200];

        try {
            $result['data'] = $this->orderService->saveOrderData($data);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage(),
            ];
        }
        return response()->json(['data' =>  $result['data'], 'message' => 'success']);
    }
}
