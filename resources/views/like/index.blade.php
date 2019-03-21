@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Publicaciones a las cuales le has dado like</h1>
            <hr>
            @foreach($likes as $like)
                @include('includes.image', ['image'=>$like->image])
            @endforeach

            <!--PAGINACION-->
            <div class="clearfix">
                {{$likes->links()}}
            </div>     
        </div>
    </div>
</div>

@endsection