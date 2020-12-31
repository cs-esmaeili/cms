<?php

namespace App\Http\Controllers;

use App\Http\classes\FM;
use App\Http\classes\G;
use App\Http\Requests\saveFile;
use App\Http\Requests\saveFiles;
use App\Models\File;
use Illuminate\Http\Request;

class FileManager extends Controller
{
    public function saveFile(saveFile $request)
    {
        $location = FM::location($request->path, json_decode($request->params, true),  $request->type);
        $person = G::getPersonFromToken($request->bearerToken());
        $result = FM::saveFile($request->file('file'), $request->type, $location, $person->person_id);
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
            return response(['statusText' => 'ok', 'message' => "فایل(ها) ذخیره شد"], 200);
        } else {
            return response(['statusText' => 'fail', 'message' =>  "فایل(ها) ذخیره نشد"], 200);
        }
    }

    public function deleteFile(Request $request)
    {
        $content =  json_decode($request->getContent());
        $result = File::where('new_name', '=', $content->file_name)->get();
        if ($result->count() == 1) {
            $result = FM::deleteFile($result[0]);
            if ($result) {
                return response(['statusText' => 'ok', 'message' => "فایل حذف شد!"], 200);
            } else {
                return response(['statusText' => 'fail', 'message' => "فایل حذف نشد"], 200);
            }
        } else {
            return response(['statusText' => 'fail', 'message' => "فایل پیدا نشد"], 200);
        }
    }
    public function deleteFiles(Request $request)
    {
        $content =  json_decode($request->getContent());
        for ($i = 0; $i < count($content); $i++) {
            $result = File::where('new_name', '=', $content[$i])->get();
            if ($result->count() == 1) {
                $result = FM::deleteFile($result[0]);
                if ($result == false) {
                    return response(['statusText' => 'fail', 'message' => "فایل(ها) حذف نشد"], 200);
                }
            } else {
                return response(['statusText' => 'fail', 'message' => "فایل(ها) پیدا نشد"], 200);
            }
        }
        return response(['statusText' => 'ok', 'message' => "فایل(ها) حذف شد!"], 200);
    }

    public function deleteFolder(Request $request)
    {
        $content =  json_decode($request->getContent());
        $result = FM::deleteFolder($content->path);
    }
}
