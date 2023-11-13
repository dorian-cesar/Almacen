<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index()
    {
        $producto=producto::all();
        return response()->json($producto);
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'nombre'=>'required',
                'precio'=>'required',
                'cantidad'=>'required',

            ]
        );
        $producto=producto:: create( $request->post());
        return response()->json($producto);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto=producto::with('categoria')->find($id);
        if($producto){
            return response()->json($producto);
        }else{
            return response()->json(['msj'=>'Producto No existe!']);
        }


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $producto=producto::find($id);
        $producto->fill($request->all())->save();
        return response()->json($producto);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = producto::find($id);
        if ($producto) {
            producto::destroy($id);

            return response()->json(
                [
                    "mensaje" => "Producto eliminado"
                ]
            );
        }
        else {

            return response()->json(
                [
                    "mensaje" => "Producto no existe"
                ]
            );

        }


    }
}
