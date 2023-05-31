<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Laravel</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.css" type="text/css"> 
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
        <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
    </head>

    <body>
        <div class="mt-3">
            <center>
                <a href="{{ route('login') }}">
                    <button type="button" class="btn btn-primary">Login</button>
                </a>
                
                <a href="{{ route('register') }}">
                    <button type="button" class="btn btn-secondary">Register</button>
                </a>
            </center>
        </div>
        <hr>

        <div class="py-5">
            <div class="container">
            <center>
                <h1><b>Blog Post</b></h1>
            </center>
            <br>
            <div class="row hidden-md-up">
                @foreach ($posts as $item)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-block">
                            <h4 class="card-title">{{ $item->title }}</h4>
                            <hr>
                            <p class="card-text p-y-1">{{ $item->desc }}</p>
                            <hr>
                            <a>
                                Category : {{ $item->category->cat_name }}
                            </a>
                            <br>
                            <a> Tags : {{ $item->tags }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><br>
        </div>

        <div class="py-5">
            <div class="container">
            <center>
                <h1><b>Daftar Produk</b></h1>
            </center>
            <br>
            <div class="row hidden-md-up">
                @foreach ($product as $product)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-block">
                                <h4 class="card-title">{{ $product->name }}</h4>
                                <hr>
                                <p class="card-text p-y-1">Rp {{ $product->price }}</p>
                                <hr>
                                <a> Stock : {{ $product->stock }}</a>
                                <br>
                                <a href="{{ route('pay', ['id' => $product->id]) }}">
                                    <button type="button" class="btn btn-primary btn-block">Buy</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><br>
        </div>

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
        <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>
    </body>
</html>
