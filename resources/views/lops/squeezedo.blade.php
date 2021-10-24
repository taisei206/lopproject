@extends('layouts.app')

@section('content')
<h1>生きる夢共有</h1>
<a href="{{route('lops.index')}}" class="btn btn-secondary">ホームに戻る</a>
<a href="{{route('lops.create')}}" class="btn btn-success m-1">＋投稿</a>
<a href="{{route('lops.cont')}}" class="btn btn-success m-1">自分の投稿</a>
<a href="{{route('lops.squeeze')}}" class="btn btn-success m-1">人で検索する</a>
{{--データ表示--}}
<div class="row align-items-strech">
    @foreach ($users as $user)
        <div class="card m-1" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">ニックネーム：{{$user->name}}</h5>
                <p class="card-text">職業：{{$user->occupation}}</p>
                <p class="card-text">年齢：{{$user->age}}歳</p>
                <p class="card-text">趣味・好きなこと：{{$user->likes}}</p>
            </div>
        </div>
    @endforeach
</div>
{{--ページネーション--}}
<div>{{$users->links()}}</div>
@endsection