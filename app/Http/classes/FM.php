<?php

namespace App\Http\classes;

use App\Models\File;
use App\Models\File_Person;
use App\Models\File_Token;
use App\Models\FileLocation;
use App\Models\Token;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FM
{
    public static function location($key, $params, $type)
    {
        $baseDir = "";
        if ($type == "public") {
            $baseDir = env('FILE_MANAGER_BASE_PUBLIC_Directory');
        } else if ($type == "private") {
            $baseDir = env('FILE_MANAGER_BASE_PRIVATE_Directory');
        }
        $templates = [
            'post' => "Images/Post/{post_id}/",
        ];
        $location  =   $baseDir;
        if (array_key_exists($key, $templates)) {
            $location  .= $templates[$key];
        } else {
            $location .= $key;
        }

        foreach ($params as $key => $value) {
            $location = str_replace('{' . $key . '}', $value, $location);
        }
        return $location;
    }

    public static function saveFile($file, $type, $location, $uploader)
    {

        if (!file_exists($location) && !is_dir($location)) {
            mkdir($location,  0755, true);
        }
        $result = DB::transaction(function () use ($file, $type, $location, $uploader) {
            $newName =  Str::uuid() . "." .  $file->getClientOriginalExtension();
            $result = $file->move($location, $newName);
            $hash = G::getHash($newName);
            if ($result) {
                $file =  File::create([
                    "orginal_name" => $file->getClientOriginalName(),
                    "new_name" => $newName,
                    "hash" => $hash,
                    "location" => $location,
                    "person_id" => $uploader,
                    "type" => $type,
                ]);
                return $file['file_id'];
            } else {
                return false;
            }
        });
        return $result;
    }
    public static function saveFiles($files, $type, $location, $uploader)
    {
        if (!file_exists($location) && !is_dir($location)) {
            mkdir($location,  0755, true);
        }
        $output = [];
        for ($i = 0; $i < count($files); $i++) {
            $newName = Str::uuid() . "." .  $files[$i]->getClientOriginalExtension();
            $result =  $files[$i]->move($location, $newName);
            $hash = G::getHash($newName);
            if ($result) {
                $file = File::create([
                    "orginal_name" => $files[$i]->getClientOriginalName(),
                    "new_name" => $newName,
                    "hash" => $hash,
                    "location" => $location,
                    "person_id" => $uploader,
                    "type" => $type,
                ]);
                $output[] = $file['file_id'];
            } else {
                return false;
            }
        }
        return $output;
    }
    public static function deleteFolder($location)
    {
        $files = self::files($location);

        foreach ($files as $key => $value) {
            $result = File::where('new_name', '=', $value)->get();
            if ($result->count() == 1) {
                self::deleteFile($result[0]);
            }
        }
        rmdir($location);
    }
    public static function deleteFile(File $file)
    {
        $path = null;
        $path =  $file['location'] . $file['new_name'];
        $result = $file->delete();
        if (file_exists($path) && $result) {
            unlink($path);
            return true;
        }
        return false;
    }

    public static function files($location)
    {
        $files = scandir($location);
        unset($files[0]);
        unset($files[1]);
        return $files;
    }
    public static function folderFilesLinks($location)
    {
    }

    public static function linkGenerator($file_id)
    {
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
    public  static function unAssignFileFromUser($file_id, $person_id)
    {
        $result = File_Person::where('file_id', '=', $file_id)->where('person_id', '=', $person_id)->delete();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public static function renameDirectory($old, $new)
    {
        File::where('location', '=', $old . '/')->update([
            'location' => $new . '/',
        ]);
        rename($old, $new);
    }
    public static function replaceFile($file_id, $request, $location, $uploadedKey,  $type)
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
