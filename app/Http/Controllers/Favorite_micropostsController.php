<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class Favorite_micropostsController extends Controller
{
   
    //投稿をお気に入りするアクション
    public function store($micropostId)
    {
        // 認証済みユーザ（閲覧者）が、 $micropostIdの投稿をお気に入りする
        \Auth::user()->favorite_microposts($micropostId);
        // 前のURLへリダイレクトさせる
        return back();
    }

    //投稿のお気に入りを削除するアクション
    public function destroy($micropostId)
    {
        // 認証済みユーザ（閲覧者）が、 $micropostIdの投稿のお気に入りを削除する
        \Auth::user()->unfavorite_microposts($micropostId);
        // 前のURLへリダイレクトさせる
        return back();
    }
    
}
