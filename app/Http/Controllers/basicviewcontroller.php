<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;

class basicviewcontroller extends Controller
{
    //
    public function productview(){
        $products=products::all();
        return view('allproduct')->with('products',$products);
    }

    public function billformview(){
        return view('billing_views.billform');
    }
}
