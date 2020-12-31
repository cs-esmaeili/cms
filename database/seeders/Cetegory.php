<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class Cetegory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => "",
            'type' => "",
            'file_id' => "",
            'person_id' => "",
        ]);
    }
}
