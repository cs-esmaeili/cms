<?php

namespace App\Http\Controllers;

use App\Http\classes\FM;
use App\Http\classes\G;
use App\Http\Requests\assignFileToUser;
use App\Http\Requests\deleteFile;
use App\Http\Requests\deleteFiles;
use App\Http\Requests\deleteFolder;
use App\Http\Requests\renameFolder;
use App\Http\Requests\saveFile;
use App\Http\Requests\saveFiles;
use App\Http\Requests\unAssignFileFromUser;
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
        $files = $request->file('file');

        $output = [];
        for ($i = 0; $i < count($files); $i++) {
            $result = FM::saveFile($files[$i], $request->type, $location, $person->person_id);
            $output[] = $result;
        }
        return response(['statusText' => 'ok', 'list' => $output, 'message' => "فایل(ها) ذخیره شد"], 200);
    }
    public function deleteFile(deleteFile $request)
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
    public function deleteFiles(deleteFiles $request)
    {
        $content =  json_decode($request->getContent());
        $content = $content->files;
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
    public function deleteFolder(deleteFolder $request)
    {
        $content =  json_decode($request->getContent());
        $location = FM::location($content->path, (array)  $content->params,  $content->type);
        $result = FM::deleteFolder($location);
        if ($result) {
            return response(['statusText' => 'ok', 'message' => "پوشه حذف شد"], 200);
        } else {
            return response(['statusText' => 'fail', 'message' => "پوشه حذف نشد"], 200);
        }
    }
    public function deleteFolderOrFile(Request $request)
    {
        # code...
    }
    public function assignFileToUser(assignFileToUser $request)
    {
        $content =  json_decode($request->getContent());
        $result = FM::assignFileToUser($content->file_id, $content->person_id);
        if ($result) {
            return response(['statusText' => 'ok', 'message' => "دسترسی فایل به شخص داده شد"], 200);
        } else {
            return response(['statusText' => 'fail', 'message' => "دسترسی فایل به شخص داده نشد"], 200);
        }
    }
    public function unAssignFileFromUser(unAssignFileFromUser $request)
    {
        $content =  json_decode($request->getContent());
        $result = FM::unAssignFileFromUser($content->file_id, $content->person_id);
        if ($result) {
            return response(['statusText' => 'ok', 'message' => "دسترسی شخص به فایل حذف شد"], 200);
        } else {
            return response(['statusText' => 'fail', 'message' => "دسترسی شخص به فایل حذف نشد"], 200);
        }
    }
    public function renameFolder(renameFolder $request)
    {
        $content =  json_decode($request->getContent());
        $result = FM::renameDirectory($content->old_name, $content->new_name);
        if ($result) {
            return response(['statusText' => 'ok', 'message' => "نام پوشه تغییر کرد"], 200);
        } else {
            return response(['statusText' => 'fail', 'message' => "نام پوشه تغییر نکرد"], 200);
        }
    }
    public function publicFolderFilesLinks(Request $request)
    {
        $content =  json_decode($request->getContent());
        $location = FM::location($content->path, (array) $content->params, 'public');
        $files = FM::folderFilesLinks($location, 'public');
        if ($files == false) {
            return response(['statusText' => 'fail'], 200);
        } else {
            return response(['statusText' => 'ok', "list" => $files], 200);
        }
    }
    public function publicFolderFiles(Request $request)
    {
        $content =  json_decode($request->getContent());
        $location = FM::location($content->path, [], 'public');
        $files = FM::files($location);
        if ($files === false) {
            return response(['statusText' => 'fail' , 'message' => "مسیر وجود ندارد"], 200);
        } else {
            return response(['statusText' => 'ok', "list" => array_values($files)], 200);
        }
    }
    public function privateFolderFilesLinks(Request $request)
    {
        $content =  json_decode($request->getContent());
        $location = FM::location($content->path, (array) $content->params, 'private');
        $files = FM::folderFilesLinks($location, $request->bearerToken());
        return $files;
    }
}
