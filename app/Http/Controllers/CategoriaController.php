<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function index()
    {
        $categoria=Categoria::with('producto')->all();
        return response()->json($categoria);
    }


    public function store(Request $request)
    {

        $categoria=Categoria:: create( $request->post());
        return response()->json($categoria);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoria=Categoria::with('producto')->find($id);
        return response()->json($categoria);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categoria=Categoria::find($id);
        $categoria->fill($request->all())->save();
        return response()->json($categoria);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        if ($categoria) {
            Categoria::destroy($id);

            return response()->json(
                [
                    "mensaje" => "categoria eliminado"
                ]
            );
        }
        else {

            return response()->json(
                [
                    "mensaje" => "categoria no existe"
                ]
            );

        }


    }
}
