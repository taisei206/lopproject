@extends('layouts.app')

@section('content')
    <h1 style="color: white">プロフィール検索</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('lops.squeezedo')}}">
                            @csrf
                            <!-- 名前の入力欄 -->
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">ニックネーム：Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="空欄でもOKです" value="{{old('name')}}">
                                </div>
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- 性別の入力欄 -->
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">性別：Gender<br>(空欄でもOKです。)</label>
                                <div class="col-md-6" style="padding-top: 8px">
                                    <input id="gender-m" type="radio" name="gender" value="男性">
                                    <label for="gender-m">男性</label>
                                    <input id="gender-f" type="radio" name="gender" value="女性">
                                    <label for="gender-f">女性</label>
                                </div>
                            </div>
    
                            <!-- 年齢の入力欄 -->
                            <div class="form-group row">
                                <label for="ageunder" class="col-md-4 col-form-label text-md-right">年齢：下限</label>
                                <div class="col-md-6">
                                    <input id="age" type="number" min="1" class="form-control" name="ageunder" placeholder="半角数字で入力(必須項目)" >
                                </div>
                                <label for="ageup" class="col-md-4 col-form-label text-md-right">年齢：上限</label>
                                <div class="col-md-6">
                                    <input id="age" type="number" min="1" class="form-control" name="ageup" placeholder="半角数字で入力(必須項目)">
                                </div>
                            </div>

                            <!-- 住んでる場所の入力欄 
                            <div class="form-group row">
                                <label for="area" class="col-md-4 col-form-label text-md-right">住んでる場所：area</label>
                                
                                <div class="col-md-6" style="padding-top: 8px">
                                    <input id="area" type="text" name="area" placeholder="空欄でもOKです" value="{{old('area')}}">
                                </div>
                                @error('area')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>-->
        
                            <!-- 職業の入力欄 -->
                            <div class="form-group row">
                                <label for="occupation" class="col-md-4 col-form-label text-md-right">職業：occupation</label>
                                
                                <div class="col-md-6" style="padding-top: 8px">
                                    <input id="occupation" type="text" name="occupation" placeholder="空欄でもOKです" value="{{old('occupation')}}">
                                </div>
                                @error('occupation')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <!-- 趣味・好きなことの入力欄 -->
                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">趣味・好きなこと：likes</label>
                                
                                <div class="col-md-6" style="padding-top: 8px">
                                    <input id="likes" type="text" name="likes" placeholder="空欄でもOKです" value="{{old('likes')}}">
                                </div>
                                @error('likes')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        検索する
                                    </button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

