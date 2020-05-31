@extends('layouts.guest')
@section('content')
 
          
           @if(count($categories)>0)
                  @foreach($categories as $category)
        <div class="col-lg-2 col-md-3 mb-2 zoom circle" style="border: red solid 2px;">
          <div class="card h-100 bg-transparent" style="border: none; padding: 0px;">
            <a href="/book/{{$category->id}}"> 
                 <img class="card-img-top" src="/storage/categories/{{$category->image}}"> 
            </a>
          </div>
        </div>        
         @endforeach
              @else
              <div class="col-lg-2 col-md-3 mb-2 zoom circle" style="border: rgb(214, 0, 186) solid 5px;">
          <div class="card h-100 bg-transparent" style="border: none;">
             
          </div>
        </div>
         @endif                                  
    
    @endsection