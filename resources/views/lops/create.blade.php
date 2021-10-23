@extends('layouts.layouts')

@section('content')
    <h1>生きる意味を投稿する</h1>

    <form method="POST" action="/lops">
        @csrf
        <div class="form-group">
            <label>意味or夢</label>
            <input type="text" name="dream" class="form-control">
        </div>
        <div class="form-group">
            <label>なんでそれが生きる意味or目的になっているの？</label>
         {{-- <input type="text" name="dreamwhy" class="form-control">--}}
            <textarea name="dreamwhy" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>その実現のために何をしている？</label>
            <textarea name="dreamdo" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>現在何をしている？</label>
            <input type="text" name="nowdo" class="form-control">
        </div>
        <div class="form-group">
            <label>なんで現在それをやっているのか</label>
            <textarea name="nowwhy" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>見た人へ言葉</label>
            <input type="text" name="tovisitor" class="form-control">
        </div>
        
        <button type="submit" class="btn btn-primary">投稿する</button>
        <a href="{{route('lops.index')}}" class="btn btn-secondary">戻る</a>
    </form>

@endsection

