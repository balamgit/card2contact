<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contacts;


class basicviewcontroller extends Controller
{
    //
    public function dashboard(){
        $data=contacts::where('user',session('user'))->get();
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
        $c->user=session('user');
        try{
            $c->save();
            session()->flash('mymsg','Successfully done!');
            return back();
        }
        catch (\Exception $exception){
            session()->flash('mymsg','Something went worng contact admin');
            return back();
        }

    }

    public function makecards($id){
        $c=contacts::find($id);

    }

}
