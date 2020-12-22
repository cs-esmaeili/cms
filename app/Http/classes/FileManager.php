<?php

namespace App\Http\classes;

use App\Models\File;
use App\Models\File_Person;
use App\Models\File_Token;
use App\Models\Token;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FileManager
{
    public static function location($key, $type, $params = null)
    {
        $baseDir = "";
        if ($type == "public") {
            $baseDir = env('FILE_MANAGER_BASE_PUBLIC_Directory');
        } else if ($type == "private") {
            $baseDir = env('FILE_MANAGER_BASE_PRIVATE_Directory');
        }
        $location  =   $baseDir . [
            'post' => "Images/Post/{post_id}/",
            'post_category' => "Images/Post_Category/",
            'main_category' => "Images/MainCategory/",
            'sub_category' => "Images/SubCategory/",
            'product' => "Images/Product/",
            'person' => "Images/Person/{person_id}/",
        ][$key];
        foreach ($params as $key => $value) {
            $location = str_replace('{' . $key . '}', $value, $location);
        }
        return $location;
    }
    public static function saveFile($request, $location, $uploadedKey, $type = "public", $file_id = null)
    {
        if (!file_exists($location) && !is_dir($location)) {
            mkdir($location,  0755, true);
        }
        $total = 0;
        if (is_array($request[$uploadedKey])) {
            $total = count($request[$uploadedKey]);
        }
        $result = DB::transaction(function () use ($total, $request, $location, $uploadedKey, $type, $file_id) {
            if ($total == 0) {
                $newName =  Str::uuid() . "." .  $request->file($uploadedKey)->getClientOriginalExtension();
                $result = move_uploaded_file($_FILES[$uploadedKey]['tmp_name'], $location . '/' . $newName);
                $hash = G::getHash($newName);
                if ($result) {
                    $file =  File::updateOrCreate(['file_id' => $file_id], [
                        "orginal_name" => $request->file($uploadedKey)->getClientOriginalName(),
                        "new_name" => $newName,
                        "hash" => $hash,
                        "location" => $location,
                        "type" => $type,
                    ]);
                    return $file['file_id'];
                } else {
                    return false;
                }
            } else {
                $output = [];
                for ($i = 0; $i < $total; $i++) {
                    $newName = Str::uuid() . "." .  $request->file($uploadedKey)[$i]->getClientOriginalExtension();
                    $result = move_uploaded_file($_FILES[$uploadedKey]['tmp_name'][$i], $location . '/' . $newName);
                    $hash = G::getHash($newName);
                    if ($result) {
                        $file = File::updateOrCreate(['file_id' => $file_id], [
                            "orginal_name" => $request->file($uploadedKey)[$i]->getClientOriginalName(),
                            "new_name" => $newName,
                            "hash" => $hash,
                            "location" => $location,
                            "type" => $type,
                        ]);
                        $output[] = $file['file_id'];
                    } else {
                        return false;
                    }
                }
                return $output;
            }
        });
        return $result;
    }

    public static function getFile($hash, $type, $token = null)
    {
        if ($type == "public") {
            if (file_exists($hash)) {
                return env('APP_URL') . substr($hash, strpos($hash, 'public') + 7)  . scandir($hash)[2];
            } else {
                return null;
            }
        } else if ($type == "private") {
            $person = G::getPersonFromToken($token);
            $file = $person->files()->where('hash', '=', $hash)->get();
            if ($file->count() == 1) {
                return $file[0];
            }
            return "";
        }
    }

    public  static function getFilePath($file)
    {
        if ($file == null)
            return null;
        return $file['location'] . $file['new_name'];
    }



    public  static function assignFileToUser($file_id, $person_id)
    {
        $result = File_Person::create([
            'file_id' => $file_id,
            'person_id' => $person_id,
        ]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public static function deleteDirectory($path)
    {
        $files = scandir($path);
        unset($files[0]);
        unset($files[1]);

        foreach ($files as $key => $value) {
            $result = File::where('new_name', '=', $value)->get();
            if ($result->count() == 1) {
                $result = $result[0]['file_id'];
                self::deleteFile($result);
            }
        }
        rmdir($path);
    }

    public static function renameDirectory($old, $new)
    {
        File::where('location', '=', $old . '/')->update([
            'location' => $new . '/',
        ]);
        rename($old, $new);
    }

    public static function deleteFile($file_id)
    {
        $result = File::where('file_id', '=', $file_id)->get();
        $path = null;
        if ($result->count() == 1) {
            $result = $result[0];
            $path =  $result['location'] . $result['new_name'] . "." . $result['extension'];

            $result = $result->delete();
            if (file_exists($path)) {
                if ($result) {
                    unlink($path);
                }
            }
        }
    }
    public static function replaceFile($file_id, $request, $location, $uploadedKey,  $type = "public")
    {
        $file = File::where('file_id', '=', $file_id)->get()[0];
        if ($file->count() == 1) {
            $status = self::saveFile($request, $location, $uploadedKey, $type, $file_id);
            if ($status != false) {
                unlink($file->location . $file->new_name);
                return true;
            }
        }
        return false;
    }
}
