<?php


namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\TagRepositoryInterface;
use App\Models\Tag;

class TagRepository implements TagRepositoryInterface
{

    public function getAll()
    {
        return Tag::all();
    }
}
