@extends('layouts.guest')

@section('content')
<div class="col-md-4 col-md-offset-4">
    <img class="mb-4" src="{{asset('images/logo.png')}}" alt="" width="72" height="72">
    <br>
    <h1 class="panel-title" style="font-weight:bolder"> {{ __('Housing Need Assessment') }}</h1>
    <br>
    <div class="login-panel panel panel-default">
        <div class="panel-heading">


            <h3 class="panel-title" style="font-weight:bolder"> {{ __('Reset Password ') }}</h3>

        </div>
        <div class="panel-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <fieldset>
                    <div class="form-group">
                        <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                    </div>
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="remember" type="checkbox" value="Remember Me">Remember Me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Password Reset Link') }}
                    </button>

                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection