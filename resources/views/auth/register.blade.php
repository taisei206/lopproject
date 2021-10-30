@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- 名前の入力欄 -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ニックネーム|{{ __('Name') }}<br>※この名前が表示されます</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="必須項目です">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- メールアドレスの入力欄 -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス<br>{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="必須項目です">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- パスワードの入力欄 -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="8文字以上">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- パスワードの確認の入力欄 -->
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- 性別の入力欄 -->
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">性別|Gender</label>

                            <div class="col-md-6" style="padding-top: 8px">
                                <input id="gender-m" type="radio" name="gender" value="男性">
                                <label for="gender-m">男性</label>
                                <input id="gender-f" type="radio" name="gender" value="女性">
                                <label for="gender-f">女性</label>

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" style="display:inline;">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- 年齢の入力欄 -->
                        <div class="form-group row">
                            <label for="age" class="col-md-4 col-form-label text-md-right">年齢|age</label>

                            <div class="col-md-6">
                                <input id="age" type="number" min="1" class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" value="{{ old('age') }}" required placeholder="必須項目です">

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
                                <input id="occupation" type="text" name="occupation" placeholder="必須項目です" required value="{{old('occupation')}}">
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
                                <input id="likes" type="text" name="likes" placeholder="必須項目です" required value="{{old('occupation')}}">
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
                                    {{ __('Register') }}
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
