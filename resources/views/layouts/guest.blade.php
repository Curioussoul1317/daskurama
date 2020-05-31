<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
 <title>{{ config('app.name', 'HNASystem') }}</title>  

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{asset('css/mainpages.css')}}">
  
</head>

<body>
  <nav class="row fixed-top banner">
    <div class="container bannerin">
      <div id="test-body" class="row">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 img2">
          <a href="/" style="padding-left: 10px;"><img src="{{asset('images/sys/sun.png')}}" class="sun" /></a>
        </div>
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 img1 d-flex flex-row-reverse">
          <a href="/" style="padding-right: 10px;">
            <img src="{{asset('images/sys/daskurama.png')}}" />
          </a>
        </div>
      </div>
    </div>
  </nav>

  <div class="jumbotron bg-transparent vertical-center pt-sm-5 pt-5">
    <div class="container pt-sm-5 pt-5">
      <div class="row pt-sm-5">
    @yield('content')
   <!-- Bootstrap core JavaScript -->
  <!-- <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
       </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="py-5 footer fixed-bottom">
    <div class="container fixed-bottom">
      <div class="d-flex justify-content-right">
        <div class="col-md-4 col-sm-4 col-l-2 col-xl-2">
          <img src="{{asset('images/sys/bookworm.png')}}" width="100%" height="100%" />
        </div>
      </div>
    </div>
    <!-- /.container -->
  </footer>
</body>

</html>

 
 
 