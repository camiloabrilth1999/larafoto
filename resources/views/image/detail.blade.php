@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.message')

            <div class="card pub_image pub_image_detail">
                <div class="card-header">
                    @if($image->user->image)
                    <div class="container-avatar">
                        <img src = "{{ route('user.avatar', ['filename' => $image->user->image]) }}" class = "avatar">
                    </div>
                    @endif
                    <div class="data-user">
                        {{$image->user->nick}}

                    </div>
                </div>
                <div class="card-body">
                    <div class="image-container image-detail">
                        <img src="{{ route('image.file', ['filename' => $image->image_path]) }}">    
                    </div>
                    <div class="likes">
                        <?php $user_like = false; ?>
                        <!--Comprobar si el usuario le dio like a la imagen-->
                        @foreach($image->likes as $like)
                            @if($like->user->id == Auth::user()->id)
                                <?php $user_like = true; ?>
                            @endif
                        @endforeach

                        @if($user_like)
                            <img src="{{ asset('img/heart_red.png') }}" data-id="{{ $image->id }}" class="btn-dislike">
                        @else
                            <img src="{{ asset('img/heart_black.png') }}" data-id="{{ $image->id }}" class="btn-like">
                        @endif
                        <!--Contar los like en la publicación-->
                        <span class="number_likes">{{ count($image->likes) }}</span>
                    </div>

                    <div class="description">
                        <span class="nickname">{{ $image->user->nick }}</span> 
                        <p>{{ $image->description }}</p>
                    </div>

                    
                    <div class="clearfix"></div>
                    <div class="comments">
                        <hr>
                        <h2>Comentarios ({{ count($image->comments) }})</h2>
                        @foreach($image->comments as $comment)
                        <div class="comment">
                            <span class="nickname">{{ $comment->user->nick }}</span> | 
                            <span class="date">{{\FormatTime::LongTimeFilter($comment->created_at) }}</span>
                            <p>{{ $comment->content }} <br>
                                @if (Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id)) 
                                <a href=" {{ route('comment.delete', ['id' => $comment->id]) }}" class="btn btn-sm btn-danger">
                                    Eliminar
                                </a>
                                @endif
                            </p>
                        </div>
                        @endforeach
                        <hr>
                        <form method="POST" action="{{ route('comment.save') }}">
                            @csrf
                            <h2>Escribe tu comentario</h2>
                            <input type="hidden" name="image_id" value="{{$image->id}}">
                            <p>
                                <textarea class="form-control {{$errors->has('content') ? 'is-invalid':''}}" name="content" rquired></textarea>
                                @if($errors->has('content'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                                @endif
                            </p>

                            <button type="submit" class="btn btn-success">Enviar comentario</button>
                        </form>
                    </div>

                    <div class="time">
                        <span class="date">{{\FormatTime::LongTimeFilter($image->created_at) }}</span>
                    </div>
                </div>
            </div>   
        </div>
    </div>
</div>

@endsection