<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;

class FrontendController extends Controller
{
    public function getHome()
    {
        $data['productlist']=Product::where('prod_feature',0)->orderBy('id','desc')->take(8)->get();
        $data['productnew']=Product::where('prod_status',1)->orderBy('id','desc')->take(8)->get();
        return view('frontend.home',$data);
    }

    public function getDetail($id)
    {
        $data['detail']=Product::find($id);
        $data['comment']=Comment::where('product_id',$id)->get();
        return view('frontend.details',$data);
    }

    public function getcategory($id)
    {
        $data['cate']=Category::find($id);
        $data['categori']=Product::where('prod_cate',$id)->orderBy('id','desc')->paginate(4);
        return view('frontend.category',$data);
    }


    public function postcomment(Request $req,$id)
    {
        $comment=new Comment;
        $comment->email=$req->email;
        $comment->name=$req->name;
        $comment->content=$req->content;
        $comment->product_id=$id;
        $comment->save();
        return back();
    }

    public function getsearch(Request $req)
    {
        $result=$req->result;
        $result=str_replace(' ','%',$result);
        $data['keyword']=$result;
        $data['items']=Product::where('prod_name','like','%'.$result.'%')->get();
        return view('frontend.search',$data);
    }
}