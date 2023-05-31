<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function pay ($id) {
        $client = new Client(); //GuzzleHttp\Client
        $url = "http://127.0.0.1:8003/api/order/pay/$id";
        //return $url;
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $pay = json_decode($response->getBody());
        
        return redirect($pay->link);
    }
}
