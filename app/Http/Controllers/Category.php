<?php

namespace App\Http\Controllers;

use App\Models\Category as ModelsCategory;
use Illuminate\Http\Request;

class Category extends Controller
{
    public function categoryList(Request $request)
    {
        $all = ModelsCategory::all();
        $list = [];
        $indexs = [];
        for ($i = 0; $i < count($all); $i++) {

            $boolean = true;
            foreach ($indexs as $value) {
                if($all[$i]->category_id == $value){
                    $boolean = false;
                    break;
                }
            }
            if($boolean == false){
                continue;
            }
            $temp =  $this->categoryChilds($all[$i], $all);
            $indexs = $temp['indexs'];
            $list[] = $temp['category'];
        }
        return response(['statusText' => 'ok', "list" => $list], 200);
    }
    private function categoryChilds($category, $all)
    {
        $items = [];
        $indexs = [];
        for ($i = 0; $i < count($all); $i++) {
            if (($all[$i] != null && !is_array($all[$i])) && ($all[$i]->parent_id == $category->category_id)) {
                $indexs[] = $all[$i]->category_id;
                $result = $this->categoryChilds($all[$i], $all);
                $items[] = $result['category'];
            }
        }
        if (count($items) > 0) {
            $category = array($category, $items);
        }
        return ['category' => $category, 'indexs' => $indexs];
    }
}
