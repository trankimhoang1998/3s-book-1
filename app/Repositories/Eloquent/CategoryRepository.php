<?php


namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function getAll()
    {
        return Category::where('parent_id',NULL)->get();
    }
}
