@extends('layouts.app')

@section('content')
    <h1>生きる意味を投稿する</h1>

    <form method="POST" action="/lops">
        @csrf
        <div class="form-group">
            <label>意味or夢</label>
            @error('dream')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="dream" class="form-control"  placeholder="必須項目です。" value="{{old('dream')}}">
        </div>
        <div class="form-group">
            <label>なんでそれが生きる意味or目的になっているの？</label>
            @error('dreamwhy')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <textarea name="dreamwhy" cols="30" rows="5" class="form-control" placeholder="空欄でもOKです。">{{old('dreamwhy')}}</textarea>
        </div>
        <div class="form-group">
            <label>その実現のために何をしている？</label>
            @error('dreamdo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <textarea name="dreamdo" cols="30" rows="5" class="form-control" placeholder="空欄でもOKです。">{{old('dreamdo')}}</textarea>
        </div>
        <div class="form-group">
            <label>現在何をしている？</label>
            @error('nowdo')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="nowdo" class="form-control" placeholder="空欄でもOKです。" value="{{old('nowdo')}}">
        </div>
        <div class="form-group">
            <label>なんで現在それをやっているのか</label>
            @error('nowwhy')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <textarea name="nowwhy" cols="30" rows="5" class="form-control"  placeholder="空欄でもOKです。" >{{old('nowwhy')}}</textarea>
        </div>
        <div class="form-group">
            <label>見た人へ言葉</label>
            @error('tovisitor')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="tovisitor" class="form-control"  placeholder="空欄でもOKです。" value="{{old('tovisitor')}}">
        </div>
        
        <button type="submit" class="btn btn-primary">投稿する</button>
        <a href="{{route('lops.index')}}" class="btn btn-secondary">一覧に戻る</a>
    </form>

@endsection

