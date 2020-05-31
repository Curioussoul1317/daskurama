@extends('layouts.guest')
@section('content')
           
          @if(count($books)>0)
                  @foreach($books as $book)
      
        <div class="col-lg-2 col-md-2 col-md-2  " style="margin-left: 35px; border: none;">
          <div class="card h-100  bg-transparent" style="  border: none;">
            <a href="/pages/{{$book->id}}">
              <div class="book">
                <div class="back"><img class="card-img-top  " src="/storage/bookcover/{{$book->cover_image}}" alt="" /></div>
                <div class="page6"><img class="card-img-top " src="/storage/bookcover/{{$book->cover_image}}" alt="" /></div>
                <div class="page5"><img class="card-img-top " src="/storage/bookcover/{{$book->cover_image}}" alt="" /></div>
                <div class="page4"><img class="card-img-top " src="/storage/bookcover/{{$book->cover_image}}" alt="" /></div>
                <div class="page3"><img class="card-img-top " src="/storage/bookcover/{{$book->cover_image}}" alt="" /></div>
                <div class="page2"><img class="card-img-top " src="/storage/bookcover/{{$book->cover_image}}" alt="" /></div>
                <div class="page1"><img class="card-img-top " src="/storage/bookcover/{{$book->cover_image}}" alt="" /></div>
                <div class="front"><img class="card-img-top " src="/storage/bookcover/{{$book->cover_image}}" alt="" />
                </div>
              </div>
            </a>
          </div>
        </div>      
         @endforeach
              @else
               <div class="col-lg-2 col-md-2 col-md-2  " style="margin-left: 35px; border: none;">
          <div class="card h-100  bg-transparent" style="  border: none;">
            <a href="#">
              <div class="book">
                <div class="back"><img class="card-img-top  " src="{{asset('images/sys/sorry.png')}}" alt="" /></div>
                <div class="page6"><img class="card-img-top " src="{{asset('images/sys/sorry.png')}}" alt="" /></div>
                <div class="page5"><img class="card-img-top " src="{{asset('images/sys/sorry.png')}}" alt="" /></div>
                <div class="page4"><img class="card-img-top " src="{{asset('images/sys/sorry.png')}}" alt="" /></div>
                <div class="page3"><img class="card-img-top " src="{{asset('images/sys/sorry.png')}}" alt="" /></div>
                <div class="page2"><img class="card-img-top " src="{{asset('images/sys/sorry.png')}}" alt="" /></div>
                <div class="page1"><img class="card-img-top " src="{{asset('images/sys/sorry.png')}}" alt="" /></div>
                <div class="front"><img class="card-img-top " src="{{asset('images/sys/sorry.png')}}" alt="" />
                </div>
              </div>
            </a>
          </div>
        </div>
         @endif   
                                    
   

 
    @endsection