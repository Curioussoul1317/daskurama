@extends('layouts.app')
@section('content') 

 <div class="row">

       <div class="col-lg-3">
        <h1 class="my-4">Categories</h1>
        <div class="list-group">
            @if(count($categories)>0)
                  @foreach($categories as $categorie)
          <a href="/adminbooks/{{$categorie->id}}" class="list-group-item">{{$categorie->category}}</a>   
          <a href="/createbooks/{{$categorie->id}}/{{$categorie->category}}" class="btn btn-primary">Add a new {{$categorie->category}} book</a>       
           @endforeach
              @else
           <a href="#" class="list-group-item">no categories</a>
         @endif    
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="card card-outline-secondary my-4">
          <div class="card-header">
          <h4 class="card-title"> Books   </h4>   
          </div>
          <div class="card-body">     

          <div class="row"> 
    @if(count($books)>0)
                  @foreach($books as $book)
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="/storage/bookcover/{{$book->cover_image}}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">{{$book->bookname}}</a>
                </h4>
                 <a href="/adminbooks/{{$book->id}}/{{$book->bookname}}" class="btn btn-danger">Edit</a>
              </div>
              <div class="card-footer">
                <small class="text-muted">{{$book->views}}</small>
              </div>
            </div>
          </div>
           @endforeach
      @else
      <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">:(</a>
                </h4> 
              </div>
              <div class="card-footer">
                <small class="text-muted">0</small>
              </div>
            </div>
          </div>

      @endif     
        </div>



             
          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
@endsection