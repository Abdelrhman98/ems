@extends('layouts.app')
@section('title' ,'تسجيل الدخول')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-md-right">{{ __('تسجيل الدخول') }}</div>

                <div class="card-body">
                  
                    <form method="POST" action="{{ url('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label">{{ __('اسم الدخول') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="teaxt" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label">{{ ('كلمة السر') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback text-center" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if (session('status'))
                        <span class="invalid-feedback text-center" role="alert">
                            <h5> {{session('status')}}</h5>
                        </span>
                        @endif
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input  text-md-left" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ ('تذكرني') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                      
                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4 text-md-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('تسجيل الدخول') }}
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
