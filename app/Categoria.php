<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [ 'nombre'];

    public static function form()
    {
    	return [
    		'nombre' => ''
    	];
    }

    public function productos()
    {
    	return $this->hasMany('App\Producto','id_categoria');
    }


}
