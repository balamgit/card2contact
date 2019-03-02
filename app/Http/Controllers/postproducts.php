<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use Illuminate\Support\Facades\Storage;

class postproducts extends Controller
{
    //create or store new product
    public function store(Request $request){
        $product=new products();
        $product->product=$request->product;
        $product->price=$request->price;
        $product->uom=$request->uom;

        $file = $request->file('image');
        if (isset($file)){
            Storage::putFileAs('/public/products', $request->file('image'), $file->getClientOriginalName());
            $product->image = $file->getClientOriginalName();
        }
        try{
            $product->save();
            echo '<div class="alert alert-success">
                      <p>Successfully done!</p>
                     </div>';
        }
        catch (\Exception $e){
            echo '<div class="alert alert-danger">
                      <p>'.$e.'</p>
                     </div>';
        }

    }
    //store end

    //update or edit product
    public function update(Request $request){
        try{
            products::where('id',$request->ids)->update(array(
                'product'      => $request->product,
                'price'        => $request->price,
                'uom'          => $request->uom,
                'updated_at'   =>now()
            ));
            echo '<div class="alert alert-success">
                      <p>Successfully done!</p>
                     </div>';
        }
        catch (\Exception $e){
            echo '<div class="alert alert-danger">
                      <p>Something went wrong!</p>
                     </div>';
        }
    }//update end

    //delete data
    public function delete(Request $request){
        try{
           $product= products::find($request->ids);
            $product->delete();
            if(isset($product->image)){
                Storage::delete('/public/products/'.$product->image);
            }
            echo '<div class="alert alert-success">
                      <p>Successfully done!</p>
                     </div>';
        }
        catch (\Exception $e){
            echo '<div class="alert alert-danger">
                      <p>Something went wrong!</p>
                     </div>';
        }
    }//delete end

    //get edit data values
    public function getvalues(Request $request){
      $product=products::find($request->id);
      echo json_encode($product);
    }
}
