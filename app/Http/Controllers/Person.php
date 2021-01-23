<?php

namespace App\Http\Controllers;

use App\Http\classes\FileManager;
use App\Http\classes\FM;
use App\Http\classes\G;
use App\Http\Requests\addPermission;
use App\Http\Requests\addRole;
use App\Http\Requests\createPerson;
use App\Http\Requests\deletePermission;
use App\Http\Requests\deleteRole;
use App\Http\Requests\editPerson;
use App\Http\Requests\editRole;
use App\Http\Requests\missingPermissionss;
use App\Http\Requests\permissions;
use App\Http\Requests\rolePermissions;
use App\Models\File;
use App\Models\Permission;
use App\Models\Person as ModelsPerson;
use App\Models\PersonInfo;
use App\Models\Role;
use App\Models\Role_Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Person extends Controller
{
    public function personProfile(Request $request)
    {
        $person = G::getPersonFromToken($request->bearerToken());
        $permission = $person->role->permissions()->select(['name'])->get()->toArray();
        $permission_new = [];
        foreach ($permission as $value) {
            $permission_new[] = $value['name'];
        }
        return response(['statusText' => 'ok', 'information' => $person->informations(), 'permissions' => $permission_new], 200);
    }
    public function admins()
    {
        $persons = ModelsPerson::all();
        $admins = collect();
        foreach ($persons as $person) {
            if (strpos($person->role->name, 'Admin') !== false) {
                $admins->push($person->informations());
            }
        }
        return response(['statusText' => 'ok', "list" => $admins], 200);
    }

    public function adminRoles()
    {
        $roles = Role::where('name', 'LIKE', "%Admin%")->get(['name', 'role_id']);
        return response(['statusText' => 'ok', "list" => $roles], 200);
    }

    public function roles()
    {
        $roles = Role::all(['name', 'role_id']);
        return response(['statusText' => 'ok', "list" => $roles], 200);
    }
    public function rolePermissions(rolePermissions $request)
    {
        $content =  json_decode($request->getContent());
        $permissions = Role::where('role_id', '=', $content->role_id)->get()[0]->permissions;
        return response(['statusText' => 'ok', "list" => $permissions], 200);
    }
    public function missingPermissions(missingPermissionss $request)
    {
        $content =  json_decode($request->getContent());
        $permissions = Role::where('role_id', '=', $content->role_id)->get();
        if ($permissions->count() > 0) {
            $permissions = $permissions[0]->permissions()->get(['permission.permission_id'])->toArray();
            $outPermissions = [];
            foreach ($permissions as $key => $value) {
                $outPermissions[] = $value['permission_id'];
            }
            $miss =  Permission::whereNotIn('permission_id', $outPermissions)->get();
            return response(['statusText' => 'ok', "list" => $miss], 200);
        } else {
            return response(['statusText' => 'ok', "list" => null], 200);
        }
    }

    public function addRole(addRole $request)
    {
        $content =  json_decode($request->getContent());
        Role::create([
            'name' => $content->name,
        ]);
        return response(['statusText' => 'ok', 'message' => "نقش ساخته شد"], 200);
    }
    public function deleteRole(deleteRole $request)
    {
        $content =  json_decode($request->getContent());
        ModelsPerson::where('role_id', '=', $content->role_id)->update(['role_id' => $content->new_role_id]);
        $result = Role::where('role_id', '=', $content->role_id)->delete();
        return response(['statusText' => 'ok', "message" => 'نقش مورد نظر حذف شد'], 200);
    }
    public function editRole(editRole $request)
    {
        $content =  json_decode($request->getContent());
        Role::where('role_id', '=',  $content->role_id)->update([
            'name' => $content->name,
        ]);
        return response(['statusText' => 'ok'], 200);
    }

    public function addPermission(addPermission $request)
    {
        $content =  json_decode($request->getContent());
        Role_Permission::create([
            'role_id' => $content->role_id,
            'permission_id' => $content->permission_id,
        ]);
        return response(['statusText' => 'ok', 'message' => "دسترسی اضافه شد"], 200);
    }

    public function deletePermission(deletePermission $request)
    {
        $content =  json_decode($request->getContent());
        Role_Permission::where('role_id', '=', $content->role_id)->where('permission_id', '=', $content->permission_id)->delete();
        return response(['statusText' => 'ok', 'message' => "دسترسی حذف شد"], 200);
    }

    public function createPerson(createPerson $request)
    {
        $search = ModelsPerson::where('username', '=', G::changeWords($request->username))->get();
        if ($search->count() != 0) {
            return response(['statusText' => 'fail', 'message' => "نام کاربری باید منحصر به فرد باشد"], 406);
        } else {
            $result =  DB::transaction(function () use ($request) {
                $token_id = G::newToken($request->username)['token_id'];
                $person = ModelsPerson::create([
                    'username' => G::changeWords($request->username),
                    'password' => G::getHash(G::changeWords($request->password)),
                    'role_id' => $request->role_id,
                    'token_id' => $token_id,
                    'status' => 1,
                ]);
                $location = FM::location('person', ['person_id' => $person->person_id],  'public');
                $file_id = FM::saveFile($request->file('image'), 'public', $location, $person->person_id);
                PersonInfo::create([
                    'file_id' => $file_id,
                    'person_id' => $person->person_id,
                    'name' => $request->name,
                    'family' => $request->family,
                    'description' => $request->description,
                ]);
                return response(['statusText' => 'ok', 'message' => "حساب ساخته شد"], 201);
            });
            return $result;
        }
    }

    public function editPerson(editPerson $request)
    {
        $search = ModelsPerson::where('person_id', '=', $request->person_id)->get();
        if ($search->count() == 0) {
            return response(['statusText' => 'fail', 'message' => "کار بر یافت نشد"], 406);
        } else {
            $data = collect($request->request)->toArray();
            $temp = null;
            if (array_key_exists('password', $data)) {
                $token_id = G::newToken($request->person_id, $search[0]->token->token_id)['token_id'];
                $temp = ['token_id' => $token_id, 'password' => G::getHash($data['password'])];
            }
            $search[0]->update(G::getArrayItems($data, (new ModelsPerson)->getFillable(), $temp));
            $search[0]->personInfo()->update(G::getArrayItems($data, (new PersonInfo)->getFillable()));


            if ($request->hasFile('image')) {
                $file = $search[0]->personInfo->file;

                $location = FM::location('person', ['person_id' => $request->person_id],  'public');
                $file_id = FM::saveFile($request->file('image'), 'public', $location, $request->person_id);
                PersonInfo::where('person_info_id', '=', $search[0]->personInfo->person_info_id)->update([
                    'file_id' => $file_id
                ]);
                FM::deleteFile($file);
            }
            return response(['statusText' => 'ok', 'message' => "تغییرات ذخیره شد"], 201);
        }
    }
}
