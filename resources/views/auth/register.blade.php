@extends('layouts.app')

@section('content')


<div class="row">
    <div class="col-md-12">

        <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
            <div class="au-card-title">
                <div class="bg-overlay bg-overlay--blue"></div>
                <h3><i class="fa fa-user-plus"></i> ރަޖިސްޓްރޭޝަން
                </h3>

            </div>
            <div class="au-task js-list-load">
                <div class="au-task__title">
                    <!-- Cards Blocks-->
                    <section class="statistic">
                        <div class="section__content section__content--p30">
                            <div class="container-fluid">
                                {{-- Form --}}
                                <form class="form-horizontal" action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <!-- row one -->
                                    <div class="row">
                                        <div class="col-3 col-md-3">
                                            <div class="row form-group">
                                                <div class="col-12 col-md-12">
                                                    <label for="nic_no"> {{ __('NIC Number') }}</label>
                                                    <input id="nic_no" type="text"
                                                        class="form-control @error('nic_no') is-invalid @enderror"
                                                        name="nic_no" value="{{ old('nic_no') }}" required
                                                        autocomplete="nic_no" autofocus dir="ltr">

                                                    @error('nic_no')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-md-3">
                                            <div class="row form-group">
                                                <div class="col-12 col-md-12">
                                                    <label for="first_name"> {{ __('first_name') }}</label>
                                                    <input id="first_name" type="text"
                                                        class="form-control @error('first_name') is-invalid @enderror thaana"
                                                        name="first_name" value="{{ old('first_name') }}" required
                                                        autocomplete="first_name" autofocus>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-md-3">
                                            <div class="row form-group">
                                                <div class="col-12 col-md-12">
                                                    <label for="last_name"> {{ __('last_name') }}</label>
                                                    <input id="last_name" type="text"
                                                        class="form-control @error('last_name') is-invalid @enderror thaana"
                                                        name="last_name" value="{{ old('last_name') }}" required
                                                        autocomplete="last_name" autofocus>

                                                    @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-md-3">
                                            <div class="row form-group">
                                                <div class="col-12 col-md-12">
                                                    <label for="permission"> {{ __('permission') }}</label>
                                                    <select class="form-control" id="permission" name="permission">
                                                        {{-- <option value="300">Admin</option>
                                                        <option value="303">Clerk of MHUD</option>
                                                        <option value="306">Guest</option> --}}
                                                        @if(count($Permissions)>0)
                                                        @foreach($Permissions as $Permission)
                                                        <option value={{$Permission->id}}>
                                                            {{$Permission->P_type}}</option>
                                                        @endforeach
                                                        @else
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row one -->
                                    <!-- row two -->
                                    <div class="row">
                                        <div class="col-3 col-md-3">
                                            <div class="row form-group">
                                                <div class="col-12 col-md-12">
                                                    <label
                                                        for="email">&nbsp;&nbsp;{{ __('E-Mail Address') }}&nbsp;</label>
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" dir="ltr">

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-md-3">
                                            <div class="row form-group">
                                                <div class="col-12 col-md-12">
                                                    <label for="password">{{ __('Password') }}</label>
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="new-password" dir="ltr">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-md-3">
                                            <div class="row form-group">
                                                <div class="col-12 col-md-12">
                                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        name="password_confirmation" required
                                                        autocomplete="new-password" dir="ltr">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-xs-10 col-sm-10 col-md-10 col-lg-10">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </button>
                                        </div>
                                    </div>
                                    <!-- end row two -->
                                </form>
                                {{-- End Form --}}
                            </div>
                        </div>
                    </section>
                    <!-- End Card Blocks -->

                </div>


                <div class="au-task__item au-task__item--danger">
                    <div class="au-task__item-inner">
                        <div class="section__content section__content--p30">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">

                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nic</th>
                                                    <th>name</th>
                                                    <th>last name</th>
                                                    <th>email</th>
                                                    <th>Permision</th>
                                                    <th>status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(count($users)>0)
                                                @foreach($users as $user)
                                                <tr class="tr-shadow">
                                                    <td>{{$user->nic_no}}</td>
                                                    <td>{{$user->first_name}}</td>
                                                    <td>{{$user->last_name}} </td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->pId->P_type}} </td>
                                                    <td>
                                                        <span class="status--process">{{$user->permission}}</span>
                                                        <span class="status--denied">Denied</span>
                                                    </td>
                                                    <td>
                                                        <div class="table-data-feature">
                                                            <button class="item" data-toggle="tooltip"
                                                                data-placement="top" title=""
                                                                data-original-title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="spacer"></tr>
                                                @endforeach
                                                @else
                                                @endif
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>

        @section('script')



        @if(session('success'))
        setTimeout(function(){
        $('.alert').alert('close')
        }, 5000);
        @endif
        @endsection


    </div>
    @endsection

















    /////////////////////////////////////@extends('layouts.app')

    @section('content')
    <div class="container-fluid  ">
        <div class="card">
            <div class="card-header  bg-primary text-white">
                <h3>ރަޖިސްޓްރޭޝަން </h3>
            </div>
            <div class="card-body">









                {{-- Table --}}





            </div>
            <div class="card-footer">
                <div class="card-footer"><a href="/"> ފުރަތަމަ ސަފްޙާއަށް ދިއުމަށް </a></div>
            </div>
        </div>





        @section('script')



        @if(session('success'))
        setTimeout(function(){
        $('.alert').alert('close')
        }, 5000);
        @endif
        @endsection

    </div>

    @endsection