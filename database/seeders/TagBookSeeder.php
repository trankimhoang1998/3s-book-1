<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BookTag;
use Illuminate\Support\Facades\DB;

class TagBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_tag')->truncate();

        for($i = 1; $i <= 30; $i++){
            BookTag::insert([
                'book_id' => $i,
                'tag_id' => rand(1,10),
                ]
            );
        }
    }
}
