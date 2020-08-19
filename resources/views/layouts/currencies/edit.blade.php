@extends('layouts.app')

@section('content')

    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">Currency</li>
        </ol>
        <div class="container-fluid">

            <div class="ui-view">
                <div class="row">

                    <!-- /.col-->
                    <div class=" col-sm-12 col-md-12 accordion" id="accordion">

                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <i class="icon-note"></i>Edit Currency
                                <div class="card-header-actions">
                                    <a class="card-header-action" href="#" target="_blank"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    </a>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Simple Form</h6>
                                        <form id="CurrencyForm"   method="POST" action="{{route('user-management.currencies.update',[\Illuminate\Support\Facades\Crypt::encrypt($Currency->id)])}}">
                                            @csrf {{method_field('PUT')}}
                                            {{--<input  type="hidden" name="id"  value="{{\Illuminate\Support\Facades\Crypt::encrypt($role->id)}}">--}}

                                            <div class="form-group">
                                                <label class="col-form-label" for="name">Name</label>
                                                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" type="text" name="name" value="{{ old('name')?old('name'):$Currency->name }}" placeholder=" name" />
                                                @if ($errors->has('name'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('name') }}</small>
                                                    </p>
                                                @endif

                                            </div>

                                            <div class="form-group">
                                                <label class="col-form-label" for="symbol">symbol</label>
                                                <input class="form-control {{ $errors->has('symbol') ? ' is-invalid' : '' }}" id="symbol" type="text" name="symbol" value="{{ old('symbol')?old('symbol'):$Currency->symbol }}" placeholder="symbol" />
                                                @if ($errors->has('symbol'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('symbol') }}</small>
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
