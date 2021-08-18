@extends('layouts.app')

@section('content')
<main>
    <div class="carrito">
           @if (count(Cart::getContent()))
            <table>
                <thead>
                    <th>ID:</th>
                    <th>NOMBRE:</th>
                    <th>PRECIO:</th>
                    <th>CANTIDAD:</th>
                    <th></th>
                </thead>
                <tbody>
                    
                    @foreach (Cart::getContent() as $item)
                    <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>${{$item->price}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>
                                <form action="{{route('cart.removeitem')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$item->id}}">
                                    <button type="submit"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>

            <form class="resumen" action="{{route('checkout.index')}}" method="POST">
                @csrf
                <fieldset>
                    <legend>Total a Pagar</legend>

                    <table>
                            <tr>
                                <td>Subtotal:</td>
                                <td>${{Cart::getTotal();}}</td>
                            </tr>
                            <tr>
                                <td>Envio:</td>
                                <td>
                                    <div class="campo">
                                        <input type="radio" id="retiro-suc" name="checkout[envio]" value="retiro-suc" checked>
                                        <label for="retiro-suc">Retiro por sucursal</label>
                                    </div>
                                    <div class="campo">
                                        <input type="radio" id="envio-dom" name="checkout[envio]" value="envio-dom">
                                        <label for="envio-dom">Envio a domicilio($500)</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Total:</td>
                                <td class="total">${{Cart::getTotal();}}</td>
                        </table>
                        <button type="submit" class="btn btn-a d-block">Finalizar Compra</button>
                </fieldset>
            </form>

            @else
                <p class="success">Carrito vacio</p>
           @endif
    </div>
</main>
@endsection

