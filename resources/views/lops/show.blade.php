@extends('layouts.app')

@section('content')
<div class="row align-items-strech">
    <div class="card m-1 rounded my-border1" >
        <div class="card-body">
        <h5 class="card-title">目的・夢</h5>
        <p class="card-text">{{$lop->dream}}</p>
        </div>
    </div>
    <div class="card m-1 my-border1 rounded" >
        <div class="card-body">
        <h5 class="card-title">なぜその夢なのか</h5>
        <p class="card-text">{{$lop->dreamwhy}}</p>
        </div>
    </div>
    <div class="card m-1 my-border1 rounded" >
        <div class="card-body ">
        <h5 class="card-title">達成のためにやっていること</h5>
        <p class="card-text">{{$lop->dreamdo}}</p>
        </div>
    </div>
    <div class="card m-1 my-border2 rounded" >
        <div class="card-body">
        <h5 class="card-title">今やっていること</h5>
        <p class="card-text">{{$lop->nowdo}}</p>
        </div>
    </div>
    <div class="card m-1 my-border2 rounded">
        <div class="card-body">
        <h5 class="card-title">なぜ今それをやっているのか</h5>
        <p class="card-text">{{$lop->nowwhy}}</p>
        </div>
    </div>
    <div class="card m-1 my-border3 rounded">
        <div class="card-body">
        <h5 class="card-title">見た人へ</h5>
        <p class="card-text">{{$lop->tovisitor}}</p>
        </div>
    </div>
</div>
<!--コメント投稿-->
<hr>
@error('comment')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
<form method="POST" action="{{route('lops.comment',$lop)}}">
    @csrf
    @method("POST")
    <div class="form-group">
        <input type="text" id="comment" name="comment" class="form-control"  value="{{old('comment')}}" placeholder="ここにコメントを書き込む" oninput="inputbtn()">
    </div>
    <button type="submit" id="commentBtn" class="btn btn-primary" disabled>コメントを投稿する</button>
</form>
<p style="color:white;">合計{{$comments->count()}}件</p>
<div class="row align-items-strech">
    
    @foreach ($comments as $comment)
    <div class="card m-1">
        <div class="card-body bg-my1">
            <h6 class="card-subtitle mb-2 text-muted">{{$comment->user->name}}：{{$comment->user->occupation}}：{{$comment->user->age}}歳：{{$comment->user->likes}}</h6>
            <p class="card-text">コメント：{{$comment->comment}}</p>
        </div>
    </div>
    @endforeach
</div>

<script>
    function inputbtn() {
    if (document.querySelector("#comment").value==="") {
        document.querySelector("#commentBtn").disabled = true; 
    } else {
        document.querySelector("#commentBtn").disabled = false;
    }}

</script>

@endsection

