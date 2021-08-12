<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function goCheckout() {
        $cartCollection = \Cart::getContent();
        return view('checkout')->with(['cartCollection' => $cartCollection]);
    }
}
