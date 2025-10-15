<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use function Laravel\Prompts\select;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();

        return view('product', ['product' => $product]);
    }

    public function details($id)
    {
        $data = Product::findOrFail($id);

        return view('details', ['products' => $data]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $data = Product::where('name', 'like', '%' . $query . '%')->get();

        return view('search', [
            'product' => $data,
            'query' => $query
        ]);
    }

    public function addtocart(Request $request)
    {
        if ($request->session()->has('user')) {
            $cart = new Cart;
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $request->product_id;
            $cart->save();
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }

    // Method to count cart items
    public static function cartItem()
    {
        $userId = Session::get('user')['id']; // Assuming 'user' session stores user info
        return Cart::where('user_id', $userId)->count();
    }

    public function cartlist()
    {
        $userId = Session::get('user')['id'];
        $data = DB::table('cart')->join('products', 'cart.product_id', 'products.id')
            ->select('products.*', 'cart.id as cart_id')
            ->where('cart.user_id', $userId)
            ->get();

        return view('cartlist', ['product' => $data]);
    }

    public function removecart(Request $request, $id)
    {

        Cart::destroy($id);
        return redirect('cartlist');
    }

    public function ordernow()
    {
        $userId = Session::get('user')['id'];
        $total = DB::table('cart')->join('products', 'cart.product_id', 'products.id')
            ->where('cart.user_id', $userId)
            ->sum('products.price');

        return view('order', ['total' => $total]);
    }

    public function orderplace(Request $request)
    {
        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id', $userId)->get();
        foreach ($allCart as $cart) {
            $order = new Order();
            $order->product_id = $cart->product_id;
            $order->user_id = $cart->user_id;
            $order->address = $request->address;
            $order->status = "pending";
            $order->payment = $request->payment;
            $order->payment_status = 'pending';

            $order->save();
        }
        Cart::where('user_id', $userId)->delete();
        return redirect("/");
    }

    public function orderlist(){
         $userId = Session::get('user')['id'];
         $order =  DB::table('order')
         ->join('products','order.product_id', 'products.id')
         ->where('order.user_id', $userId)
         ->get();

         return view('myorder', ['product'=>$order]);
    }

    // Admin
    

}
