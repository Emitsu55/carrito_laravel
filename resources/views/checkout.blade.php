@extends('layouts.app')

@section('content')
<main>
    <h2>Checkout</h2>
    <hr>

    <section>
        <form class="checkout-form" action="{{route('store')}}" method="POST">
            @csrf
            <fieldset class="datos-fact">
                {{-- @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p class="error">{{$error}}</p>
                    @endforeach
                @endif --}}
                <legend>Datos de Facturación</legend>
                <h2>Datos Personales</h2>
                <hr>

                <label for="nombre">Nombre<span class="required">*</span>:</label>
                <input class="input"
                value="{{ old('nombre') }}" 
                type="text"
                placeholder="Nombre"
                id="nombre"
                name="nombre">
                {!!$errors->first('nombre', '<small class="error">:message</small>')!!}
                
                <label for="apellidos">Apellidos<span class="required">*</span>:</label>
                <input class="input"
                value="{{ old('apellidos') }}"
                type="text"
                placeholder="Apellidos"
                id="apellidos"
                name="apellidos">
                {!!$errors->first('apellidos', '<small class="error">:message</small>')!!}
                
                <label for="telefono">Teléfono<span class="required">*</span>:</label>
                <input class="input"
                value="{{ old('telefono') }}"
                type="tel"
                placeholder="Tu Teléfono"
                id="telefono"
                name="telefono">
                {!!$errors->first('telefono', '<small class="error">:message</small>')!!}
                
                <label for="email">Email<span class="required">*</span>:</label>
                <input class="input"
                value="{{ old('email') }}"
                type="email"
                placeholder="Tu Dirección de Email"
                id="email"
                name="email">
                {!!$errors->first('telefono', '<small class="error">:message</small>')!!}

                <h2>Domicilio</h2>
                <hr>
                
                <label for="direccion">Direccíon<span class="required">*</span>:</label>
                <input class="input"
                value="{{ old('direccion') }}"
                type="text"
                placeholder="Calle y número"
                id="direccion"
                name="direccion">
                {!!$errors->first('apellidos', '<small class="error">:message</small>')!!}
                
                <label for="region">Región/Provincia<span class="required">*</span>:</label>
                <select name="region" id="region">
                    <option disabled selected>--Selecciona tu región--</option>
                    <option value="Buenos Aires">Bs. As.</option>
                    <option value="Catamarca">Catamarca</option>
                    <option value="Chaco">Chaco</option>
                    <option value="Chubut">Chubut</option>
                    <option value="Cordoba">Cordoba</option>
                    <option value="Corrientes">Corrientes</option>
                    <option value="Entre Rios">Entre Rios</option>
                    <option value="Formosa">Formosa</option>
                    <option value="Jujuy">Jujuy</option>
                    <option value="La Pampa">La Pampa</option>
                    <option value="La Rioja">La Rioja</option>
                    <option value="Mendoza">Mendoza</option>
                    <option value="Misiones">Misiones</option>
                    <option value="Neuquen">Neuquen</option>
                    <option value="Rio Negro">Rio Negro</option>
                    <option value="Salta">Salta</option>
                    <option value="San Juan">San Juan</option>
                    <option value="San Luis">San Luis</option>
                    <option value="Santa Cruz">Santa Cruz</option>
                    <option value="Santa Fe">Santa Fe</option>
                    <option value="Sgo. del Estero">Sgo. del Estero</option>
                    <option value="Tierra del Fuego">Tierra del Fuego</option>
                    <option value="Tucuman">Tucuman</option>
                </select>
                {!!$errors->first('region', '<small class="error">:message</small>')!!}
                
                <label for="localidad">Localidad/Ciudad<span class="required">*</span>:</label>
                <select name="localidad" id="localidad">
                    <option disabled selected>--Selecciona tu localidad--</option>
                    <option value="localidad-1">Localidad 1</option>
                    <option value="localidad-2">Localidad 2</option>
                </select>
                {!!$errors->first('localidad', '<small class="error">:message</small>')!!}
                
                <label for="cp">Código Postal<span class="required">*</span>:</label>
                <input class="input"
                value="{{ old('cp') }}"
                type="number"
                placeholder="Tu código postal"
                id="cp"
                name="cp">
                {!!$errors->first('cp', '<small class="error">:message</small>')!!}
                
            </fieldset>
            <fieldset class="pagar">
                <legend>Pedido</legend>
              
                <h2>Total a Pagar</h2>
                <hr>    
                <table>
                        <tr>
                            <td>Subtotal:</td>
                            <td>${{Cart::getTotal();}}</td>
                        </tr>
                        <tr>
                            <td>Envio:</td>
                            <td>
                                <div class="campo">
                                    <input type="radio" id="retiro-suc" name="envio" value="retiro-suc">
                                    <label for="retiro-suc">Retiro por sucursal</label>
                                </div>
                                <div class="campo">
                                    <input type="radio" id="envio-dom" name="envio" value="envio-dom" checked>
                                    <label for="envio-dom">Envio a domicilio($500)</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Total:</td>
                            <td id="retiro_suc" class="total hidden">${{Cart::getTotal();}}</td>
                            <td id="envio_dom" class="total">${{Cart::getTotal() + 500;}}</td>
                        </tr>
                    </table>

                    <button type="submit" class="btn btn-a d-block">Pagar</button>
            
                </fieldset>
        </form>
    </section>
</main>

@endsection

