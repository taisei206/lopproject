@extends('layouts.layouts')

@section('content')
<table class="table table-striped">
    <tr>
        <th>目的or夢</th> 
        <td>{{$lop->dream}}</td> 
    </tr>
    <tr>
        <th>なぜその夢なのか</th>
        <td>{{$lop->dreamwhy}}</td>
    </tr>
    <tr>
        <th>達成のためにやっていること</th> 
        <td>{{$lop->dreamdo}}</td> 
    </tr>
    <tr>
        <th>今やっていること</th>
        <td>{{$lop->nowdo}}</td>
    </tr>
    <tr>
        <th>なぜ今それをやっているのか</th>
        <td>{{$lop->nowwhy}}</td>
    </tr>
    <tr>
        <th>見た人へ</th> 
        <td>{{$lop->tovisitor}}</td>
    </th>
</table>

<a href="{{route('lops.index')}}" class="btn btn-secondary">戻る</a>
@endsection