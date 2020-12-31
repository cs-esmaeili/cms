<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'file';
    protected $primaryKey = 'file_id';
    protected $guarded = ['file_id'];
    protected $fillable  = ['orginal_name', 'new_name', 'hash',  'location', 'type'];

    public function persons()
    {
        return $this->belongsToMany(Person::class, 'file_person', 'file_id', 'person_id');
    }
}
