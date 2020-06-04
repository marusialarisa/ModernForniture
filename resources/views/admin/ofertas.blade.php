@extends('layouts.app_admin')
@section('content')


    <div id="comprassugeridas">
        <br><div id="titulo"><strong>Ofertas</strong> Ofertas </div>
        <div>
            @php
                $products=\App\Producto::first()->take(9)->get();
            @endphp
            @foreach($products as $product)
                @if($product->oferta == "1")
                <div class="oferta">
                    <a href="{{route('user.show',$product->id)}}"><img class="imagenessugeridas centrar" src="{{asset('storage/'.$product->foto)}}" alt="Foto mueble con el nombre: {{$product->nombre_producto}}"/>
                        <br> <p class="centrar">{{$product->nombre_producto}}<br> ({{$product->price}} €)</p></a>

                </div>
                @endif
            @endforeach

        </div>

    </div>

@endsection