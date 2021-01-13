<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'category_id';
    protected $fillable  = ['name', 'type', 'file_id' , 'parent_id'];

    public function file()
    {
        return $this->hasOne(File::class, 'file_id', 'file_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_id', 'category_id');
    }
}
