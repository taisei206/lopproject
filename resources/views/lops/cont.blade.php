@extends('layouts.app')

@section('content')
<h1>生きる夢共有</h1>
<a href="{{route('lops.create')}}" class="btn btn-success">＋投稿</a>
<div class="row align-items-strech">
    @foreach ($lops as $lop)
    <div class="card m-1" style="width: 18rem;">
        <div class="card-body">
        <h5 class="card-title"><p class="bg-primary">目的or夢：</p>{{$lop->dream}}</h5>
        <p class="card-text"><p class="bg-primary">なんでその目的or夢？</p>{!! nl2br(e(Str::limit($lop->dreamwhy, 100))) !!}</p>
        <p class="card-text"><p class="bg-primary">目的or夢のためにやっていること：</p>{!! nl2br(e(Str::limit($lop->dreamdo, 300))) !!}</p>
        <h5 class="card-title"><p class="bg-primary">現在していること：</p>{{$lop->nowdo}}</h5>
        <p class="card-text"><p class="bg-primary">なんで現在それをやっているのか：</p>{!! nl2br(e(Str::limit($lop->dreamwhy, 300))) !!}</p>
        <p class="card-text"><p class="bg-primary">見た人へ：</p>{!! nl2br(e(Str::limit($lop->tovisitor, 300))) !!}</p>
        @if ($lop->user==Auth::user())
        <a href="{{route('lops.edit',$lop)}}" class="btn btn-warning">編集</a>
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
<a href="{{route('lops.index')}}" class="btn btn-secondary">戻る</a>

@endsection

