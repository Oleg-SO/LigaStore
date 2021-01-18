<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use App\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{


    public function store(Request $request)
    {

        $user_name = User::where('id', auth()->id())->pluck('name');
        Review::create($request->all()+['user_id'=>auth()->id(), 'name' => $user_name[0]]);
        return back()->with($request->product_id);
    }




}
