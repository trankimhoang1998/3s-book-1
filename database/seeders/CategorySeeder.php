<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        Category::insert([
            [
                'name' => "Lớp 1",
                'slug' => "lop-1",
                'parent_id' => null,
            ],
            [
                'name' => "Lớp 2",
                'slug' => "lop-2",
                'parent_id' => null,
            ],
            [
                'name' => "Lớp 3",
                'slug' => "lop-3",
                'parent_id' => null,
            ],
            [
                'name' => "Lớp 4",
                'slug' => "lop-4",
                'parent_id' => null,
            ],
            [
                'name' => "Lớp 5",
                'slug' => "lop-5",
                'parent_id' => null,
            ],
            [
                'name' => "Lớp 6",
                'slug' => "lop-6",
                'parent_id' => null,
            ],
            [
                'name' => "Lớp 7",
                'slug' => "lop-7",
                'parent_id' => null,
            ],
            [
                'name' => "Lớp 8",
                'slug' => "lop-8",
                'parent_id' => null,
            ],
            [
                'name' => "Lớp 9",
                'slug' => "lop-9",
                'parent_id' => null,
            ],
            [
                'name' => "Lớp 10",
                'slug' => "lop-10",
                'parent_id' => null,
            ],
            [
                'name' => "Lớp 11",
                'slug' => "lop-11",
                'parent_id' => null,
            ],
            [
                'name' => "Lớp 12",
                'slug' => "lop-12",
                'parent_id' => null,
            ],
           ]
         );
    }
}
