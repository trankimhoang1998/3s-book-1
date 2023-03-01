<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
            User::insert(
                [
                    [
                        'name' => "Midori",
                        'email' => "admin@gmail.com",
                        'password' => bcrypt("admin123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293022/avatar_1_aq40lu.jpg",
                        'role' => 1,
                    ],
                    [
                        'name' => "Thái Đức Phương",
                        'email' => "user1@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293962/avatar_17_kfoans.jpg",
                        'role' => 2,
                    ],
                    [
                        'name' => "Cấn Xuân Nam",
                        'email' => "user2@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293962/avatar_18_ucugbt.jpg",
                        'role' => 2,
                    ],
                    [
                        'name' => "Steven Being",
                        'email' => "user3@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293962/avatar_19_s4zt6t.jpg",
                        'role' => 2,
                    ],
                    [
                        'name' => "Starling",
                        'email' => "user4@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293962/avatar_2_ic1jcf.jpg",
                        'role' => 2,
                    ],
                    [
                        'name' => "dean.kyoto",
                        'email' => "user5@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293962/avatar_20_kowao2.jpg",
                        'role' => 2,
                    ],
                    [
                        'name' => "Rock Lee",
                        'email' => "user6@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293962/avatar_5_wj2luf.jpg",
                        'role' => 2,
                    ],
                    [
                        'name' => "thehavenblog",
                        'email' => "user7@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293962/avatar_6_i5bdtw.jpg",
                        'role' => 2,
                    ],
                    [
                        'name' => "The PsychNotes",
                        'email' => "user8@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293962/avatar_4_fjwrtg.jpg",
                        'role' => 2,
                    ],
                    [
                        'name' => "ngocblue",
                        'email' => "user9@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293022/avatar_1_aq40lu.jpg",
                        'role' => 2,
                    ],
                    [
                        'name' => "Gerard Do",
                        'email' => "user10@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293963/avatar_8_rg2jlh.jpg",
                        'role' => 2,
                    ],
                    [
                        'name' => "Tengaria",
                        'email' => "user11@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293962/avatar_7_mvhlzd.jpg",
                        'role' => 2,
                    ],
                    [
                        'name' => "Trường Sơn",
                        'email' => "user12@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293963/avatar_9_gdxk2g.jpg",
                        'role' => 2,
                    ],
                    [
                        'name' => "Ngô Vinh Data Coach",
                        'email' => "user13@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293963/avatar_11_qqyzwc.jpg",
                        'role' => 2,
                    ],
                    [
                        'name' => "Lâm Duệ Nghi",
                        'email' => "user14@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293963/avatar_10_mpgbgp.jpg",
                        'role' => 2,
                    ],
                    [
                        'name' => "Khánh Tập Đọc",
                        'email' => "user15@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293963/avatar_12_fbcp7f.jpg",
                        'role' => 2,
                    ],
                    [
                        'name' => ".Ngưn.",
                        'email' => "user16@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293963/avatar_14_bwb15y.jpg",
                        'role' => 2,
                    ],
                    [
                        'name' => "Chi Hoàng",
                        'email' => "user17@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293963/avatar_13_ighq6x.jpg",
                        'role' => 2,
                    ],
                    [
                        'name' => "Jun Nguyen",
                        'email' => "user18@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293963/avatar_15_znqbic.jpg",
                        'role' => 2,
                    ],
                    [
                        'name' => "Luangooner",
                        'email' => "user19@gmail.com",
                        'password' => bcrypt("user123"),
                        'avatar' => "https://res.cloudinary.com/dtwz8l8af/image/upload/v1667293964/avatar_16_nkyy7g.jpg",
                        'role' => 2,
                    ],
                ]
            );
    }
}
