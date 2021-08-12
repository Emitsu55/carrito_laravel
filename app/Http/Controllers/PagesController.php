<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Producto;


class PagesController extends Controller
{
    public function shop()
    {
        $productos = Producto::all();
        return view('tienda')->with(['productos' => $productos]);
    }
    
    public function cart()
    {
        $cartCollection = \Cart::getContent();
        return view('cart')->with(['cartCollection' => $cartCollection]);
    }
    public function checkout()
    {
        $cartCollection = \Cart::getContent();
        return view('checkout')->with(['cartCollection' => $cartCollection]);
    }
  
}
