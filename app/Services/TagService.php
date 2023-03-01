<?php

namespace App\Services;

use App\Repositories\Interfaces\TagRepositoryInterface;

class TagService
{
    private $tagRepositoryInterface;

    public function __construct(TagRepositoryInterface $tagRepositoryInterface)
    {
        $this->tagRepositoryInterface = $tagRepositoryInterface;
    }

    public function getAll()
    {
        return $this->tagRepositoryInterface->getAll();
    }
}
