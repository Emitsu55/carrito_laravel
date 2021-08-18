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
        
    
    }
}
