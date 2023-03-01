<?php

namespace App\Services;

use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Support\Facades\DB;

class OrderService
{
    private $orderRepositoryInterface;

    public function __construct(OrderRepositoryInterface $orderRepositoryInterface)
    {
        $this->orderRepositoryInterface = $orderRepositoryInterface;
    }

    public function saveOrderData($data)
    {
        DB::beginTransaction();

        try {
            $result = $this->orderRepositoryInterface->saveOrderData($data);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("unable to add book data");
        }

        DB::commit();
        return $result;
    }

    public function getAll()
    {
        return $this->orderRepositoryInterface->getAll();
    }

    public function findOrder($id)
    {
        return $this->orderRepositoryInterface->findOrder($id);
    }

    public function getOrderByUserId($id)
    {
        return $this->orderRepositoryInterface->getOrderByUserId($id);
    }
}
