@extends('layouts.app')
@section('content')
<h1>投稿を編集</h1>
<form action="/lops/{{$lop->id}}" method="POST">
    @csrf
    @method("PATCH")
    <div class="form-group">
        <label>意味or夢</label>
        @error('dream')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input type="text" name="dream" class="form-control" value="@if (old('dream')) {{old('dream')}} @else {{$lop->dream}} @endif" required>
    </div>
    <div class="form-group">
        <label>なんでそれが生きる意味or目的になっているの？</label>
        @error('dreamwhy')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <textarea name="dreamwhy" cols="30" rows="5" class="form-control">@if (old('dreamwhy')) {{old('dreamwhy')}} @else {{$lop->dreamwhy}} @endif</textarea>
    </div>
    <div class="form-group">
        <label>その実現のために何をしている？</label>
        @error('dreamdo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <textarea name="dreamdo" cols="30" rows="5" class="form-control">@if (old('dreamdo')) {{old('dreamdo')}} @else {{$lop->dreamdo}} @endif</textarea>
    </div>
    <div class="form-group">
        <label>現在何をしている？</label>
        @error('nowdo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <input type="text" name="nowdo" class="form-control" value="@if (old('nowdo')) {{old('nowdo')}} @else {{$lop->nowdo}} @endif">
    </div>
    <div class="form-group">
        <label>なんで現在それをやっているのか</label>
        @error('nowwhy')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <textarea name="nowwhy" cols="30" rows="5" class="form-control">@if (old('nowwhy')) {{old('nowwhy')}} @else {{$lop->nowwhy}} @endif</textarea>
    </div>
    <div class="form-group">
        <label>見た人へ言葉</label>
        @error('tovisitor')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <input type="text" name="tovisitor" class="form-control" value="@if (old('tovisitor')) {{old('tovisitor')}} @else {{$lop->tovisitor}} @endif">
    </div>
    
    <button type="submit" class="btn btn-primary">更新する</button>
    <a href="{{route('lops.index')}}" class="btn btn-secondary">戻る</a>

</form>
@endsection