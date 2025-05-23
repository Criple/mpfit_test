<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => 'легкий',
        ]);
        DB::table('categories')->insert([
            'name' => 'хрупкий',
        ]);
        DB::table('categories')->insert([
            'name' => 'тяжелый',
        ]);
    }
}
