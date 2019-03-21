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

        <div class="comments">
            <a href="{{ route('image.detail', ['id' => $image->id]) }}" class="btn btn-sm btn-warning btn-comments">
                Comentarios ({{count($image->comments)}})
            </a>
        </div>

        <div class="time">
            <span class="date">{{\FormatTime::LongTimeFilter($image->created_at) }}</span>
        </div>
    </div>
</div>