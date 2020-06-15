@extends('layouts.app')
@section('content')


    <div id="comprassugeridas">
        <br><div id="titulo"> <strong>Ultimás novedades </strong></div>
        <div>
            @php
                $products=\App\Producto::latest()->take(8)->get();
            @endphp
            @foreach($products as $product)

                <div class="oferta">
                    <a href="{{route('home.show',$product->id)}}"><img class="imagenessugeridas centrar" src="{{secure_asset('storage/'.$product->foto)}}" alt="Foto mueble con el nombre: {{$product->nombre_producto}}"/>
<<<<<<< HEAD
                        <br> <p class="centrar">{{$product->nombre_producto}}<br> <strong>{{$product->price}} €</strong></p>
=======
                        <br> <p class="centrar">{{$product->nombre_producto}}<br> ({{$product->price}} €)</p>
>>>>>>> 84a82f7f7ec4dbd66221acbca08d16e454e41199

                    </a>

                </div>
            @endforeach

        </div>

    </div>

@endsection