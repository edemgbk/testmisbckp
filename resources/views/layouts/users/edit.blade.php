@extends('layouts.app')

@section('content')

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
                                <i class="icon-note"></i>Edit Users
                                <div class="card-header-actions">
                                    <a class="card-header-action" href="#" target="_blank"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    </a>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Simple Form</h6>
                                        <form id="userForm"   method="POST" action="
                                        {{-- {{route('user-management.user.update',[\Illuminate\Support\Facades\Crypt::encrypt($user->id)])}} --}}
                                        ">
                                            @csrf {{method_field('PUT')}}
                                            {{--<input  type="hidden" name="id"  value="{{\Illuminate\Support\Facades\Crypt::encrypt($user->id)}}">--}}

                                            <div class="form-group">
                                                <label class="col-form-label" for="username">Username</label>
                                                <input class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" id="username" type="text" name="username" value="{{ old('username')?old('username'):$user->username }}" placeholder="username" />
                                                @if ($errors->has('username'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('username') }}</small>
                                                    </p>
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label" for="first_name">First Name</label>
                                                <input class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" id="first_name" type="text" name="first_name" value="{{ old('first_name')?old('first_name'):$user->first_name }}" placeholder="first name" />
                                                @if ($errors->has('first_name'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('first_name') }}</small>
                                                    </p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label" for="last_name">last name</label>
                                                <input class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" id="last_name" type="text" name="last_name" value="{{ old('last_name')?old('last_name'):$user->last_name }}" placeholder="last name" />
                                                @if ($errors->has('last_name'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('last_name') }}</small>
                                                    </p>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="col-form-label" for="email">email</label>
                                                <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" type="text" name="email" value="{{ old('email')?old('email'):$user->email }}" placeholder="email" />
                                                @if ($errors->has('email'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('email') }}</small>
                                                    </p>
                                                @endif
                                            </div>

                                            @if($roles->count() > 0)
                                                <fieldset class="form-group">
                                                    <label  class="col-form-label" for="role" >Role</label>

                                                    <select id="role" class="form-control  select2-multiple{{ $errors->has('role') ? ' is-invalid' : '' }}" name="roles[]" multiple="multiple" required>
                                                        <option value="" selected disabled>Select Role</option>
                                                        @if(!empty($roles))
                                                            @foreach($roles as $role)
                                                                <option
                                                                        @if(isset($user->roles->first()->name))
                                                                        @if ($user->roles->first()->name == $role->name)
                                                                        selected
                                                                        @endif
                                                                        @endif
                                                                        value="{{$role->name}}">{{$role->display_name}}
                                                                </option>
                                                            @endforeach
                                                        @endif
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
                                                    <input class="form-control" id="password" type="password" name="password" value="{{ old('password')?old('password'):$user->password }}" />
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="col-form-label" for="confirm_password">Confirm password</label>
                                                    <input class="form-control" id="confirm_password" type="password" name="confirm_password" placeholder="Confirm password" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-primary" type="submit" name="save" value="save">Save</button>
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

            </div>

        </div>

    </main>

@endsection
