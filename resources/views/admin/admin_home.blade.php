@extends('layouts.app_admin')

@section('content')


    <div id="noticias">

        <img src="/imagenes/mueble-salon-economico.jpg" id="imgnoticiasuno" alt=""/>

        <img src="/imagenes/mueble-salon.jpg" id="imgnoticiasdos"   alt=""/>

    </div>


    <div id="comprassugeridas">
        <div id="titulo"> <strong>Ofertas</strong> <a class="vermas" href="{{url('admin_ofertas')}}"> <div class="vermas"> Ver mas ... </div></a>
        </div>
        <div>
            @php
<<<<<<< HEAD
              $products=\App\Producto::first()->take(5)->get();
=======
           $products=\App\Producto::first()->take(4)->get();
             //    $products=\App\Producto::all();
>>>>>>> 84a82f7f7ec4dbd66221acbca08d16e454e41199
            @endphp
            @foreach($products as $product)
                @if($product->oferta == "1")
                <div class="oferta">
<<<<<<< HEAD
                    <a href="{{route('user.show',$product->id)}}"><img class="imagenessugeridas centrar" src="{{secure_asset('storage/'.$product->foto)}}" alt="Foto mueble con el nombre: {{$product->nombre_producto}}"/> <br> <p class="centrar">{{$product->nombre_producto}}<br><strong>{{$product->price}} €</strong></p></a>
=======
                    <a href="{{route('user.show',$product->id)}}"><img class="imagenessugeridas centrar" src="{{secure_asset('storage/'.$product->foto)}}" alt="Foto mueble con el nombre: {{$product->nombre_producto}}"/> <br> <p class="centrar">{{$product->nombre_producto}}</p></a>
>>>>>>> 84a82f7f7ec4dbd66221acbca08d16e454e41199
                </div>
                @endif
            @endforeach

        </div>

    </div>



    <div id="comprassugeridas">
        <div id="titulo"> <strong>Novedades</strong> <a class="vermas" href="{{url('admin_novedades')}}"> <div class="vermas"> Ver mas ... </div></a>
        </div>
        <div>
            @php
<<<<<<< HEAD
                $products=\App\Producto::latest()->take(4)->get();
            @endphp
            @foreach($products as $product)
                <div class="oferta">
                    <a href="{{route('user.show',$product->id)}}"><img class="imagenessugeridas centrar" src="{{secure_asset('storage/'.$product->foto)}}" alt="Foto mueble con el nombre: {{$product->nombre_producto}}"/> <br> <p class="centrar">{{$product->nombre_producto}}<br><strong>{{$product->price}} €</strong></p></a>
=======
                $products=\App\Producto::latest()->take(3)->get();
              //    $products=\App\Producto::all();
            @endphp
            @foreach($products as $product)
                <div class="oferta">
                    <a href="{{route('user.show',$product->id)}}"><img class="imagenessugeridas centrar" src="{{secure_asset('storage/'.$product->foto)}}" alt="Foto mueble con el nombre: {{$product->nombre_producto}}"/> <br> <p class="centrar">{{$product->nombre_producto}}</p></a>
>>>>>>> 84a82f7f7ec4dbd66221acbca08d16e454e41199
                </div>

            @endforeach

        </div>

    </div>


    <div id="sobrenosotros">
        <div id="sobrenostrostitulo"><strong>SOBRE NOSOTROS</strong></div>
        <div class="centrar">
            Somos la empresa Modern Forniture nos dedicamos a la venta de muebles online y en tienda desde 1997 para mas información o para contactar pulsa en el icono de contacto de aquí abajo
        </div>
        <div class="centrar">
            <a class="contacto" href="{{ url('contacto') }}"> <img src="/imagenes/iconos/phonebook.png"  alt="Icono para ir a la pagina contacto"/></a>
        </div>
    </div>



    <footer>
        <div id="licencia">
<<<<<<< HEAD
            <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Licencia de Creative Commons" width="10vw" src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png" /></a><br /> <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"> <span> Este obra está bajo una licencia de Creative Commons Reconocimiento-NoComercial 4.0 Internacional </span></a>.
=======
            <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><img alt="Licencia de Creative Commons" width="10vw" src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png" /></a><br /> <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/"><span> Este obra está bajo una licencia de Creative Commons Reconocimiento-NoComercial 4.0 Internacional </span></a>
>>>>>>> 84a82f7f7ec4dbd66221acbca08d16e454e41199
            <a href="https://www.facebook.com/cefpnuria/" target="_blank"> <img src="/imagenes/iconos/fb.png" alt="icono facebook" longdesc="Mas informaciones y fotos en la red social Facebook"  /></a>
            <a href="https://www.instagram.com/cefpnuria/" target="_blank"><img src="/imagenes/iconos/insta.png" alt="icono facebook" longdesc="Mas informaciones y fotos en la red social Instagram" /></a>
            <a href="https://www.youtube.com/user/escolesnuria" target="_blank"><img src="/imagenes/iconos/icono-youtube.png" alt="icono youtube "  longdesc="Mas informaciones y fotos en   YouTube un portal del Internet y red social" /></a>
        </div>
    </footer>




    </div>
    </div>

@endsection
