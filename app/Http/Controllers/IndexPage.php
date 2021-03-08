<?php

namespace App\Http\Controllers;

use App\Http\classes\FM;
use App\Http\classes\G;
use App\Http\classes\View;
use App\Models\Key_Value;
use App\Models\Post;

class IndexPage extends Controller
{
    public function sliderImages()
    {
        $result = Key_Value::where('key', '=', 'indexPage')->where('value', 'LIKE', '%"location": 1%')->get();
        return response(['statusText' => 'ok', "list" => $result], 200);
    }
    public function popularPosts()
    {
        $result = Key_Value::where('key', '=', 'indexPage')->where('value', 'LIKE', '%"location": 2%')->get();
        return response(['statusText' => 'ok', "list" => $result], 200);
    }
    public function lastVideo()
    {
        $result = Key_Value::where('key', '=', 'indexPage')->where('value', 'LIKE', '%"location": 3%')->get();
        return response(['statusText' => 'ok', "list" => $result], 200);
    }
    public function top3Recent()
    {
        $result = Key_Value::where('key', '=', 'indexPage')->where('value', 'LIKE', '%"location": 4%')->get();
        return response(['statusText' => 'ok', "list" => $result], 200);
    }
    public function latestScreenshots()
    {
        $result = Key_Value::where('key', '=', 'indexPage')->where('value', 'LIKE', '%"location": 5%')->get();
        return response(['statusText' => 'ok', "list" => $result], 200);
    }
    public function latestPictures()
    {
        $result = Key_Value::where('key', '=', 'indexPage')->where('value', 'LIKE', '%"location": 6%')->get();
        return response(['statusText' => 'ok', "list" => $result], 200);
    }

    public function indexPageView()
    {
        $result = Key_Value::where('key', '=', 'indexPage')->get();

        $silder = [];
        $posts = [];
        $lastPictures = [];


        $lastPosts = Post::where('status', '=', 1)->orderBy('post_id', 'desc')->take(6)->get();
        foreach ($result as $key => $value) {
            if (str_contains($value, '\"location\": 1')) {
                $silder[] = $value;
            } else if (str_contains($value, '\"location\": 2')) {
                $post_id = json_decode($value->value)->post_id;
                $posts[] = $post_id;
            } else if (str_contains($value, '\"location\": 6')) {
                $lastPictures[] = $value->value;
            }
        }
        $posts = Post::whereIn('post_id', $posts)->where('status', '=', 1)->get();
        foreach ($posts as  $value) {
            $value->postFullData();
        }
        foreach ($lastPosts as  $value) {
            $value->postFullData();
        }
        $sidebar =  View::sideBar($result);
        $data = ['oferPosts' => $sidebar['oferPosts'], 'lastVideo' => $sidebar['lastVideo'],  'lastScreenShots' => $sidebar['lastScreenShots'], 'slider' => $silder, 'posts' => $posts, 'latestPosts' => $lastPosts, 'lastPictures' => $lastPictures];
        return view('pages.home', ['data' => $data]);
    }
}
