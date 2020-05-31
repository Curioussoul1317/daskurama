<style>
  .lod {
    position: absolute;
    background: transparent;
    left: 0%;
    width: 50%;
    height: auto;
    top: -5px;
    z-index: 1;
    border: none;
  }

  .loader {
    border: 6px solid #003c8f;
    /* Blue */
    border-top: 3px solid #f3f3f3;
    /* Light grey */
    float: left;
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 2s linear infinite;
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

  .divLeft {
    width: 50px;
    display: block;
    float: left;
  }

  .divRight {
    width: 80%;
    display: block;
    float: left;
    text-align: left;
    padding-left: 5px;
    vertical-align: middle;
  }
</style>
@if(count($errors)>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger">
  {{$error}}
</div>
@endforeach
@endif

 
@if(session('success'))
<div class="alert alert-primary">
  {{session('success')}}
</div> 
@endif

@if(session('error'))
<div class="alert alert-danger">
  {{session('error')}}
</div>
@endif