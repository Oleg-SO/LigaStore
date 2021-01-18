<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $category = Category::get();
        $categories = Category::whereNull('parent_id')->get();
        $news = News:: get();



        return view('news')->with([
            'categories' => $categories,
            'category' => $category,
            'news' => $news
        ]);
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();

        return view('news')->with([
            'news' => $news
        ]);
    }

    public function blog(){
        $news = News::select(['id','title','excerpt','slug'])->get();
        return view('news')->with('news', $news);
     }
}
