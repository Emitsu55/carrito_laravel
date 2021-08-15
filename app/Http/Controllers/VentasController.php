<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class Controller extends Controller
{
    public function index()
    {
        $venta = Venta::get();
    }
    public function store(Request $request) {
        
        art$venta = Venta::get()

        request()->validate([
            'nombre' => 'required|alpha',
            'apellidos' =>'required|alpha',
            'direccion' => 'required|string',
            'region' => 'required|string',
            'localidad' => 'required|string',
            'cp' => 'required|digits:4|integer',
            'telefono' => 'required|digits_between:10,13',
            'email' => 'required|email|string'
        ]); 


        return $request;
    }
}
