<?php

namespace App\Repositories\Interfaces;

interface OrderRepositoryInterface
{
    public function saveOrderData($data);

    public function getAll();

    public function findOrder($id);

    public function getOrderByUserId($id);
}
