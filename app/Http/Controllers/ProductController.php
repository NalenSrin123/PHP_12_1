<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    //
    public function responeJson($status,$message,$data){
        return response()->json([
            'status'=>$status,
            'message'=>$message,
            'data'=>$data
        ]);
    }
    public function getAllProducts(){
        $product=Product::query()
                 ->orderBy('id','desc')->get();
         if($product->isEmpty()){
            return $this->responeJson(404,'Coming Soon',$product);
        }else{
            return $this->responeJson(200,'success',$product);
        }

    }
    public function getOneProducts(){
        $product=Product::query()
                 ->orderBy('id','desc')->limit(1)->get();
         if($product->isEmpty()){
            return $this->responeJson(404,'Coming Soon',$product);
        }else{
            return $this->responeJson(200,'success',$product);
        }
    }
    public function getLimitProduct($limit){
        $product=Product::query()
                 ->orderBy('id','desc')->limit($limit)->get();
        if($product->isEmpty()){
            return $this->responeJson(404,'not found',$product);
        }else{
            return $this->responeJson(200,'success',$product);
        }
    }
    public function addProduct(Request $request){
        $input=$request->all();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $filename=$file->getClientOriginalName();
            $file->move('images',$filename);
            $input['image']=url('images/'.$filename);
        }
        $product=Product::create($input);
        if($product){
            return $this->responeJson(200,'Product Created Successfully',$product);
        }
    }
}
