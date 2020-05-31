@extends('layouts.app')

@section('content')

  

 <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Daskuramaa</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
       
  </nav>

  <!-- Page Content -->
  <div class="container" style="margin-top:56px;">    

      <div class="col-lg-12"> 

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
           Login
          </div>
          <div class="card-body">            
            <hr>
          <div class="col-lg-6">
                <!-- Login Form -->
            <form role="form" method="POST" action="{{ route('login') }}">
                @csrf
                <fieldset>
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email"  type="email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" 
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="login-checkbox">
                        <label>
                           Save info &nbsp;<input type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                        </label>

                    </div> 
                 </fieldset>
                <br>

        </div>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

        </div>
        </form>
          </div>
            
            <hr>
          
          </div>
      
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright © Daskuramaa 2020</p>
    </div>
    <!-- /.container -->
  </footer>

@endsection