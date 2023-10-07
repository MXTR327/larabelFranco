<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Intervention\Image\Facades\Image;


class ProductoController extends Controller
{
    //
    public function index(){
        $productos = Producto::all();
        return view("productos.lista")->with(["productos" => $productos]);
    }

    public function create(){
        $categorias=Categoria::all();
        return view("productos.create")->with(array("categorias"=>$categorias));
    }
    public function store(Request $request){
       // return"hola mundo";
        $validacion=Validator::make($request->all(),[
            "nombre"=>"required|max:100",
            "precio"=>"required",
        ]);
        if ($validacion->fails()){           
            return redirect()->back()->with(array(
                "status"=>false,
                "error"=>$validacion->messages(),
            ));
        }

        $object=new Producto();
        $object->nombre=$request->input("nombre");
        $object->descripcion=$request->input("descripcion");
        $object->precio=$request->input("precio");
        $object->categoria_id=$request->input("categoria");

        if($request->hasFile('foto')){

            $nombre= str_replace(".".$request->file('foto')->getClientOriginalExtension(),"",$request->file('foto')->getClientOriginalName());
            // $nombre = $request->file('foto')->getClientOriginalName(); 
            $object->ruta_imagen =  $this->cargarImagen($nombre, $request->file('foto'),"/Productos");
        }


        if($object->save()){
           // return"hola mundo";
            return redirect()->route("productos.index");
        }
       
        return redirect()->back()->with(array(
            "status"=>false,
            "error"=>null,
            "message"=>"error al crear",
        ));
    }
    private function cargarImagen($nombre, $archivo, $ruta_prod){
        $ruta = '../storage/app/public'.$ruta_prod;
        $extencion = $archivo->getClientOriginalExtension();

        Image::make($archivo)->resize(100,100)->save($ruta."/".$nombre."-thumb.".$extencion);
        Image::make($archivo)->resize(400,400)->save($ruta."/".$nombre."-medium.".$extencion);
        Image::make($archivo)->save($ruta."/".$nombre."-full.".$extencion);

        $fotos = array(
            "thumb" => str_replace("../storage/app","",$ruta)."/".$nombre."-thumb.".$extencion,
            "medium" => str_replace("../storage/app","",$ruta)."/".$nombre."-medium.".$extencion,
            "full" => str_replace("../storage/app","",$ruta)."/".$nombre."-full.".$extencion
        );
        return json_encode($fotos);
    }
}
