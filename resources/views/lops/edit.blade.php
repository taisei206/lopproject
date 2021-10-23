@extends('layouts.layouts')
@section('content')
    
@endsection

<h1>投稿を編集</h1>
<form action="/lops/{{$lop->id}}">
</form>
@csrf
@method("PATCH")
    <div class="form-group">
        <label>意味or夢</label>
        <input type="text" name="dream" class="form-control" value="{{$lop->dream}}">
    </div>
    <div class="form-group">
        <label>なんでそれが生きる意味or目的になっているの？</label>
     {{-- <input type="text" name="dreamwhy" class="form-control">--}}
        <textarea name="dreamwhy" cols="30" rows="5" class="form-control" value="{{$lop->dreamwhy}}"></textarea>
    </div>
    <div class="form-group">
        <label>その実現のために何をしている？</label>
        <textarea name="dreamdo" cols="30" rows="5" class="form-control" value="{{$lop->dreamdo}}"></textarea>
    </div>
    <div class="form-group">
        <label>現在何をしている？</label>
        <input type="text" name="nowdo" class="form-control" value="{{$lop->nowdo}}">
    </div>
    <div class="form-group">
        <label>なんで現在それをやっているのか</label>
        <textarea name="nowwhy" cols="30" rows="5" class="form-control" value="{{$lop->nowwhy}}"></textarea>
    </div>
    <div class="form-group">
        <label>見た人へ言葉</label>
        <input type="text" name="tovisitor" class="form-control" value="{{$lop->tovisitor}}">
    </div>
    
    <button type="submit" class="btn btn-primary">更新する</button>
    <a href="{{route('lops.index')}}" class="btn btn-secondary">戻る</a>
