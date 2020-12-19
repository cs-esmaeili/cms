<?php

namespace App\Models;

use App\Http\classes\FileManager;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'person';
    protected $primaryKey = 'person_id';
    protected $hidden = ['pivot'];
    protected $fillable  = ['username', 'password',  'role_id', 'token_id', 'status'];

    public function factors()
    {
        return $this->hasMany(Factor::class, 'person_id', 'person_id');
    }

    public function personInfo()
    {
        return $this->hasOne(PersonInfo::class, 'person_id', 'person_id');
    }
    public function userCart()
    {
        return $this->hasMany(UserCart::class, 'person_id', 'person_id');
    }
    public function userJournal()
    {
        return $this->hasMany(UserJournal::class, 'person_id', 'person_id');
    }
    public function token()
    {
        return $this->hasOne(Token::class, 'token_id', 'token_id');
    }
    public function role()
    {
        return $this->hasOne(Role::class, 'role_id', 'role_id');
    }
    public function files()
    {
        return $this->belongsToMany(File::class, 'file_person', 'person_id', 'file_id');
    }

    public function informations()
    {
        $personinfo = $this->personInfo;
        if ($personinfo != null) {
            return [
                'person_id' => $this->person_id,
                'username' => $this->username,
                'name' => $personinfo->name,
                'family' => $personinfo->family,
                'role' => $this->role->name,
                'role_id' => $this->role->role_id,
                'description' => $personinfo->description,
                'image' => FileManager::getFile(FileManager::location('person', 'public', ['person_id' => $this->person_id]), 'public'),
            ];
        }else{
            // return $this;
        }

    }
}
