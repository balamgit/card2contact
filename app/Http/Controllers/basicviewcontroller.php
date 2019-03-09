<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;

class basicviewcontroller extends Controller
{
    //
    public function dashboard(){
        return view('dashboard');
    }

}
