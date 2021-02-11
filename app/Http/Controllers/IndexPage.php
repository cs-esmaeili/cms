<?php

namespace App\Http\Controllers;

use App\Models\Key_Value;

class IndexPage extends Controller
{
    public function sliderImages()
    {
        $result = Key_Value::where('key' , '=' , 'indexPage')->where('value' ,'LIKE' , '%"location": 1%')->get();
        return response(['statusText' => 'ok', "list" => $result], 200);
    }
    public function popularPosts()
    {
        $result = Key_Value::where('key' , '=' , 'indexPage')->where('value' ,'LIKE' , '%"location": 2%')->get();
        return response(['statusText' => 'ok', "list" => $result], 200);
    }
    public function lastVideo()
    {
        $result = Key_Value::where('key' , '=' , 'indexPage')->where('value' ,'LIKE' , '%"location": 3%')->get();
        return response(['statusText' => 'ok', "list" => $result], 200);
    }
    public function top3Recent()
    {
        $result = Key_Value::where('key' , '=' , 'indexPage')->where('value' ,'LIKE' , '%"location": 4%')->get();
        return response(['statusText' => 'ok', "list" => $result], 200);
    }
    public function latestScreenshots()
    {
        $result = Key_Value::where('key' , '=' , 'indexPage')->where('value' ,'LIKE' , '%"location": 5%')->get();
        return response(['statusText' => 'ok', "list" => $result], 200);
    }
    public function latestPictures()
    {
        $result = Key_Value::where('key' , '=' , 'indexPage')->where('value' ,'LIKE' , '%"location": 6%')->get();
        return response(['statusText' => 'ok', "list" => $result], 200);
    }
}
