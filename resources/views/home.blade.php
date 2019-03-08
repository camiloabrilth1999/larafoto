@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.message')
            @foreach($images as $image)
            <div class="card pub_image">
                <div class="card-header">

                    @if($image->user->image)
                    <div class="container-avatar">
                        <img src = "{{ route('user.avatar', ['filename' => $image->user->image]) }}" class = "avatar">
                    </div>
                    @endif
                    <div class="data-user">
                        <a href="">
                            {{$image->user->nick}}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="image-container">
                        <a href="{{ route('image.detail', ['id' => $image->id]) }}">
                            <img src="{{ route('image.file', ['filename' => $image->image_path]) }}">  
                        </a>
                    </div>
                    <div class="likes">
                        <img src="{{ asset('img/heart_black.png') }}">
                    </div>

                    <div class="description">
                        <span class="nickname">{{ $image->user->nick }}</span> 
                        <p>{{ $image->description }}</p>
                    </div>

                    <div class="comments">
                        <a href="" class="btn btn-sm btn-warning btn-comments">
                            Comentarios ({{count($image->comments)}})
                        </a>
                    </div>
                    
                    <div class="time">
                        <span class="date">{{\FormatTime::LongTimeFilter($image->created_at) }}</span>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="clearfix">
                {{$images->links()}}
            </div>     
        </div>
    </div>
</div>

@endsection