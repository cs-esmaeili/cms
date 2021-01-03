<?php

namespace App\Http\classes;

use App\Models\File;
use App\Models\File_Person;
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
            $hash = G::getHash($newName);

            $result = File::create([
                "orginal_name" => $file->getClientOriginalName(),
                "new_name" => $newName,
                "hash" => $hash,
                "location" => $location,
                "person_id" => $uploader,
                "type" => $type,
            ]);
            $file->move($location, $newName);
            return $result['file_id'];
        });
        return $result;
    }
    public static function deleteFile(File $file)
    {
        $result = DB::transaction(function () use ($file) {
            $path = null;
            $path =  $file['location'] . $file['new_name'];
            if (file_exists($path)) {
                $result = $file->delete();
                if ($result) {
                    unlink($path);
                    return true;
                } else {
                    return false;
                }
            }
            return false;
        });
        return $result;
    }
    public static function deleteFolder($location)
    {
        $result = DB::transaction(function () use ($location) {
            $files = self::files($location);
            foreach ($files as $key => $value) {
                if (is_dir($location . $value)) {
                    $result =  self::deleteFolder($location . $value);
                    if ($result == false) {
                        return false;
                    }
                } else {
                    $result = File::where('new_name', '=', $value)->get();
                    if ($result->count() == 1) {
                        $result = self::deleteFile($result[0]);
                        if ($result == false) {
                            return false;
                        }
                    } else {
                        return false;
                    }
                }
            }
            rmdir($location);
            return true;
        });
        return $result;
    }
    public static function files($location)
    {
        $files = scandir($location);
        unset($files[0]);
        unset($files[1]);
        return $files;
    }
    public static function folderFilesLinks($location, $token = null)
    {
        $files = self::files($location);
        $outfiles = [];
        foreach ($files as $key => $value) {
            $file = File::where('new_name', '=', $value)->get();
            if ($file->count() == 1) {
                $file = $file[0];
                if ($file->type == "public") {
                    $outfiles[] = env('APP_URL') . substr($location, strpos($location, 'files/')) . $value;
                } else if ($file->type == "private" || $token != null) {
                    $person = G::getPersonFromToken($token);
                    $file = $person->files()->where('new_name', '=', $value)->get();
                    if ($file->count() == 1) {
                        $outfiles[] = route('privateFile', ['hash' => $file[0]->hash]);
                    }
                }
            } else {
                return false;
            }
        }
        return $outfiles;
    }
    public static function getPublicFile($name)
    {
        $file = File::where('new_name', '=', $name)->where('type', '=', 'public')->get();
        if ($file->count() == 1) {
            return $file[0];
        }
        return false;
    }
    public static function getPrivateFile($hash, $token)
    {
        $person = G::getPersonFromToken($token);
        $file = $person->files()->where('hash', '=', $hash)->where('type', '=', 'private')->get();
        if ($file->count() == 1) {
            return $file[0];
        }
        return false;
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
        $result = DB::transaction(function () use ($old, $new) {
            File::where('location', '=', $old)->update([
                'location' => $new,
            ]);
            rename($old, $new);
            return true;
        });
        return $result;
    }
}
