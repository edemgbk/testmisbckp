@extends('layouts.app')

@section('content')

    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">Roles</li>
        </ol>
        <div class="container-fluid">

            <div class="ui-view">
                <div class="row">

                    <!-- /.col-->
                    <div class=" col-sm-12 col-md-12 accordion" id="accordion">

                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <i class="icon-note"></i>Edit Merchant
                                <div class="card-header-actions">
                                    <a class="card-header-action" href="#" target="_blank"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    </a>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Simple Form</h6>
                                        <form id="roleForm"   method="POST" action="{{route('user-management.merchants.update',[\Illuminate\Support\Facades\Crypt::encrypt($merchants->id)])}}">
                                            @csrf {{method_field('PUT')}}
                                            {{--<input  type="hidden" name="id"  value="{{\Illuminate\Support\Facades\Crypt::encrypt($merchants->id)}}">--}}

                                            <div class="form-group">
                                                <label class="col-form-label" for="name">Name</label>
                                                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" type="text" name="name" value="{{ old('name')?old('name'):$merchants->name }}" placeholder=" name" />
                                                @if ($errors->has('name'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('name') }}</small>
                                                    </p>
                                                @endif

                                            </div>

                                            <div class="form-group">
                                                <label class="col-form-label" for="code">Code</label>
                                                <input class="form-control {{ $errors->has('code') ? ' is-invalid' : '' }}" id="code" type="text" name="code" value="{{ old('code')?old('code'):$merchants->code }}" placeholder="code" />
                                                @if ($errors->has('code'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('code') }}</small>
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
