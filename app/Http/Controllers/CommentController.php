<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function save(Request $request) {

        $validate = $this->validate($request, [
            'image_id' => ['integer', 'required'],
            'content' => ['string', 'required']
        ]);

        //Recoger datos
        $user = \Auth::user();
        $image_id = $request->input('image_id');
        $content = $request->input('content');

        //Asigno los valores al nuevo objeto a guardar
        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;

        //Guardar en la base de datos
        $comment->save();

        //Redirección al guardar el comentario
        return redirect()->route('image.detail', ['id' => $image_id])
                        ->with([
                            'message' => 'Tu comentario ha sido publicado correctamente'
        ]);
    }

    public function delete($id) {
        // Obtener los datos del usuario identificado
        $user = \Auth::user();

        // Obtener objeto del comentario
        $comment = Comment::find($id);

        // Comprobar si soy el dueño del comentario o de la publicación
        if ($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id)) {
            //Borramos el comentario
            $comment->delete();
            
            return redirect()->route('image.detail', ['id' => $comment->image->id])->with(['message' => 'Comentario eliminado correctamente']);
        } else {

            return redirect()->route('image.detail', ['id' => $comment->image->id])->with(['message' => 'No se pudo eliminar el comentario']);
        }
    }

}
