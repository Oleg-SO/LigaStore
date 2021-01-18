<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Specification extends Model
{
    protected $guarded = [];

    protected $table = 'specifications';

    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    
}