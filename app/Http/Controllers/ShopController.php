<?php

namespace App\Http\Controllers;

use App\Product;
use App\Product_Specs;
use App\Specification;
use App\Category;
use App\Review;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /*
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 12;
        $category = Category::get();
        $categories = Category::whereNull('parent_id')->get();



        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            $categoryName = optional($category->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::where('featured', true);
            $categoryName = '';
        }

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }

        return view('shop')->with([
            'products' => $products,
            'categories' => $categories,
            'category' => $category,
            'categoryName' => $categoryName

        ]);
    }

    /*
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $mightAlsoLike = Product::where('featured', true)->get();
        $category = Category::get();
        // $sku_number = Product::where('sku_number')->get();
        $categories = Category::whereNull('parent_id')->get();

        $product_specs = Product_Specs::where('product_id',$product->id)->get();
        foreach($product_specs as $product_spec){
            $specs[] = Specification:: where('id', $product_spec->specification_id)->get();
        }


        $pagination = 9;
        $category = Category::get();
        $categories = Category::whereNull('parent_id')->get();



        // if (request()->category) {
        //     $products = Product::with('categories')->whereHas('categories', function ($query) {
        //         $query->where('slug', request()->category);
        //     });
        //     //$categoryName = optional($categories->where('slug', request()->category)->first())->name;
        // } else {
        //     $products = Product::where('featured', true);
        //     //$categoryName = 'Featured';
        // }

        $stockLevel = getStockLevel($product->quantity);

        $reviews = $product->reviews()->where('product_id', $product->id)->get();

        return view('product')->with([
            'product' => $product,
            'products' => $mightAlsoLike,
            'stockLevel' => $stockLevel,
            'product_specs' => $product_specs,
            'specs'         => isset($specs)? $specs : '' ,
            'categories' => $categories,
            'category' => $category,
            'reviews' => $reviews,
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:2',
        ]);

        $q = $request->input('query');
        $category = Category::get();
        $categories = Category::whereNull('parent_id')->get();

        $terms = explode(" ",$request->input('query'));
            foreach($terms as $term){
                $array[] =  '%' . mb_strtoupper($term) . '%';
            }

            $products = Product::when(isset($q), function ($query) use ($array) {
                foreach($array as $term){
                    $query  ->where(\DB::raw('UPPER(name)'), 'LIKE', '%' . $term)
                            ->orWhere(\DB::raw('UPPER(details)'), 'LIKE', '%' . $term)
                            ->orWhere(\DB::raw('UPPER(description)'), 'LIKE', '%' . $term);


                }

            })->paginate(10); ;


        return view('search-results')->with([
            'products' => $products,
            'categories' => $categories,
            'category' => $category,
            ]);
    }


}
