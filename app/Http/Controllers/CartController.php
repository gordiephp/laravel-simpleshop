<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Session;


class CartController extends Controller
{
    public function index() {
        if(!Session::has('cart')) {
            $products = null;
            return view('cart.index', compact('products'));      
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);  
                        
        $products = $cart->_items;
        $totalPrice = $cart->_totalPrice;
        $totalQuantity = $cart->_totalQuantity;
        return view('cart.index', compact('products','totalPrice','totalQuantity'));   
    }
    
    public function getCartAdd(Request $request, $id) {
        $product = Product::find($id);
        

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return back();
    }
    
    public function delete(Request $request, $id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        
        $cart->delete($id);
        $request->session()->put('cart', $cart);
        return back();
    }
    
    public function update(Request $request, $id) {
        //dd($request);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        
        $value = $request->input('item_quantity');
        //dd($value);
        $cart->update($id, $value);
        $request->session()->put('cart', $cart);
        return back();  
    }
}

/*Cart {#207 ▼
  +_items: array:2 [▼
    61 => array:3 [▶]
    62 => array:3 [▼
      "quantity" => 1
      "price" => 9
      "item" => Product {#194 ▶}
    ]
  ]
  +_totalQuantity: 5
  +_totalPrice: 41
}*/