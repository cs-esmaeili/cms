<?php

namespace App\Http\Controllers;

use App\Http\classes\FM;
use App\Http\classes\G;
use App\Http\classes\jdf;
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
        $oferPosts = [];
        $lastVideo = [];
        $lastScreenShots = [];
        $lastPictures = [];
        $lastPosts = Post::orderBy('post_id', 'desc')->take(6)->get();

        foreach ($result as $key => $value) {
            if (str_contains($value, '\"location\": 1')) {
                $silder[] = $value;
            } else if (str_contains($value, '\"location\": 2')) {
                $post_id = json_decode($value->value)->post_id;
                $posts[] = $post_id;
            } else if (str_contains($value, '\"location\": 3')) {
                $decode = json_decode($value->value);
                $lastVideo['url'] = $decode->url;
                $lastVideo['url_target'] = $decode->url_target;
            } else if (str_contains($value, '\"location\": 4')) {
                $post_id = json_decode($value->value)->post_id;
                $oferPosts[] = $post_id;
            } else if (str_contains($value, '\"location\": 5')) {
                $lastScreenShots[] = $value->value;
            } else if (str_contains($value, '\"location\": 6')) {
                $lastPictures[] = $value->value;
            }
        }
        $posts = Post::whereIn('post_id', $posts)->get();
        $oferPosts = Post::whereIn('post_id', $oferPosts)->get();
        for ($i = 0; $i < count($posts); $i++) {
            $temp = $posts[$i]->imageUrl;
            $temp = FM::getPublicFileLink($temp);
            $posts[$i]['image'] = $temp;
            unset($posts[$i]['imageUrl']);
            $temp =  $posts[$i]->category;
            unset($posts[$i]['category_id']);
            $posts[$i]['category'] = $temp;
            $posts[$i]['time'] = G::converToShamsi($posts[$i]['created_at']);
        }
        for ($i = 0; $i < count($oferPosts); $i++) {
            $temp = $oferPosts[$i]->imageUrl;
            $temp = FM::getPublicFileLink($temp);
            $oferPosts[$i]['image'] = $temp;
            unset($oferPosts[$i]['imageUrl']);
            $temp =  $oferPosts[$i]->category;
            unset($oferPosts[$i]['category_id']);
            $oferPosts[$i]['category'] = $temp;
            $oferPosts[$i]['time'] = G::converToShamsi($posts[$i]['created_at']);
        }


        $data = ['slider' => $silder, 'posts' => $posts, 'oferPosts' => $oferPosts, 'lastVideo' => $lastVideo, 'latestPosts' => $lastPosts, 'lastScreenShots' => $lastScreenShots, 'lastPictures' => $lastPictures];
        return view('contents.index', ['data' => $data]);
    }
}
