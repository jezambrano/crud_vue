<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria; 

class CategoriaController extends Controller
{
   
    public function index()
    {
        return response()
                ->json([
                   Categoria::orderBy('nombre')->get()
                ]);
    }
   
    public function create()
    {
        
        return response()
                ->json([
                    'model' => $categoria,
                    'form'  => Categoria::form()
                ]);
    }

  
    public function store(Request $request)
    {
        Categoria::create($request->all());

           return response()
                ->json([
                 
                    'saved' => true
                ]);
    }

   
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);

        return response()
                ->json([
                    'model' => $categoria,
                    'show'  => true
                ]);
    }

   
    public function edit($id)
    {
         $categoria = Categoria::findOrFail($id);

      
         return response()
                ->json([
                    'model' => $categoria,
                    'form'  => Categoria::form()
                ]);
    }

   
    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->update($request->all());

         return response()
                ->json([
                   'saved' => true
                ]);
    }

   
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->delete();

         return response()
                ->json([
                    'deleted' => true
                ]);
    }
}
