<?php

namespace App\Http\Controllers;

use App\Models\Key_Value;
use Illuminate\Http\Request;

class IndexPage extends Controller
{
    public function sliderImages()
    {
        $result = Key_Value::where('key' , '=' , 'indexPage')->where('value' ,'LIKE' , '%"location": 1%')->get();
        return response(['statusText' => 'ok', "list" => $result], 200);
    }
}
