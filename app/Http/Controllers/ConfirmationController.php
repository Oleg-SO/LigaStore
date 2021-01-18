<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::get();
        $categories = Category::whereNull('parent_id')->get();
        if (! session()->has('success_message')) {
            return redirect('/');
        }

        return view('thankyou')->with([
            'categories' => $categories,
            'category' => $category,
        ]);
    }
}
