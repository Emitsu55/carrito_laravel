<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request){
       
        $producto = Producto::find($request->producto_id);
        \Cart::add(
            $producto->id, 
            $producto->Nombre, 
            $producto->Precio, 
            1,
            array("urlfoto"=> "../assets/img" . $producto->imagen . '.jpg')
           
        );
        return back()->with('success',"¡$producto->Nombre se ha agregado con éxito al carrito!  | ");
   
    }

    public function removeitem(Request $request) {
        $producto = Producto::where('id', $request->id)->firstOrFail();
        \Cart::remove([
        'id' => $request->id,
        ]);
        return back()->with('success',"¡$producto->nombre eliminado con éxito de su carrito.  | ");
    }

    public function clear(){
        \Cart::clear();
        return back()->with('success',"¡Carrito Vacio!  | ");
    }
}
