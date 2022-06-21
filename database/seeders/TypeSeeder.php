<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            [
                'typename' => 'Truyện Dịch',
                'slug_typename' => 'truyen-dich',
                'status' => 0
            ],
            [
                'typename' => 'Truyện Sáng Tác',
                'slug_typename' => 'truyen-sang-tac',
                'status' => 0
            ]

        ]);
    }
}
