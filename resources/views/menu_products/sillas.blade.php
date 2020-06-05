@extends('layouts.app')
@section('content')


    <div id="comprassugeridas">
        <br>   <div id="titulo"> <strong>Sillas </strong> </div>
        <div>
            @php
                $products=\App\Producto::all();
            @endphp
            @foreach($products as $product)
                @if($product->tipo_mueble == "silla")
                    <div class="oferta">
                        <a href="{{route('home.show',$product->id)}}"><img class="imagenessugeridas centrar" src="{{secure_asset('storage/'.$product->foto)}}" alt="Foto mueble con el nombre: {{$product->nombre_producto}}"/>
                            <br> <p class="centrar">{{$product->nombre_producto}} <br>({{$product->price}} €)</p></a>

                    </div>
                @endif
            @endforeach

        </div>

    </div>

@endsection
