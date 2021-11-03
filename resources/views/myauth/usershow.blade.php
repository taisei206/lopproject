@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('lops.useredit') }}">
                        @csrf
                        <!-- 名前の入力欄 -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ニックネーム<br>※この名前が表示されます</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" value="@if( old('name') ){{old('name') }}@else{{$user->name}}@endif" name="name" required placeholder="必須項目20文字以下">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       <!-- 年齢の入力欄 -->
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">年齢|age</label>

                            <div class="col-md-6">
                                <input id="age" type="number" min="1" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="@if( old('age') ){{old('age') }}@else{{$user->age}}@endif" required placeholder="必須項目です">

                                @if ($errors->has('age'))
                                    <span class="invalid-feedback" style="display:inline;">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- 住んでる場所の入力欄 
                        <div class="form-group row">
                            <label for="area" class="col-md-4 col-form-label text-md-right">住んでる場所：area</label>

                            <div class="col-md-6" style="padding-top: 8px">
                                <input id="area" type="text" name="area" required placeholder="必須項目です" value="{{old('area')}}">
                                @if ($errors->has('area'))
                                    <span class="invalid-feedback" style="display:inline;">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>-->
                        
                        <!-- 職業の入力欄 -->
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">職業：occupation</label>

                            <div class="col-md-6" style="padding-top: 8px">
                                <input id="occupation" type="text" name="occupation" placeholder="必須項目30文字以下" required value="@if( old('occupation') ){{old('occupation') }}@else{{$user->occupation}}@endif">
                                @if ($errors->has('occupation'))
                                    <span class="invalid-feedback" style="display:inline;">
                                        <strong>{{ $errors->first('occupation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- 趣味・好きなことの入力欄 -->
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">趣味・好きなこと：likes</label>

                            <div class="col-md-6" style="padding-top: 8px">
                                <input id="likes" type="text" name="likes" placeholder="必須項目100文字以下" required value="@if( old('likes') ){{old('likes') }}@else{{$user->likes}}@endif">
                                @if ($errors->has('likes'))
                                    <span class="invalid-feedback" style="display:inline;">
                                        <strong>{{ $errors->first('likes') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    更新
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
