<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //Nombre de la tabla a usar
    protected $table = 'images';
    
    //Relación de uno a muchos con comentarios
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    
    //Relación de uno a muchos con likes
    
    public function likes(){
        return $this->hasMany('App\Like');
    }
    
    //Relación de muchos a uno con usuario
    
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
