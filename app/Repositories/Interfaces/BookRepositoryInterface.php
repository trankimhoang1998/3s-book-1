<?php

namespace App\Repositories\Interfaces;

interface BookRepositoryInterface
{
    public function getAll();

    public function saveBookData($data);

    public function getBooksByCategoryId($id);

    public function getBooksByTagId($id);

    public function getBookList($params);

    public function getBookFeatured();

    public function getBookById($id);
}
