<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use Mail;


use App\Mail\SendMail;
class CartController extends Controller
{
    public function getaddcart($id)
    {
        $product=Product::find($id);
      
        Cart::add([
            'id'=>$id,
            'name'=>$product->prod_name,
            'price'=>$product->prod_price,
            'weight' => 550,
            'qty' => 1,
            'options' => ['image' =>$product->prod_image]
            ]);
           
       return redirect('cart/show');
    }

    public function getshowCart()
    {
       
        $data['items']=Cart::content();
        $data['total']=Cart::total();
        return view('frontend.cart',$data);
    }

    public function getdeleteCart($id)
    {
        if($id=='all')
        {
            Cart::destroy();
        }
        else
        {
            Cart::remove($id);
        }
        return back();
    }

    public function getupdatecart(Request $req)
    {
        Cart::update($req->rowId,$req->qty);
    }

    public function postshowCart(Request $req)
    {
        $email=$req->email;
        $name=$req->name;
        $phone=$req->phone;
        $add=$req->add;
        
        $data['cart']=Cart::content();
        $data['total']=Cart::total();
        Mail::to($email)->send(new SendMail($name,$phone,$add));
        $data['items']=Cart::content();
        $data['total']=Cart::total();
        Cart::destroy();
        return view('frontend.complete',$data);
        
    }

    // public function postshowCart(Request $req)
    // {
    //     $email=$req->email;
    //     $name=$req->name;
    //     $phone=$req->phone;
    //     $add=$req->add;
    //     Mail::to($email)->send(new SendMail($name,$phone,$add));
    //     $data['items']=Cart::content();
    //     $data['total']=Cart::total();
    //     Cart::destroy();
    //     return view('frontend.complete',$data);
    // }

    public function getcomplete()
    {

        return view('frontend.complete');
    }

    // public function getcomplete()
    // {

    //     return view('frontend.complete');
    // }

}
