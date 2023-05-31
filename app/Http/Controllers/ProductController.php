<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index () {
        $client = new Client(); 
        $url = "http://127.0.0.1:8003/api/product/index";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $product = json_decode($response->getBody());

        return view('admin.product.index', ['product' => $product]);
    }

    public function create() {
        return view('admin.product.create');
    }

    public function store (Request $request) {
        $response = Http::post('http://127.0.0.1:8003/api/product/store', [
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
        //return $response;
        return redirect()->route('product.index');
    }

    public function edit ($id) {
        $client = new Client(); //GuzzleHttp\Client
        $url = "http://127.0.0.1:8003/api/product/detail/$id";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $product = json_decode($response->getBody());
        //return $category;
        return view('admin.product.edit', ['product' => $product]);
    }

    public function update ($id, Request $request) {
        $response = Http::post('http://127.0.0.1:8003/api/product/update/'. $id, [
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);
        //return $response;
        return redirect()->route('product.index');
    }

    public function delete ($id) {
        Http::delete('http://127.0.0.1:8003/api/product/delete/'.$id);
        return redirect()->route('product.index');
    }
}
