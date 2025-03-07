<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('categories')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        DB::table('categories')->insert([
            [
                'name' => 'Легкий',
            ],
            [
                'name' => 'Хрупкий',
            ],
            [
                'name' => 'Тяжелый',
            ],
        ]);
    }
}
