@extends('layouts.app')

@section('content')
<main>
    <div class="carrito">
           @if (count(Cart::getContent()))
            <table class="table table-striped">
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
                <tfoot>
                    <th>TOTAL:</th>
                    <td></td>
                    <td></td>
                    <td></td>
                        <td class="total">${{Cart::getTotal();}}</td>
                </tfoot>
            </table>

            @else
                <p>Carrito vacio</p>
           @endif
    </div>
</main>
@endsection

