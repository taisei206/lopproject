@extends('layouts.app')

@section('content')
<div class="row align-items-strech">
    <div class="card m-1" >
        <div class="card-body bg-my1">
        <h5 class="card-title">目的・夢</h5>
        <p class="card-text">{{$lop->dream}}</p>
        </div>
    </div>
    <div class="card m-1" >
        <div class="card-body bg-info">
        <h5 class="card-title">なぜその夢なのか</h5>
        <p class="card-text">{{$lop->dreamwhy}}</p>
        </div>
    </div>
    <div class="card m-1" >
        <div class="card-body bg-info">
        <h5 class="card-title">達成のためにやっていること</h5>
        <p class="card-text">{{$lop->dreamdo}}</p>
        </div>
    </div>
    <div class="card m-1" >
        <div class="card-body bg-success">
        <h5 class="card-title">今やっていること</h5>
        <p class="card-text">{{$lop->nowdo}}</p>
        </div>
    </div>
    <div class="card m-1">
        <div class="card-body bg-success">
        <h5 class="card-title">なぜ今それをやっているのか</h5>
        <p class="card-text">{{$lop->nowwhy}}</p>
        </div>
    </div>
    <div class="card m-1">
        <div class="card-body bg-secondary">
        <h5 class="card-title">見た人へ</h5>
        <p class="card-text">{{$lop->tovisitor}}</p>
        </div>
    </div>
</div>
<a href="{{route('lops.index')}}" class="btn btn-secondary">戻る</a>
<!--コメント投稿-->
<hr>
<form method="POST" action="{{route('lops.comment',$lop)}}">
    @csrf
    @method("POST")
    <div class="form-group">
        <input type="text" name="comment" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">コメントを投稿する</button>
</form>
<p>合計{{$comments->count()}}件</p>
<div class="row align-items-strech">
    @foreach ($comments as $item)
    <div class="card m-1">
        <div class="card-body bg-my1">
        <p class="card-text">{{$item->comment}}</p>
        </div>
    </div>
    @endforeach
</div>

@endsection

