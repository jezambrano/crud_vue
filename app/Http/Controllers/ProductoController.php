<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        return  Producto::orderBy('nombre')->with('categoria')->get();
              
    }

   
    public function create()
    {
        
       return response()
                ->json([
                    'form' => Producto::form(),
                    'option' => []
                ]);
    }

  
    public function store(Request $request)
    {
        $v = \Validator::make($request->all(), Producto::rules());

        if( $v->fails()){
           return response()->json( $v->errors() );
        }

        Producto::create($request->all());

           return response()
                ->json([
                 
                    'saved' => true
                ]);
    }

   
    public function show($id)
    {
        $producto = Producto::findOrFail($id);

        return response()
                ->json([
                    'model' => $producto,
                    
                ]);
    }

   
    public function edit($id)
    {
         $producto = Producto::findOrFail($id);



        return response()
                ->json([
                    'form' => $producto,
                    'option' => []
                ]);
    }

   
    public function update(Request $request, $id)
    {
        
        $v = \Validator::make($request->all(), Producto::rules($id));

        if( $v->fails()){
           return response()->json( $v->errors() );
        }


        $producto = Producto::findOrFail($id);



        $producto->update($request->all());

         return response()
                ->json([
                   'saved' => true
                ]);
    }

   
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        $producto->delete();

         return response()
                ->json([
                    'deleted' => true
                ]);
    }
}
