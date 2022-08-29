<ul class="list-unstyled">
    @foreach ($favorites as $favorite)
        <li class="media">
            {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
            <img class="mr-2 rounded" src="{{ Gravatar::get($user->email, ['size' => 50]) }}" alt="">
            <div class="media-body">
                <div>
                    {{ $favorite->user->name }}
                </div>
                <div>
                    {{ $favorite->content }}
                    {{ $favorite->user_id }}
                </div>
            </div>
            @if (!Auth::user()->is_favorited($favorite->id))
            <div class="favorite-control">
                <form action="{{ route('user.favorite_microposts', $favorite->id) }}" method="post">
                    @csrf
                    <button>お気に入り登録</button>
                </form>
            </div>
            @else
            <form action="{{ route('user.unfavorite_microposts', $favorite->id) }}" method="post">
                @csrf
                @method('delete')
                <button>お気に入り解除</button>
            </form>
            @endif
            <!--自分の投稿場合削除できる-->
            @if (Auth::id() == $favorite->user_id)
                {{-- 投稿削除ボタンのフォーム --}}
                {!! Form::open(['route' => ['microposts.destroy', $favorite->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}
            @endif
        </li>
    @endforeach
</ul>
{{-- ページネーションのリンク --}}
{{ $users->links() }}
