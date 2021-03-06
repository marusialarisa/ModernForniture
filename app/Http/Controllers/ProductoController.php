<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Photos;
use App\Producto;
use App\User;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
       $this->middleware(['auth','role:admin']);
    }

    public function index()
    {
        $user=auth()->user()->id;
        $products= Producto::all();
        return view('products_admin.all_products',compact('products','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("products_admin.create_product");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=auth()->user()->id;
        $products= Producto::all();
        $user_id=auth()->user()->id;
        $user_info=User::find($user_id);
        $role=$user_info->hasRole("admin");
        if($role){

            $this->validate($request,[
                'nombre_producto'=> 'required',
                'marca'=> 'required',
                'tipo_mueble'=> 'required',
                'descripcion'=> 'required',
                'dimensiones'=> 'required',
                'volum'=> 'required',
                'oferta'=> 'required',
                'cantidad'=> 'required',
                'price'=> 'required',
                'precio_con_montaje'=>'required',
                'fragil'=> 'required',
                'foto'=> 'required'

            ]);

            $path=$request->file('foto')->store('fotos','public');
            $producto=Producto::create(['id_usuario'=>$user_id,
                'nombre_producto'=>$request->nombre_producto,
                'marca'=>$request->marca,
                'tipo_mueble'=>$request->tipo_mueble,
                'descripcion'=>$request->descripcion,
                'dimensiones'=>$request->dimensiones,
                'volum'=>$request->volum,
                'oferta'=>$request->oferta,
                'cantidad'=>$request->cantidad,
                'price'=>$request->price,
                'precio_con_montaje'=>$request->precio_con_montaje,
                'fragil'=>$request->fragil,
                'foto'=>$path
            ]);

            $photos = $request->file('photo');

            if($photos) {
                foreach ($photos as $photo) {
                    $path = $photo->store('fotos', 'public');
                    Photos::create([
                        'product_id' => $producto->id,
                        'photo' => $path
                    ]);

                }
            }
            return view('products_admin.all_products',compact('products','user'))->with('success','Se ha añadido un producto');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $products= Producto::all();
        $user=auth()->user()->id;


        return view('products_admin.all_products',compact('products','user'));

    }
    public function info($id)
    {
        $products=Producto::all();
        $producto=Producto::find($id);
        $users=User::all();

        $photos= $producto->photos()->get('photo');
       // dd($photos);
        if($photos != null){
            $total = count($photos);
        }

        return view('products_admin.info_product',compact('producto','photos','total','users','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products=Producto::find($id);
        $users=User::all();

        $photos = $products->photos()->get('photo');
        return view('products_admin.edit_product',compact('products','users','photos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Producto::find($id);

        if($request->file('foto')){
            $path=$request->file('foto')->store('fotos','public');
        }

        else{
            $path=$products['foto'];
        }


        $this->validate($request,[
            'nombre_producto'=> 'required',
            'marca'=> 'required',
            'tipo_mueble'=> 'required',
            'descripcion'=> 'required',
            'dimensiones'=> 'required',
            'volum'=> 'required',
            'oferta'=> 'required',
            'cantidad'=> 'required',
            'price'=> 'required',
            'precio_con_montaje'=>'required',
            'fragil'=> 'required'
        ]);


            $products->update([
                'nombre_producto'=>$request->nombre_producto,
                'marca'=>$request->marca,
                'tipo_mueble'=>$request->tipo_mueble,
                'descripcion'=>$request->descripcion,
                'dimensiones'=>$request->dimensiones,
                'volum'=>$request->volum,
                'oferta'=>$request->oferta,
                'cantidad'=>$request->cantidad,
                'price'=>$request->price,
                'precio_con_montaje'=>$request->precio_con_montaje,
                'fragil'=>$request->fragil,
                'foto'=>$path

            ]);

    $photos = $request->file('photo');

        if ($photos != null) {

            foreach ($photos as $photo) {
                $path = $photo->store('fotos', 'public');
               Photos::create([
                    'product_id' => $products->id,
                    'photo' => $path
                ]);

            }
        }

       return view('products_admin.all_products',compact('products'));

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Producto::destroy($id);
        return view('products_admin.all_products')->with('success','Registro actualizado satisfactoriamente');

    }
}
