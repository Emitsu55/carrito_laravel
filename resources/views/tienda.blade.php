@extends('layouts.app')

@section('content')

@if (count(Cart::getContent()))
<a href="{{route('cart.checkout')}}"> VER CARRITO <span class="badge badge-danger">{{count(Cart::getContent())}}</span></a>
@endif

<h2>Productos</h2>

<ul class="lista-prod">

    @foreach ($productos as $producto)

    <li class="producto">
        <img src="../assets/img/{{$producto['Imagen']}}.jpg" alt="imagen producto" class="img-prod">
        <h2>{{$producto['Nombre']}}</h2>
        <p class="precio">${{$producto['Precio']}}</p>
        {{-- <p class="desc">{{$producto['Descripcion']}}</p> --}}
        <form action="{{route('cart.add')}}" method="post">
            @csrf
            <input type="hidden" name="producto_id" value="{{$producto->id}}">
            <input type="submit" name="btn"  class="btn btn-success" value="ADD TO CART">
        </form>
    </li>

    @endforeach
    
</ul>

@stop

