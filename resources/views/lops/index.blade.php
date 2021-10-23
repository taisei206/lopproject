@extends('layouts.layouts')

@section('content')
<h1>生きる夢共有</h1>
<a href="{{route('lops.create')}}" class="btn btn-success">＋投稿</a>
<table class="table">
    <tr>
        <th>目的or夢</th> 
        <th>なぜその夢なのか</th>
        <th>今やっていること</th>
        <th>なぜ今それをやっているのか</th>
        <th>アクションボタン</th>
    </tr>
    @foreach ($lops as $lop)
    <tr>
        <td>{{$lop->dream}}</td> 
        <td>{{$lop->dreamwhy}}</td>
        <td>{{$lop->nowdo}}</td>
        <td>{{$lop->nowwhy}}</td>
        <td>
            <a href="{{route('lops.edit',$lop)}}" class="btn btn-warning">編集</a>
            <a href="{{route('lops.show',$lop)}}" class="btn btn-info">詳細</a>
            <form action="/lops/{{$lop->id}}" method="POST" style="display: inline">
            @method("DELETE")
            @csrf
            <button type="submit" class="btn btn-danger" onclick="return confirm('本当に削除しますか');">削除</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
