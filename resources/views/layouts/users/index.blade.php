@extends('layouts.app')

@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>


                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>


    </div>
     --}}

    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
        <div class="container-fluid">

            <div class="ui-view">
                <div class="row">


                    <!-- /.col-->
                    <div class=" col-sm-12 col-md-12 accordion" id="accordion">

                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <i class="icon-note"></i>Add User
                                <div class="card-header-actions">
                                    <a class="card-header-action" href="#" target="_blank"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    </a>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Simple Form</h6>
                                        <form id="userForm"   method="POST" action="{{ route('user-management.user.create')}}">
                                            @csrf

                                            <div class="form-group">
                                                <label class="col-form-label" for="username">Username</label>
                                                <input class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" id="username" type="text" name="username" value="{{ old('username')}}" placeholder=" username" />
                                                @if ($errors->has('username'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('username') }}</small>
                                                    </p>
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label" for="first_name">First Name</label>
                                                <input class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" id="first_name" type="text" name="first_name" value="{{ old('first_name')}}" placeholder="first name" />
                                                @if ($errors->has('first_name'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('first_name') }}</small>
                                                    </p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label" for="last_name">Last Name</label>
                                                <input class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" id="last_name" type="text" name="last_name" value="{{ old('last_name')}}" placeholder="last name" />
                                                @if ($errors->has('last_name'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('last_name') }}</small>
                                                    </p>
                                                @endif
                                            </div>

                                             <div class="form-group">
                                                <label class="col-form-label" for="email">email</label>
                                                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" type="text" name="email" value="{{ old('email')}}" placeholder="email" />
                                                @if ($errors->has('email'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('email') }}</small>
                                                    </p>
                                                @endif
                                            </div>

                                             @if($roles->count() > 0)
                      <fieldset class="form-group">
                        <label  class="col-form-label" for="role" >Role</label>
                        <select class="form-control" name="roles" required >
                            {{-- select2-multiple --}}
                            {{-- multiple="multiple" --}}
                            {{-- id="select2-2"  --}}
                            {{-- name="roles[]" --}}
                          @foreach($roles as $role)
                          <option value="{{$role->id}}">{{$role->name}}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('role'))
                        <p class="text-right">
                        <small class="warning text-muted">{{ $errors->first('role') }}</small>
                        </p>
                        @endif
                      </fieldset>

                      @else
                      <div class="form-group">
                      <label for="message">{{__('No role set')}}</label>
                      </div>
                      @endif
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label" for="password">Password</label>
                                                    <input class="form-control" id="password" type="password" name="password" placeholder="Password" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label" for="confirm_password">Confirm password</label>
                                                    <input class="form-control" id="confirm_password" type="password" name="confirm_password" placeholder="Confirm password" />
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <button class="btn btn-primary" type="submit"value="save">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
                <!-- /.row-->

                <div class="animated fadeIn">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-edit"></i> List Users
                            <div class="card-header-actions">

                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered datatable">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>

                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                      @if($users->count() > 0)
                  @foreach($users as $user)
                                <tr>
                                    {{-- {{$user->username}} --}}
                                    <td>
                                        {{$user->first_name . " " .$user->last_name }}
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                  
                                    <td>
                                        {{($user->roles->first())?$user->roles->first()->display_name:"N.A"}}
                                    </td>
                                    <td>
                                        <a class="btn btn-success" href="#">
                                            <i class="fa fa-search-plus"></i>
                                        </a>
                                        <a class="btn btn-info" href="{{route('user-management.user.edit',[\Illuminate\Support\Facades\Crypt::encrypt($user->id)])}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger" href="#" onclick="deleteUser('{{$user->id}}')">
                                            <i class="fa fa-trash-o"></i>
                                        </a>

<form id="delete-form{{$user->id}}"
                            action="{{ route('user-management.user.delete') }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="id"
                               value="{{\Illuminate\Support\Facades\Crypt::encrypt($user->id)}}">
                      </form>
                                    </td>
                                </tr>
  @endforeach

                @else
                  <tr>
                    <td colspan="4" class="text-center">No User  Set</td>
                  </tr>
                @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </main>

@endsection
<script>


 function deleteUser(key) {


        if (confirm('Are you sure, you want to delete this user?')) {
            event.preventDefault();
            document.getElementById('delete-form' + key).submit();
        } else {
            event.preventDefault();
            document.getElementById('delete-form' + key).reset();
        }




    }



</script>
