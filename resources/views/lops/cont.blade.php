@extends('layouts.app')

@section('content')
<h1 style="color: white">自分の投稿一覧</h1>
<a href="{{route('lops.create')}}" class="btn btn-success">＋投稿</a>
<div class="row align-items-strech">
    @foreach ($lops as $lop)
    <div class="card m-1 bg-my1" style="width: 25rem;">
        <div class="card-body bg-my1">
        <h5 class="card-title"><h5 class="my-white">目的or夢</h5>{{$lop->dream}}</h5>
        <p class="card-text"><h5 class="my-white">なんでその目的or夢？</h5>{!! nl2br(e(Str::limit($lop->dreamwhy, 100))) !!}</p>
        <p class="card-text"><h5 class="my-white">目的or夢のためにやっていること</h5>{!! nl2br(e(Str::limit($lop->dreamdo, 300))) !!}</p>
        <h5 class="card-title"><h5 class="my-white">現在していること</h5>{{$lop->nowdo}}</h5>
        <p class="card-text"><h5 class="my-white">なんで現在それをやっているのか</h5>{!! nl2br(e(Str::limit($lop->dreamwhy, 300))) !!}</p>
        <p class="card-text"><h5 class="my-white">見た人へ</h5>{!! nl2br(e(Str::limit($lop->tovisitor, 300))) !!}</p>
        @if ($lop->user==Auth::user())
        <a href="{{route('lops.edit',$lop)}}" class="btn btn-warning">編集</a>
        <a href="{{route('lops.show',$lop)}}" class="btn btn-info">コメントを見る</a>
        <form action="/lops/{{$lop->id}}" method="POST" style="display: inline">
            @method("DELETE")
            @csrf
            <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか');">削除</button>
            </form>
        </div>
        @endif
    </div>
    @endforeach
</div>

@endsection

