
@extends('layouts.app_admin')
@section('content')

   <br> <br>
   <h6>
       @if($search)

    <div class="alert alert-primary" role="alert">
        Los resultados para tu busqueda '{{$search}}' son:
    </div>
            @endif
            @php
                if (count($products) == 0){
              echo "<div class='alert alert-danger' role='alert'>";
              echo "No hay resultados que mostrar.";
              echo "</div>";
              }
            @endphp

    </h6>

    @if (isset($products))
        <div>
        @foreach($products as $product):

        <div class="oferta">
                    <a href="{{route('user.show',$product->id)}}"><img class="imagenessugeridas centrar" src="{{secure_asset('storage/'.$product->foto)}}" alt="Foto mueble con el nombre: {{$product->nombre_producto}}"/>
                        <br> <p class="centrar">{{$product->nombre_producto}} <br><strong>{{$product->price}} €</strong></p></a>
        </div>
        @endforeach
    @endif
        </div>
@stop
