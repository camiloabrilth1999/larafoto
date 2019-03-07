@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session('message_pass'))
            <div class="alert alert-success">
                {{session('message_pass')}}
            </div>
            @elseif(session('message_pass_error'))
            <div class="alert alert-danger">
                {{session('message_pass_error')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">Configuración de la contraseña</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.change_pass') }}" aria-label="Configuración de la contraseña">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Ingresa tu nueva contraseña" required autofocus>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  placeholder="Repite tu contraseña" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Cambiar contraseña
                                </button>
                            </div>
                        </div>

                        <hr>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a class="btn btn-primary" role="button" href="{{ route('config')}}">
                                    Ir a configuración de la cuenta
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection