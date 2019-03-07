<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller {

    public function config() {
        return view('user.config');
    }

    public function config_pass() {
        return view('user.config_pass');
    }

    public function update(Request $request) {
        //Conseguir usuario identificado
        $user = \Auth::user();
        $id = $user->id;

        //Validación del formulario
        $validate = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'nick' => ['required', 'string', 'max:255', 'unique:users,nick,' . $id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id]
        ]);

        //Recoger datos del formulario
        $name = $request->input('name');
        $surname = $request->input('surname');
        $nick = $request->input('nick');
        $email = $request->input('email');

        //Asignar nuevos valores al objeto usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;

        //Subir la imagen
        $image_path = $request->file('image_path');

        if ($image_path) {
            //Poner nombre unico
            $image_path_name = time() . $image_path->getClientOriginalName();
            //Guardar en la carpeta storage(storage/app/users)
            Storage::disk('users')->put($image_path_name, File::get($image_path));
            //Seteo el nombre de la imagen en el objeto
            $user->image = $image_path_name;
        }

        //Ejecutar consulta y cambios en la BD
        $user->update();

        return redirect()->route('config')
                        ->with(['message' => 'Usuario actualizado correctamente']);
    }

    public function change_pass(Request $request) {


        //Conseguir usuario identificado
        $user = \Auth::user();
        $id = $user->id;

        //Validación del formulario
        $validate = $this->validate($request, [
            'password' => ['required', 'string', 'min:6']
        ]);
        //Recoger datos del formulario
        $password = $request->input('password');
        $password_confirm = $request->input('password_confirmation');

        if ($password == $password_confirm) {

            //Asignar nuevos valores al objeto usuario

            $user->password = bcrypt($password);

            //Ejecutar consulta y cambios en la BD
            $user->update();


            return redirect()->route('config_pass')
                            ->with(['message_pass' => 'Se ha actualizado la contraseña correctamente']);
        } else{
            return redirect()->route('config_pass')
                            ->with(['message_pass_error' => 'Las contraseñas no coinciden']);
        }
    }

}
