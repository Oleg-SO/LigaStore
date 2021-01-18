<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $category = Category::get();
        $categories = Category::whereNull('parent_id')->get();
        
        return view('about')->with([
            'categories' => $categories,
            'category' => $category,
        ]);
    }
}