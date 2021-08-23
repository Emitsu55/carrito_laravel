<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartCollection = \Cart::getContent();
        return view('checkout')->with(['cartCollection' => $cartCollection]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        //Variables
        $validate = $this->validateForm($request);
        $subTotal = \Cart::getTotal();
        $envio = ($request->retiro['modo'] === "envio-domicilio") ? 500.00 : 0.00;
        $items = $this->getItems();

        //data
        $data = [
            "uri" => "checkout",
            "method" => "POST",
            "body" => [
                "total" => $subTotal + $envio,
                "description" => "Orden #" . $request->_token . '_' . 'date_' . date('Y-m-d') . '_time_' . date('H:i:s'),
                "reference" => 'user_' . $request->_token . '_' . 'date_' . date('Y-m-d') . '_time_' . date('H:i:s'),
                "currency" => "ARS",
                "test" => true,
                "return_url" => "/thank-you",
                "items" => $items,
                "customer" => [
                    "email" => $request->email,
                    "name" => $request->nombre . ' ' . $request->apellidos,
                    "identification" => $request->dni,
                    "phone" => $request->telefono,
                    "adress" => $request->direccion,
                    "zipCode" => $request->cp,
                    "country" => 'argentina'
                ],
            ],
        ];
        
        // Checkout mobbex
        $checkout = $this->mobbexCheckout($data);
        $url = $checkout['url'];
        header("Location: $url");
    }

    private function getItems()
    {
        $items = [];

        foreach (\Cart::getContent() as $product) {
            $items[] = [
                'quantity'    => $product['quantity'],
                'description' => $product['name'],
                'total'       => round($product['price'] * $product['quantity'], 2),
            ];
        }

        return $items;
    }

    private function mobbexCheckout($data)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.mobbex.com/p/checkout",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $data['method'],
            CURLOPT_POSTFIELDS => json_encode($data['body']),
            CURLOPT_HTTPHEADER => array(
                'cache-control: no-cache',
                'content-type: application/json',
                'x-api-key: ' . env('MOBBEX_X_API_KEY'),
                'x-access-token: ' . env('MOBBEX_X_ACCESS_TOKKEN'),
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $response = (json_decode($response, true));
            return $response['data'];
        }
    }

    public function validateForm(Request $request)
    {
        //validacion del formulario
        $validated = request()->validate([
            'nombre' => 'required|alpha',
            'apellidos' => 'required|alpha',
            'direccion' => 'required|string',
            'region' => 'required|string',
            'localidad' => 'required|string',
            'cp' => 'required|digits:4|integer',
            'telefono' => 'required|digits_between:10,13',
            'email' => 'required|email|string'
        ]);

        return $validated;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store($validated)
    {
        //
    }


}
