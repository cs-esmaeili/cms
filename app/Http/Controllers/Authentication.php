<?php

namespace App\Http\Controllers;

use App\Http\classes\G;
use App\Http\Requests\logIn;
use App\Http\Requests\logOut;
use App\Models\Permission;
use App\Models\Person;
use App\Models\Token;
use Illuminate\Routing\Route;

class Authentication extends Controller
{
    public function test()
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
    public function logIn(logIn $request)
    {
        $content =  json_decode($request->getContent());
        $person = Person::where('username', '=', G::changeWords($content->username))
            ->where('password', '=', G::getHash(G::changeWords($content->password)))->get();
        if ($person->count() == 1) {
            $person = $person[0];
            if ($person->status == 0) {
                return response(['status' => 'disabel'], 200);
            }
            $token = $person->token;
            $token = G::newToken($person->person_id, $token->token_id, 1)['token'];
            return response(['statusText' => 'ok', 'token' => $token, 'information' => $person->informations(), 'permissions' => $person->role->permissions()->select(['name'])->get()->toArray()], 200);
        }
        return response(['statusText' => 'fail'], 200);
    }

    public function logOut(logOut $request)
    {
        $content =  json_decode($request->getContent());
        $token = $content->token;
        Token::where('token', '=', $token)->update([
            'expiration' => G::timeNow(),
        ]);
        return response(['statusText' => 'ok'], 200);
    }
}
