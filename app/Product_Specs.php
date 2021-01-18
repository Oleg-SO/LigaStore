<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product_Specs extends Model
{
    protected $guarded = [];

    protected $table = 'product_specification';

    protected $fillable = ['product_id', 'specification_id','value'];

    
}