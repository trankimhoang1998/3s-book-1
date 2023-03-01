<?php

namespace App\Services;

use App\Repositories\Interfaces\BookRepositoryInterface;
use Illuminate\Support\Facades\DB;

class BookService
{
    private $bookRepositoryInterface;

    public function __construct(BookRepositoryInterface $bookRepositoryInterface)
    {
        $this->bookRepositoryInterface = $bookRepositoryInterface;
    }

    public function getAll()
    {
        return $this->bookRepositoryInterface->getAll();
    }

    public function saveBookData($data)
    {
        DB::beginTransaction();

        try {
            $result = $this->bookRepositoryInterface->saveBookData($data);
        } catch (Exception $e) {
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException("unable to add book data");
        }

        DB::commit();
        return $result;
    }

    public function getBooksByCategoryId($id)
    {
        return $this->bookRepositoryInterface->getBooksByCategoryId($id);
    }

    public function getBooksByTagId($id)
    {
        return $this->bookRepositoryInterface->getBooksByTagId($id);
    }

    public function getBookList($params)
    {
        return $this->bookRepositoryInterface->getBookList($params);
    }

    public function getBookFeatured()
    {
        return $this->bookRepositoryInterface->getBookFeatured();
    }

    public function getBookById($id)
    {
        return $this->bookRepositoryInterface->getBookById($id);
    }
}
