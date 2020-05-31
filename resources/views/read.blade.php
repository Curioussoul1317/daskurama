<!DOCTYPE html>
<html lang="en" class="no-js demo-4">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>{{ config('app.name', 'HNASystem') }}</title>   

  <link rel="shortcut icon" href="../favicon.ico" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/default.css')}}" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/bookblock.css')}}" />
 
  <link rel="stylesheet" type="text/css" href="{{asset('css/book.css')}}" />
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
  <script src="{{asset('js/modernizr.custom.js')}}"></script>
</head>
 

<body>
  <nav class="row fixed-top banner">
    <div class="container bannerin">
      <div id="test-body" class="row">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 img2">
          <a href="/" style="margin-left: 10px;"><img src="{{asset('images/sys/bookmark.png')}}" width="40px"
              height="60px" /></a>
        </div>
      </div>
    </div>
  </nav>
 <input type="hidden" name="id" id="id" value="{{$id}}"> 
  <div class="container">
    <div class="bb-custom-wrapper">
      <div id="bb-bookblock" class="bb-bookblock">
        <nav id="innav">
          <a id="bb-nav-first" href="#" class="bb-custom-icon bb-custom-icon-first"> </a>
          <a id="bb-nav-prev" href="#" class="bb-custom-icon bb-custom-icon-arrow-left"> </a>
          <a id="bb-nav-next" href="#" class="bb-custom-icon bb-custom-icon-arrow-right"> </a>
          <a id="bb-nav-last" href="#" class="bb-custom-icon bb-custom-icon-last"> </a> 
        </nav>
          @if(count($pages)>0)
                  @foreach($pages as $page)
 
        <div class="bb-item">
          <div class="bb-custom-side">
            <div class="bb-custom-side"  >
              {{$id}}
              <img src="/storage/pages/{{$page->pages}}" alt="image02" width="100%" />
              <div class="audio">
                <button onclick="document.getElementById('{{$page->id}}').play();" class="audiobutton" ></button>
                <button onclick="document.getElementById('{{$page->id}}').pause();" class="audiobutton" style="background-image: url('../images/sys/pauseicon.png');
     background-repeat: no-repeat;"  ></button> 
              </div>
              
              <audio class="pageaudio" id="{{$page->id}}" >
                <source src="/storage/audio/{{$page->audio}}" />
              </audio>
            </div>
          </div>
        </div>
        <!-- <div class="bb-item">
          <div class="bb-custom-side">
            <div class="bb-custom-side"  >
              {{$id}}
              <img src="/storage/pages/{{$page->pages}}" alt="image02" width="100%" />
              <audio class="audiopage" id="myAudio" controls>
                <source src="/storage/audio/{{$page->audio}}" />
              </audio>
            </div>
          </div>
        </div> -->
   @endforeach 
              @else
         <div class="bb-item">
          <div class="bb-custom-side">
            <div class="bb-custom-side"  >
              <img src="{{asset('images/sys/sorry.png')}}" alt="image02" width="100%" />
               
            </div>
          </div>
        </div>
         @endif
    

   
    
    </div>
  </div>
  <!-- /container -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="{{asset('js/jquerypp.custom.js')}}"></script>
  <script src="{{asset('js/jquery.bookblock.js')}}"></script>
  <script>

$(document).ready(function(){
var id = $("#id").val();
 $.get('/viewupdate/'+ id,function(data){
   $.each(data,function(read,bookid){
    console.log(bookid);

});
 
});
});

 

function audioPause(p1, p2) {
var sounds = document.getElementsByTagName('audio');
  for(i=0; i<sounds.length; i++) sounds[i].pause();
}
 

    var Page = (function () {
     

      var config = {
        $bookBlock: $('#bb-bookblock'),
        $navNext: $('#bb-nav-next'),
        $navPrev: $('#bb-nav-prev'),
        $navFirst: $('#bb-nav-first'),
        $navLast: $('#bb-nav-last'),
      },
        init = function () {
          config.$bookBlock.bookblock({
            speed: 1000,
            direction: 'rtl',
            shadowSides: 0.8,
            shadowFlip: 0.4,
          });
          initEvents();
        },
        initEvents = function () {
          var $slides = config.$bookBlock.children();

          // add navigation events
          config.$navNext.on('click touchstart', function () {
            config.$bookBlock.bookblock('next');
            audioPause(); 
            return false;
          });

          config.$navPrev.on('click touchstart', function () {
            config.$bookBlock.bookblock('prev');
             audioPause(); 
            return false;
          });

          config.$navFirst.on('click touchstart', function () {
            config.$bookBlock.bookblock('first');
             audioPause(); 
            return false;
          });

          config.$navLast.on('click touchstart', function () {
            config.$bookBlock.bookblock('last');
            audioPause(); 
            return false;
          });

          // add swipe events
          $slides.on({
            swipeleft: function (event) {
              config.$bookBlock.bookblock('next');
              return false;
            },
            swiperight: function (event) {
              config.$bookBlock.bookblock('prev');
              return false;
            },
          });

          // add keyboard events
          $(document).keydown(function (e) {
            var keyCode = e.keyCode || e.which,
              arrow = {
                left: 37,
                up: 38,
                right: 39,
                down: 40,
              };

            switch (keyCode) {
              case arrow.left:
                config.$bookBlock.bookblock('prev');
                break;
              case arrow.right:
                config.$bookBlock.bookblock('next');
                break;
            }
          });
        };

      return { init: init };
    })();
  </script>
  <script>
    Page.init();
  </script>
</body>

</html>