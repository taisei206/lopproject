@extends('layouts.app')

@section('content')
<h1>生きる夢共有</h1>
<a href="{{route('lops.create')}}" class="btn btn-success">＋投稿</a>
<a href="{{route('lops.cont')}}" class="btn btn-success">自分の投稿</a>
<table class="table">
    <tr>
        <th>目的or夢</th> 
        <th>なぜその夢なのか</th>
        <th>今やっていること</th>
        <th>なぜ今それをやっているのか</th>
        <th></th>
    </tr>
    @foreach ($lops as $lop)
    <tr>
        <td>{{$lop->dream}}</td> 
        <td>{{$lop->dreamwhy}}</td>
        <td>{{$lop->nowdo}}</td>
        <td>{{$lop->nowwhy}}</td>
        <td><a href="{{route('lops.show',$lop)}}" class="btn btn-info">詳細</a></td>
    </tr>
    @endforeach
</table>
@endsection
