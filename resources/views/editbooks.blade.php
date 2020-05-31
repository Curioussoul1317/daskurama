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
            <h4 class="card-title"> Edit {{$book->bookname}} Book   /  <a href="/home">Back to categories</a>   </h4> 
          </div>
          <div class="card-body">  
             <div class="row"> 
                {{-- Form --}}
          <form class="form-horizontal" action="{{route('adminbooks.update')}}" method="POST"
              enctype="multipart/form-data" style="width:100%">
              @csrf 
     <input type="hidden" name="id" value="{{$book->id}}">
              <input type="hidden" name="img_name" value="{{$book->cover_image}}">
  <table class="table table-bordered">    
    <tbody>
      <tr>
        <td>
          <select class="form-control" id="category" name="category"> 
                  <option value="{{$book->category_id}}">{{$book->bookcategory->category}}</option> 
                  @if(count($categories)>0)
                      @foreach($categories as $categorie)
                      <option value="{{$categorie->id}}">{{$categorie->category}}</option>
                      @endforeach
                  @else
                      <option>Please select a category</option>
                    @endif     
                </select>
          </td>
        <td rowspan="2">
        <img  src="/storage/bookcover/{{$book->cover_image}}" alt="" width="100px" height="100px"/>
        </td>
        <td> <div class="custom-file">
              <input type="file" class="custom-file-input" id="Cover_img" name="Cover_img"
                  aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01"> Upload New Image to Change</label>
        </td>
      </tr>
      <tr>
        <td>
            <input id="book_name" class="form-control"  type="text" name="book_name" value="{{$book->bookname}}" > 
        </td> 
        <td>
          <button type="submit" style="width:100%"
            class="btn btn-success" style="float:right">
            <h5>{{ __('Update ') }}</h5>
        </button>
      </td>
      </tr>  
     </tbody>
  </table>
   </form> 
    {{-- End Form --}}
       <table class="table table-bordered">
    <thead>
      <tr>
        <th style="width:40%">Page</th>
        <th style="width:50%">Audio</th>
        <th style="width:10%">Edit</th>
      </tr>
    </thead>
    <tbody>
      @if(count($pages)>0)
                  @foreach($pages as $page)
      <tr>
        <td>
          <span>
           File Name: {{$page->pages}}
          </span>
          <img src="/storage/pages/{{$page->pages}}" alt="image02" width="100%" />
      </td>
        <td>
          <span>
           File Name: {{$page->audio}}
          </span> 
          <audio id="myAudio" controls>
                <source src="/storage/audio/{{$page->audio}}" />
              </audio>
            </td>
        <td>          
          <button type="button" class="btn btn-danger" data-toggle="modal"
            data-target="#EditPage" style="float: left;"
            data-pageid="{{$page->id}}"
            data-pagepages="{{$page->pages}}"
            data-pageaudio="{{$page->audio}}" >
              Edit
            </button>
                                                    
        </td>
      </tr>  
       @endforeach 
              @else
           <tr>
        <td><img src="images/sys/sorry.png" alt="image02" width="100%" />
      </td>
        <td> <audio id="myAudio" controls>
                <source src="" />
              </audio>
            </td>
        <td>Edit</td>
      </tr>    
               @endif
    </tbody>
     </table>
</div>
        </div>

          </div>
        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    @section('script')  
 
  @if(session('success'))
        setTimeout(function(){
           console.log("fuck");

        $('.alert').alert('close')
        }, 5000);
        @endif
       
     
 

        $('#EditPage').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var val1 = button.data('pageid')
        var val2 = button.data('pagepages')
        var val3 = button.data('pageaudio')

        var modal = $(this)
        modal.find('.modal-title').text(' Edit Page')
        modal.find('.modal-body #id').val(val1)
        modal.find('.modal-body #edit_Page').val(val2)
        modal.find('.modal-body #edit_Audio').val(val3) 
 
        })

   @endsection 

@endsection
   
    {{-- Edit Atoll--}}
   
 <div class="modal fade" id="EditPage" tabindex="-1" role="dialog" aria-labelledby="EditPageLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="EditPageLabel"> </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- Form --}}
                    <form class="form-inline " action="{{route('adminpages.update')}}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="edit_Page" id="edit_Page">
                        <input type="hidden" name="edit_Audio" id="edit_Audio">
                        <input type="hidden" name="id" id="id">  

                        <div class="form-group col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <div class="custom-file">
                               <input type="file" class="custom-file-input" id="Cover_img" name="Cover_img"
                  aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">New Image</label>
                            </div>
                        </div>

                        <div class="form-group col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <div class="custom-file">
                               <input type="file" class="custom-file-input" id="Cover_Audio" name="Cover_Audio"
                  aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01">New Audio</label>
                            </div>
                        </div>


                        <button type="submit"
                            class="btn btn-success button-prevent-multiple-submits col-xs-5 col-sm-1 col-md-1 col-lg-1">
                            <h5>{{ __('Update') }}</h5>
                        </button>
                    </form>
                    {{-- End Form --}}
                </div>

            </div>
        </div>
    </div>
    {{-- End Edit Atoll--}}


