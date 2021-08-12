@extends('layouts.app')

@section('content')
<main>
    <h2>Checkout</h2>
    <hr>

    <section>
        <form class="checkout-form" action="">
            @csrf
            <fieldset class="datos-fact">
                <legend>Datos de Facturación</legend>
                <h2>Datos Personales</h2>
                <hr>

                <label for="nombre">Nombre<span class="required">*</span>:</label>
                <input class="input" type="text"
                placeholder="Nombre"
                id="nombre"
                name="form[nombre]">
                
                <label for="apellidos">Apellidos<span class="required">*</span>:</label>
                <input class="input" type="text"
                placeholder="Apellidos"
                id="apellidos"
                name="form[apellidos]">
                
                <h2>Domicilio</h2>
                <hr>

                <label for="direccion">Direccíon<span class="required">*</span>:</label>
                <input class="input" type="text"
                placeholder="Calle y número"
                id="direccion"
                name="form[direccion]">
                
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
                
                <label for="localidad">Localidad/Ciudad<span class="required">*</span>:</label>
                <select name="localidad" id="localidad">
                    <option disabled selected>--Selecciona tu localidad--</option>
                    <option value="localidad-1">Localidad 1</option>
                    <option value="localidad-2">Localidad 2</option>
                </select>

                <label for="cp">Código Postal<span class="required">*</span>:</label>
                <input class="input" type="number"
                placeholder="Tu código postal"
                id="cp"
                name="form[cp]">

                <label for="telefono">Teléfono<span class="required">*</span>:</label>
                <input class="input" type="tel"
                placeholder="Tu Teléfono"
                id="telefono"
                name="form[telefono]">

                <label for="email">Email<span class="required">*</span>:</label>
                <input class="input" type="email"
                placeholder="Tu Dirección de Email"
                id="email"
                name="form[email]">
                
                
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
                        </tr>
                    </table>

                    <button type="submit" class="btn btn-a d-block">Finalizar Compra</button>
            </fieldset>
        </form>
    </section>
</main>

@endsection

