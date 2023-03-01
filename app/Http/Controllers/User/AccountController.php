<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use App\Services\BookService;
use App\Services\CategoryService;
use App\Services\TagService;
use App\Services\OrderService;

class AccountController extends Controller
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
        $id = Auth::id();
        $orders = $this->orderService->getOrderByUserId($id);
        return view('user.pages.account.index', compact('orders'));
    }

    public function show($id)
    {
        $order = $this->orderService->findOrder($id);
        return view('user.pages.account.order', compact('order'));
    }

    public function showInfo()
    {
        return view('user.pages.account.address');
    }

    public function updateInfo(Request $request)
    {
        $data = $request->only([
            'name',
            'address',
            'phone',
            'facebook',
        ]);

        //validator

        $validator = Validator::make($data, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'facebook' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/account/address')->with('error', 'Thay đổi thông tin không thành công');
        }

        $result = ['status' => 200];

        try {
            $user = User::findOrFail(Auth::id());
            $user->name = $data['name'];
            $user->address = $data['address'];
            $user->phone = $data['phone'];
            $user->facebook = $data['facebook'];
            $user->update();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage(),
            ];
        }

        return redirect('/account/address')->with('message','Thay đổi thông tin tài khoản thành công!');
    }
}
