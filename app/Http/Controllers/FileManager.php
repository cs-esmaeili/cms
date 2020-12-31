<?php

namespace App\Http\Controllers;

use App\Http\classes\FM;
use App\Http\classes\G;
use App\Http\Requests\saveFile;
use App\Http\Requests\saveFiles;

class FileManager extends Controller
{
    public function saveFile(saveFile $request)
    {
        $location = FM::location($request->path, json_decode($request->params, true),  $request->type);
        $person = G::getPersonFromToken($request->bearerToken());
        $result = FM::saveFile($request->file('file'), $request->type, $location, $person->person_id);
        dd($result);
        if ($result != false) {
            return response(['statusText' => 'ok', 'message' => "فایل ذخیره شد"], 200);
        } else {
            return response(['statusText' => 'fail', 'message' => "فایل ذخیره نشد"], 200);
        }
    }
    public function saveFiles(saveFiles $request)
    {
        $location = FM::location($request->path, json_decode($request->params, true),  $request->type);
        $person = G::getPersonFromToken($request->bearerToken());
        $result = FM::saveFiles($request->file('file'), $request->type, $location, $person->person_id);
        if ($result != false) {
            return response(['statusText' => 'ok', 'message' => "فایل ذخیره شد"], 200);
        } else {
            return response(['statusText' => 'fail', 'message' => "فایل ذخیره نشد"], 200);
        }
    }
}
