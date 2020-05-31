@extends('layouts.app')
@section('content')         
 
 
        <div class="card card-outline-secondary my-4">
          <div class="card-header">
            <h4 class="card-title"> Add a Book to {{$name}} categories /  <a href="/home">Back to categories</a>   </h4> 
          </div>
          <div class="card-body">    
    {{-- Form --}}
          <form class="form-horizontal" action="{{route('adminbooks.update')}}" method="POST"
              enctype="multipart/form-data">
              @csrf 
              <input type="hidden" name="id" value="{{$id}}">
              <input type="hidden" name="img_name" value=" ">
  <table class="table table-bordered">    
    <tbody>
      <tr>
        <td>
          gh
          </td>
        <td rowspan="2">
        <img  src="/storage/bookcover/ " alt="" width="100px" height="100px"/>
        </td>
        <td> <div class="custom-file">
              <input type="file" class="custom-file-input" id="Cover_img" name="Cover_img"
                  aria-describedby="inputGroupFileAddon01">
              <label class="custom-file-label" for="inputGroupFile01"> Upload New Image to Change</label>
        </td>
      </tr>
      <tr>
        <td>
            <input id="book_name" type="text" name="book_name" value=" " > 
        </td> 
        <td>
          <button type="submit"
            class="btn btn-success" >
            <h5>{{ __('Update ') }}</h5>
        </button>
      </td>
      </tr>  
     </tbody>
  </table>
   </form>
                    {{-- End Form --}}
 

    </div>

                                     
   
  @section('script')  
 
     @if(session('success'))
        setTimeout(function(){
        $('.alert').alert('close')
        }, 5000         
        );
        @endif
   @endsection 
 
@endsection