<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function fetchCategory($type_id){
        $categories = Category::where('type_id', $type_id)->get();

        return response()->json(compact('categories'));
    }
}
