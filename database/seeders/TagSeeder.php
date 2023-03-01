<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->truncate();

        for($i = 1; $i <= 12; $i++){
            Tag::insert([
                'name' => "Lớp"  . $i,
                'slug' => "lop-"  . $i,
                ]
            );
        }
    }
}
