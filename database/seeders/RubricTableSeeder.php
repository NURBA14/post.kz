<?php

namespace Database\Seeders;

use App\Rubric;
use Illuminate\Database\Seeder;

class RubricTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rubric::factory()->count(20)->create();
    }
}
