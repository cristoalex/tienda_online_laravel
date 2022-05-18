<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['productos']=Productos::paginate(6);
        return view('producto.index', $datos);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Descripcion'=>'required|string|max:300',
            'Precio'=>'required|string|max:20',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Descripcion.required'=>'La Descripcion es requerida',
            'Foto.required'=>'la Foto es requerida',
        ];

        $this->validate($request, $campos, $mensaje);


        //$datosProductos = request()->all();
        $datosProductos = request()->except('_token');

        if($request->hasFile('Foto')){
            $datosProductos['Foto']=$request->file('Foto')->store('uploads', 'public');
        }

        Productos::insert($datosProductos);

       // return response()->json($datosProductos);
       return redirect('producto')->with('mensaje','Producto Agregado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $producto=Productos::findORFail($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $campos=[
            'Nombre'=>'required|string|max:100',
            'Descripcion'=>'required|string|max:300',
            'Precio'=>'required|string|max:20',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido',
            'Descripcion.required'=>'La Descripcion es requerida',
        ];

        if($request->hasFile('Foto')){

            $campos=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg',];
            $mensaje=['Foto.required'=>'la Foto es requerida',];
        }

        $this->validate($request, $campos, $mensaje);


        //
        $datosProductos = request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $producto=Productos::findORFail($id);
            Storage::delete('public/'.$producto->Foto);
            $datosProductos['Foto']=$request->file('Foto')->store('uploads', 'public');
        }

        Productos::where('id','=',$id)->update($datosProductos);
        $producto=Productos::findORFail($id);
        //return view('producto.edit', compact('producto'));
        return redirect('producto')->with('mensaje','producto modificado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $producto=Productos::findORFail($id);
        if(Storage::delete('public/'.$producto->Foto)){
            Productos::destroy($id);
        }
 
        return redirect('producto')->with('mensaje','producto borrado');
    }
}
