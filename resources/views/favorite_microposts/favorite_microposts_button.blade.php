@if (Auth::user()->is_favorited($micropost->id))
    {{-- お気に入り削除ボタンのフォーム --}}
    {!! Form::open(['route' => ['user.unfavorite_microposts', $micropost->id], 'method' => 'delete']) !!}
        {!! Form::submit('お気に入り削除', ['class' => 'btn btn-danger btn-sm']) !!}
    {!! Form::close() !!}
@else
    {{-- お気に入りボタンのフォーム --}}
    {!! Form::open(['route' => ['user.favorite_microposts', $micropost->id]]) !!}
    {!! Form::submit('お気に入り', ['class' => 'btn btn-danger btn-sm']) !!}
    {!! Form::close() !!}
@endif





