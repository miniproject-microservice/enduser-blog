<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class TagsController extends Controller
{
    public function index () {
        $client = new Client(); //GuzzleHttp\Client
        $url = "http://127.0.0.1:8000/api/tags/index";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $tags = json_decode($response->getBody());
        return view('admin.tags.index', ['tags' => $tags]);
    }

    public function create() {
        return view('admin.tags.create');
    }

    public function store (Request $request) {
        $response = Http::post('http://127.0.0.1:8000/api/tags/store', [
            'tag_name' => $request->tag_name,
        ]);
        return redirect()->route('tags.index');
    }

    public function edit ($id) {
        $client = new Client(); //GuzzleHttp\Client
        $url = "http://127.0.0.1:8000/api/tags/detail/$id";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $tags = json_decode($response->getBody());
        //return $category;
        return view('admin.tags.edit', ['tags' => $tags]);
    }

    public function update ($id, Request $request) {
        $response = Http::post('http://127.0.0.1:8000/api/tags/update/'. $id, [
            'tag_name' => $request->tag_name,
        ]);
        //return $response;
        return redirect()->route('tags.index');
    }

    public function delete ($id) {
        Http::delete('http://127.0.0.1:8000/api/tags/delete/'.$id);
        return redirect()->route('tags.index');
    }
}
