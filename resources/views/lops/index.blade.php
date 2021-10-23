@extends('layouts.layouts')

@section('content')
<h1>生きる夢共有</h1>
<table class="table">
    <tr>
        <th>目的or夢</th> 
        <th>なぜその夢なのか</th>
        <th>今やっていること</th>
        <th>なぜ今それをやっているのか</th>
    </tr>
    @foreach ($lops as $lop)
    <tr>
        <th>{{$lop->dream}}</th> 
        <th>{{$lop->dreamwhy}}</th>
        <th>{{$lop->nowdo}}</th>
        <th>{{$lop->nowwhy}}</th>
    </tr>
    @endforeach
</table>
@endsection
