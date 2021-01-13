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
        for ($i = 0; $i < count($all); $i++) {
            $list[] = $this->categoryChilds($all[$i], $all);
        }
        return $list;
    }

    private function categoryChilds($category, $all)
    {
        $items = [];
        for ($i = 0; $i < count($all); $i++) {
            if (($all[$i] != null && !is_array($all[$i])) && ($all[$i]->parent_id == $category->category_id)) {
                $result = $this->categoryChilds($all[$i], $all);
                $items[] = $result;
            }
        }
        if (count($items) > 0) {
            $category = array($category, $items);
        }
        return $category;
    }
}
