<?php

namespace App\Http\Controllers;

use App\Http\classes\G;
use  \App\Models\Post as MPost;
use Illuminate\Http\Request;

class Post extends Controller
{
    public function createPost(Request $request)
    {
        $person = G::getPersonFromToken($request->bearerToken());
        $content =  json_decode($request->getContent());

        $result = MPost::where('title', '=', $content->title)->get();
        if($result->count() != 0){
            return response(['statusText' => 'fail', 'message' => "عنوان باید منحصر به فرد باشد"], 200);
        }
        $result = MPost::create([
            'person_id' => $person->person_id,
            'category_id'  => $content->category_id,
            'image' => $content->image,
            'status' => $content->status,
            'title' => $content->title,
            'body' => $content->body,
            'description' => $content->description,
            'meta_keywords' => $content->meta_keywords,
        ]);
        if ($result->count() > 0) {
            return response(['statusText' => 'ok', 'message' => "مظلب اضافه شد"], 200);
        } else {
            return response(['statusText' => 'fail', 'message' => "مظلب اضافه نشد"], 200);
        }
    }
}
