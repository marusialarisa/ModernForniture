@extends('layouts.app')
@section('content')


    <div id="comprassugeridas">
        <br>   <div id="titulo"> <strong>Comodas</strong>  </div>
        <div>
            @php
                $products=\App\Producto::all();
            @endphp
            @foreach($products as $product)
                @if($product->tipo_mueble == "comoda")
                    <div class="oferta">
                        <a href="{{route('home.show',$product->id)}}"><img class="imagenessugeridas centrar" src="{{secure_asset('storage/'.$product->foto)}}" alt="Foto mueble con el nombre: {{$product->nombre_producto}}"/>
<<<<<<< HEAD
                            <br> <p class="centrar">{{$product->nombre_producto}}<br><strong>{{$product->price}} €</strong></p></a>
=======
                            <br> <p class="centrar">{{$product->nombre_producto}}<br> ({{$product->price}} €)</p></a>
>>>>>>> 84a82f7f7ec4dbd66221acbca08d16e454e41199

                    </div>
                @endif
            @endforeach

        </div>

    </div>

@endsection
