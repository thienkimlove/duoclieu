<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // \App\Position::truncate();

        \App\Position::create([
            'name' => 'Banner Trượt Trái'
        ]);
        \App\Position::create([
            'name' => 'Banner Trượt Phải'
        ]);
        // $this->call(UsersTableSeeder::class);
        \App\Position::create([
            'name' => 'Banner Slide Trang chủ Homepage'
        ]);

        \App\Position::create([
            'name' => 'Banner Slide Trang Trong'
        ]);

        \App\Position::create([
            'name' => 'Banner Duoc Pham'
        ]);

        \App\Position::create([
            'name' => 'Banner Trang Chi Tiet'
        ]);
    }
}
