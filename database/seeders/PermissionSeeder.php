<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Route;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $text = Route::getRoutes()->get();
        foreach ($text as $route) {
            if (array_key_exists('as', $route->action)) {
                Permission::create([
                    'name' => $route->action['as'],
                ]);
            }
        }
    }
}
