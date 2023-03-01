<?php


namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface
{
    public function saveOrderData($data)
    {
        $order = new Order;
        $order->user_id = Auth::id() ? Auth::id() : null;
        $order->name = $data['name'];
        $order->address = $data['address'];
        $order->phone = $data['phone'];
        $order->facebook = $data['facebook'];

        if(isset($data['note'])) {
            $order->note = $data['note'];
        }

        $subTotal = 0;
        $total = 0;
        foreach ($data['currentCart'] as $item) {
            $subTotal += $item['price'] * $item['qty'];
        }
        $total = $subTotal + 35000;

        $order->sub_total = $subTotal;
        $order->total = $total;
        $order->save();

        $dataInsert = [];
        foreach ($data['currentCart'] as $item) {
            $dataInsert[] = [
                'order_id' => $order->id,
                'book_id' => $item['id'],
                'qty' => $item['qty'],
                'price' => $item['price'],
            ];
        }

        $order->details()->insert($dataInsert);

        return $order->fresh();
    }

    public function getAll()
    {
        return Order::all();
    }

    public function findOrder($id)
    {
        return Order::findOrFail($id);
    }

    public function getOrderByUserId($id)
    {
        return Order::where('user_id',$id)->get();
    }
}
