<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::create(['name' => 'IT']);
        \App\Models\Category::create(['name' => 'Food']);
        \App\Models\Category::create(['name' => 'Auto']);
        \App\Models\Category::create(['name' => 'Sport']);
        \App\Models\Category::create(['name' => 'Medicine']);
        \App\Models\Category::create(['name' => 'Science']);
        \App\Models\Category::create(['name' => 'Media']);
        \App\Models\Category::create(['name' => 'Technology']);
        \App\Models\Category::create(['name' => 'Art']);
        \App\Models\Category::create(['name' => 'History']);
    }
}
