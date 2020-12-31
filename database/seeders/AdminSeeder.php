<?php

namespace Database\Seeders;

use App\Http\classes\G;
use App\Models\File;
use App\Models\Person;
use App\Models\PersonInfo;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $token = G::newToken(env('ADMIN_USERNAME'), 1)['token_id'];
        $obj = Person::create([
            'username' => env('ADMIN_USERNAME'),
            'password' => G::getHash(G::changeWords(env('ADMIN_PASSWORD'))),
            'token_id' => $token,
            'role_id' => 1,
            'status' => 1,
        ]);
        // $file = File::create([
        //     'orginal_name' => 'firstFile',
        //     'new_name' => '3aa77aae-bc9e-4e36-a00b-35b2027bfad0.jpg',
        //     'hash' => "",
        //     'location' => env('FILE_MANAGER_BASE_PUBLIC_Directory') . "Images/person/1/",
        //     'type' => "public"
        // ]);
        // PersonInfo::create([
        //     'person_id' => $obj->person_id,
        //     'file_id' => $file->file_id,
        //     'name' => env('ADMIN_NAME'),
        //     'family' => env('ADMIN_FAMILY'),
        //     'description' => "javad esmaeili is developer",
        // ]);
    }
}
