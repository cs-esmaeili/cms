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
        $latestPosts = [];
        foreach ($result as $key => $value) {
            if (str_contains($value, '\"location\": 1')) {
                $silder[] = $value;
            } else if (str_contains($value, '\"location\": 2')) {
                $post_id = json_decode($value->value)->post_id;
                $posts[] = $post_id;
            } else if (str_contains($value, '\"location\": 4')) {
                $post_id = json_decode($value->value)->post_id;
                $latestPosts[] = $post_id;
            }
        }

        $posts = Post::whereIn('post_id', $posts)->get();
        $latestPosts = Post::whereIn('post_id', $latestPosts)->get();
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
        for ($i = 0; $i < count($latestPosts); $i++) {
            $temp = $latestPosts[$i]->imageUrl;
            $temp = FM::getPublicFileLink($temp);
            $latestPosts[$i]['image'] = $temp;
            unset($latestPosts[$i]['imageUrl']);
            $temp =  $latestPosts[$i]->category;
            unset($latestPosts[$i]['category_id']);
            $latestPosts[$i]['category'] = $temp;
            $latestPosts[$i]['time'] = G::converToShamsi($posts[$i]['created_at']);
        }
        $data = ['slider' => $silder, 'posts' => $posts, 'latestPosts' => $latestPosts];
        return view('contents.index', ['data' => $data]);
    }
}
