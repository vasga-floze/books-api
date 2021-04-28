<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Define number of records
        \App\Models\Book::factory()->count(50)->create();

    }
}
