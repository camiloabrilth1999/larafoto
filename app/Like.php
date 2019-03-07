<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
     //Nombre de la tabla a usar
    protected $table = 'likes';
    
    //Relación de muchos a uno con usuario
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
    //Relación de muchos a uno con imagen
    public function image(){
        return $this->belongsTo('App\User', 'image_id');
    }
}
