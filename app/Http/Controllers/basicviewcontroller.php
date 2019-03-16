<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contacts;

class basicviewcontroller extends Controller
{
    //
    public function dashboard(){
        $data=contacts::all();
        return view('dashboard')->with('data',$data);
    }

    public function upload(){
        return view('form');
    }

    public function store(Request $request){
        $c=new contacts();
        $c->name=$request->name;
        $c->phone1=$request->phone1;
        $c->phone2=$request->phone2;
        $c->mail1=$request->mail1;
        $c->address=$request->address;
    }

}
