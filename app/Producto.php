<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [ 'nombre', 'codigo', 'id_categoria' ];

    public static function form()
    {
    	return [
    	
    		'nombre' => '',
    		'codigo' => '',
    		'id_categoria' => null
    	];
    }


    public function categoria()
    {
    	return $this->belongsTo('App\Categoria','id_categoria');
    }

    public static function rules($id = null)
    {
        return [

        'nombre' => 'required',
        'codigo' => 'required|unique:productos,codigo,'.$id

        ];
    }

}
