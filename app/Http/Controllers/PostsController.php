<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class PostsController extends Controller
{
    public function index () {
        $client = new Client(); //GuzzleHttp\Client
        $url = "http://127.0.0.1:8000/api/posts/index";
        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);
        $posts = json_decode($response->getBody());
        //return $posts;
        return view('admin.posts.index', ['posts' => $posts]);
    }

    public function create() {
        $client = new Client(); //GuzzleHttp\Client
        $url1 = "http://127.0.0.1:8000/api/category/index";
        $response1 = $client->request('GET', $url1, [
            'verify'  => false,
        ]);
        $category = json_decode($response1->getBody());

        $url2 = "http://127.0.0.1:8000/api/tags/index";
        $response2 = $client->request('GET', $url2, [
            'verify'  => false,
        ]);
        $tags = json_decode($response2->getBody());

        return view('admin.posts.create', ['category' => $category, 'tags' => $tags]);
    }

    public function store (Request $request) {
        $response = Http::post('http://127.0.0.1:8000/api/posts/store', [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'desc' => $request->desc,
            'tags' => $request->tags
        ]);
        //return $response;
        return redirect()->route('posts.index');
    }

    public function edit ($id) {
        $client = new Client(); //GuzzleHttp\Client
        $url1 = "http://127.0.0.1:8000/api/posts/detail/$id";
        $response1 = $client->request('GET', $url1, [
            'verify'  => false,
        ]);
        $posts = json_decode($response1->getBody());

        //$client = new Client(); //GuzzleHttp\Client
        $url2 = "http://127.0.0.1:8000/api/category/index";
        $response2 = $client->request('GET', $url2, [
            'verify'  => false,
        ]);
        $category = json_decode($response2->getBody());

        $url3 = "http://127.0.0.1:8000/api/tags/index";
        $response3 = $client->request('GET', $url3, [
            'verify'  => false,
        ]);
        $tags = json_decode($response3->getBody());
        //return $category;
        return view('admin.posts.edit', ['posts' => $posts, 'category' => $category, 'tags' => $tags]);
    }

    public function update ($id, Request $request) {
        $response = Http::post('http://127.0.0.1:8000/api/posts/update/'. $id, [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'desc' => $request->desc,
            'tags' => $request->tags,
        ]);
        //return $response;
        return redirect()->route('posts.index');
    }

    public function delete ($id) {
        Http::delete('http://127.0.0.1:8000/api/posts/delete/'.$id);
        return redirect()->route('posts.index');
    }
}
