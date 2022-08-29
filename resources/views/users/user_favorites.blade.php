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
        </li>
    @endforeach
</ul>
{{-- ページネーションのリンク --}}
{{ $users->links() }}
