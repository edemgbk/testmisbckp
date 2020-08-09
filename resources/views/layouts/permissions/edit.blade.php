@extends('layouts.app')

@section('content')
    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">Permissions</li>
        </ol>
        <div class="container-fluid">

            <div class="ui-view">
                <div class="row">

                    <!-- /.col-->
                    <div class=" col-sm-12 col-md-12 accordion" id="accordion">

                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <i class="icon-note"></i>Edit Permissions
                                <div class="card-header-actions">
                                    <a class="card-header-action" href="#" target="_blank"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Simple Form</h6>
                                        <form id="permissionForm"   method="POST" action="{{ route('user-management.permissions.update',[\Illuminate\Support\Facades\Crypt::encrypt($permission->id)]) }}">
                                            @csrf {{method_field('PUT')}}
                                        {{--<input  type="hidden" name="id"  value="{{\Illuminate\Support\Facades\Crypt::encrypt($permission->id)}}">--}}
                                            <div class="form-group">
                                                <label class="col-form-label" for="name">Name</label>
                                                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" type="text" name="name" value="{{ old('name')?old('name'):$permission->name }}" placeholder=" name" />
                                                @if ($errors->has('name'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('name') }}</small>
                                                    </p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label" for="display_name">Display Name</label>
                                                <input class="form-control {{ $errors->has('display_name') ? ' is-invalid' : '' }}" id="display_name" type="text" name="display_name" value="{{ old('display_name')?old('display_name'):$permission->display_name }}" placeholder="Display name" />
                                                @if ($errors->has('display_name'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('display_name') }}</small>
                                                    </p>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="col-form-label" for="username">Description</label>
                                                <input class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" type="text" name="description" value="{{ old('description')?old('description'):$permission->description }}" placeholder="description" />
                                                @if ($errors->has('description'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('description') }}</small>
                                                    </p>
                                                @endif
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
