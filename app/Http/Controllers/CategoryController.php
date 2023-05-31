<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    public function index () {
        $client = new Client(); //GuzzleHttp\Client
        $url = "http://127.0.0.1:8000/api/category/index";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $category = json_decode($response->getBody());

        return view('admin.category.index', ['category' => $category]);
    }

    public function create() {
        return view('admin.category.create');
    }

    public function store (Request $request) {
        $response = Http::post('http://127.0.0.1:8000/api/category/store', [
            'cat_name' => $request->cat_name,
        ]);
        return redirect()->route('category.index');
    }

    public function edit ($id) {
        $client = new Client(); //GuzzleHttp\Client
        $url = "http://127.0.0.1:8000/api/category/detail/$id";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $category = json_decode($response->getBody());
        //return $category;
        return view('admin.category.edit', ['category' => $category]);
    }

    public function update ($id, Request $request) {
        $response = Http::post('http://127.0.0.1:8000/api/category/update/'. $id, [
            'cat_name' => $request->cat_name,
        ]);
        //return $response;
        return redirect()->route('category.index');
    }

    public function delete ($id) {
        Http::delete('http://127.0.0.1:8000/api/category/delete/'.$id);
        return redirect()->route('category.index');
    }
}
