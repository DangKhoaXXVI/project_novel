<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
                'categoryname' => 'Tình Cảm',
                'slug_category' => 'tinh-cam',
                'status' => 0
            ],
            
            [
                'categoryname' => 'Kinh Dị',
                'slug_category' => 'kinh-di',
                'status' => 0
            ],

            [
                'categoryname' => 'Hài Hước',
                'slug_category' => 'hai-huoc',
                'status' => 0
            ],

            [
                'categoryname' => 'Học Đường',
                'slug_category' => 'hoc-duong',
                'status' => 0
            ],
        ]);
    }
}
