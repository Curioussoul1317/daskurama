@extends('layouts.guest')

@section('content')



<div class="col-md-4 col-md-offset-4">
<img class="mb-4" src="{{asset('images/logo.png')}}" alt="" width="72" height="72">
            <br>
<h1 class="panel-title" style="font-weight:bolder"> {{ __('Housing Need Assessment') }}</h1>
<br>
    <div class="login-panel panel panel-default">
        <div class="panel-heading">
           
            
            <h3 class="panel-title" style="font-weight:bolder"> {{ __('Verify Your Email Address') }}</h3>
            
        </div>
        <div class="panel-body">
        @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
               
        </div>
    </div>
</div>




<!-- /////////////////////////////////
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
