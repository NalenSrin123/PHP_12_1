<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class ProductController extends Controller
{
    //
    public function responeJson($status,$message,$data=null){
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
            $file->move('images',rand(1,1000).'_'.$filename);
            $input['image']=url('images/'.$filename);
        }
        $product=Product::create($input);
        if($product){
            return $this->responeJson(200,'Product Created Successfully',$product);
        }
    }
    public function deleteProduct(Product $product){
        $res=Product::query()->where('id',$product->id)->delete();
        if($res){
            return $this->responeJson(200,'Delete success',$res);
        }
    }
    public function updateProduct(Request $request, Product $product)
{
    $input = $request->all();

    if($request->hasFile('image')){
        $file=$request->file('image');
        $filename=$file->getClientOriginalName();
        $file->move('images',rand(1,1000).'_'.$filename);
        $input['image']=url('images/'.$filename);
    }

    $res = $product->update($input);

    if ($res) {
        return $this->responeJson(200, 'Updated successfully.', $product);
    }

    return $this->responeJson(400, 'Update failed.',$product);
}

}
