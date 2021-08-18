@extends('layouts.app')

@section('content')

@if (count(Cart::getContent()))
<div class="success d-flex">
    @if(session()->has('success'))
        <p>{{ session()->get('success') }}</p>
    @endif
    <a href="/carrito">Ver Carrito <span class="alert">{{count(Cart::getContent())}}</span></a>
</div>
@endif

<main>
    <h2>Productos</h2>
    <hr>
    <ul class="lista-prod">
    
        @foreach ($productos as $producto)
    
        <li class="producto">
            <img src="../assets/img/{{$producto['Imagen']}}.jpg" alt="imagen producto" class="img-prod">
            <span class="hidden popup">{{$producto['Descripcion']}}</span>
            <h3>{{$producto['Nombre']}}</h3>
            <p class="precio">${{$producto['Precio']}}</p>
            <form action="{{route('cart.add')}}" method="post">
                @csrf
                <input type="hidden" name="producto_id" value="{{$producto->id}}">
                <input type="submit" name="btn"  class="btn btn-a" value="Añadir al carrito">
            </form>
        </li>
    
        @endforeach
        
    </ul>

</main>


@stop

