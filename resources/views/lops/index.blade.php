@extends('layouts.app')

@section('content')
<h1 style="color: white">みんなの投稿</h1>
<a href="{{route('lops.create')}}" class="btn btn-success m-1">＋投稿</a>
<a href="{{route('lops.cont')}}" class="btn btn-success m-1">自分の投稿</a>
<a href="{{route('lops.squeeze')}}" class="btn btn-success m-1">プロフィール検索</a>
<a href="{{route('lops.usershow',['user'=>Auth::user()])}}" class="btn btn-success m-1">ユーザー情報編集</a>
{{--検索--}}
<form class="form-inline my-2 my-lg-0 ml-2">
    <div class="form-group mb-0">
    <input type="search" class="form-control mr-sm-2 " name="search"  value="{{request('search')}}" placeholder="投稿内容から検索" aria-label="検索...">
    </div>
    <input type="submit" value="検索" class="btn btn-info mt-0">
</form>
{{--データ表示--}}
<div class="row align-items-strech">
    @forelse ($lops as $lop)
    <div class="card m-1" style="width: 20rem;">
        <div class="card-body bg-my1">
        <h5 class="card-title">{{$lop->dream}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{$lop->user->name}}：{{$lop->user->occupation}}：{{$lop->user->age}}歳：{{$lop->user->likes}}</h6>
        <p class="card-text">{!! nl2br(e(Str::limit($lop->dreamwhy, 100))) !!}</p>
        <a href="{{route('lops.show',$lop)}}" class="btn btn-info">詳しく見る</a>
        </div>
    </div>
    @empty
    <div class="card m-1" style="width: 20rem;">
        <div class="card-body bg-my1">
        <h5 class="card-title">まだ投稿はありません</h5>
        </div>
    </div>
    @endforelse
</div>

{{--ページネーション--}}
<div>{{$lops->links()}}</div>
@endsection
