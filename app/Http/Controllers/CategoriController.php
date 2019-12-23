<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Http\Requests\AddRequest;
use App\Http\Requests\EditcateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriController extends Controller
{
    public function getcate()
    {
        $data['catelist']=Category::all();
        return view('backend.category',$data);
    }

    public function postcate(AddRequest $req)
    {
        $category=new Category;
        $category->cate_name=$req->name;
        // $category->cate_slug=Str::slug($req->name);
        $category->save();
        return back();
    }
    public function getedit($cate_id)
    {
        $data['cate']=Category::find($cate_id);
        return view ('backend.editcategory',$data);
    }

    public function postedit(EditcateRequest $req,$cate_id)
    {
        $category= Category::find($cate_id);
        $category->cate_name=$req->name;
        // $category->cate_slug=Str::slug($req->name);
        $category->save();
        return redirect()->intended('categori');
    }
    public function getdelete($id)
    {
        Category::destroy($id);
        return back();
    }
}
