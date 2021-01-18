<?php

namespace App\Http\Controllers;

use App\Product;
use App\Product_Specs;
use App\Specification;
use App\Category;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $products = Product::where('featured', true)->take(8)->inRandomOrder()->get();
    //     $category = Category::get();
    //     $categories = Category::whereNull('parent_id')->get();

    //     return view('landing-page')->with([
    //         'products', $products,
    //         'categories' => $categories,
    //         'category' => $category]);
    // }

    public function index()
    {
        $pagination = 1;
        $category = Category::get();
        $categories = Category::whereNull('parent_id')->get();
        $products = Product::where('featured', true)->take(8)->inRandomOrder()->get();



        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            //$categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::where('featured', true);
            //$categoryName = 'Featured';
        }

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }

        return view('landing-page')->with([
            'products' => $products,
            'categories' => $categories,
            'category' => $category,
        ]);
    }
}
