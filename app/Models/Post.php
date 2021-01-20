<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $primaryKey = 'post_id';
    protected $guarded = ['post_id'];
    protected $fillable  = ['person_id', 'category_id', 'image', 'status', 'title', 'body', 'description', 'meta_keywords'];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'person_id');
    }
    public function category()
    {
        return $this->hasOne(Category::class, 'category_id', 'category_id');
    }
}
