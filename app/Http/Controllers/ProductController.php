<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use DB;
class ProductController extends Controller
{
    public function getproduct()
    {
        $data['productlist']=DB::table('product')->join('vp_categoris','product.prod_cate','=','vp_categoris.cate_id')->orderBy('id','desc')->get();
        return view('backend.product',$data);
    }

    public function getaddproduct()
    {
        $data['catelists']=Category::all();
        return view('backend.addproduct', ['catelists' => $data['catelists'] ]);
    }

    public function postaddproduct(AddProductRequest $req)
    {
        $filename=$req->img->getClientOriginalName();
        $product=new Product;
        $product->prod_name=$req->name;
        $product->prod_slug=Str::slug($req->name);
        $product->prod_image=$filename;
        $product->prod_accessories=$req->accessories;
        $product->prod_price=$req->price;
        $product->prod_warranty=$req->warranty;
        $product->prod_promotion=$req->promotion;
        $product->prod_condition=$req->condition;
        $product->prod_status=$req->status;
        $product->prod_discription=$req->description;
        $product->prod_cate=$req->cate;
        $product->prod_feature=$req->featured;
        
        $product->save();
        $req->img->storeAs('avatar',$filename);
        return view('backend.addproduct');
    }

    public function geteditproduct($id)
    {
        $data['product']=Product::find($id);
        $data['catelist']=Category::all();
        return view('backend.editproduct',$data);
    }

    
    public function posteditproduct(Request $req,$id)
    {
        $products=new Product;
        $arr['prod_name']=$req->name;
        $arr['prod_slug']=Str::slug($req->name);
        $arr['prod_accessories']=$req->accessories;
        $arr['prod_price']=$req->price;
        $arr['prod_warranty']=$req->warranty;
        $arr['prod_promotion']=$req->promotion;
        $arr['prod_condition']=$req->condition;
        $arr['prod_status']=$req->status;
        $arr['prod_discription']=$req->description;
        $arr['prod_cate']=$req->cate;
        $arr['prod_feature']=$req->featured;
        if($req->hasFile('img'))
        {
            $img=$req->img->getClientOriginalName();
            $arr['prod_image']=$img;
            $req->img->storeAs('avatar'.$img);
        }
        $products::where('id',$id)->update($arr);
        return redirect('product');
    }

    
    public function getdeleteproduct($id)
    {
        Product::destroy($id);
        return back();
    }
}
