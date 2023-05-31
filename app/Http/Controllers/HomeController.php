<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index () {
        $client = new Client(); //GuzzleHttp\Client
        $url = "http://127.0.0.1:8000/api/posts/index";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $posts = json_decode($response->getBody());

        $url2 = "http://127.0.0.1:8003/api/product/index";
        $response2 = $client->request('GET', $url2, [
            'verify'  => false,
        ]);
        $product = json_decode($response2->getBody());

        return view('welcome', ['posts' => $posts, 'product' => $product]);
    }
}
