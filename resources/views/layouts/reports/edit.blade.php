@extends('layouts.app')

@section('content')

    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">Report</li>
        </ol>
        <div class="container-fluid">

            <div class="ui-view">
                <div class="row">

                    <!-- /.col-->
                    <div class=" col-sm-12 col-md-12 accordion" id="accordion">

                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <i class="icon-note"></i>Edit Report
                                <div class="card-header-actions">
                                    <a class="card-header-action" href="#" target="_blank"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    </a>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <h6>Simple Form</h6>
                                        <form id="roleForm"   method="POST" action="{{route('reports.update',[\Illuminate\Support\Facades\Crypt::encrypt($Report->id)])}}">
                                            @csrf {{method_field('PUT')}}
                                            {{--<input  type="hidden" name="id"  value="{{\Illuminate\Support\Facades\Crypt::encrypt($merchants->id)}}">--}}

                                            <div class="form-group">
                                                <label class="col-form-label" for="title">title</label>
                                                <input class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" type="text" name="title" value="{{ old('title')?old('title'):$Report->title }}" placeholder="Enter title" />
                                                @if ($errors->has('title'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('title') }}</small>
                                                    </p>
                                                @endif

                                            </div>


                                            <div class="form-group">
                                                <label class="col-form-label" for="purpose">purpose</label>
                                                <input class="form-control {{ $errors->has('purpose') ? ' is-invalid' : '' }}" id="purpose" type="text" name="purpose" value="{{ old('purpose')?old('purpose'):$Report->purpose }}" placeholder="purpose" />
                                                @if ($errors->has('purpose'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('purpose') }}</small>
                                                    </p>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="col-form-label" for="startdate">start date</label>
                                                <input class="form-control {{ $errors->has('startdate') ? ' is-invalid' : '' }}" id="startdate" type="Date" name="fromd" value="{{ old('startdate')?old('startdate'):$Report->fromd }}" placeholder="from" />
                                                @if ($errors->has('startdate'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('startdate') }}</small>
                                                    </p>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="col-form-label" for="end_date">end date</label>
                                                <input class="form-control {{ $errors->has('end_date') ? ' is-invalid' : '' }}" id="end_date" type="Date" name="tod" value="{{ old('end_date')?old('end_date'):$Report->tod }}" placeholder="to" />
                                                @if ($errors->has('end_date'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('end_date') }}</small>
                                                    </p>
                                                @endif
                                            </div>

                                            {{-- <div class="form-group">
                                                <label class="col-form-label" for="status">status</label>
                                                <input class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" id="status" type="text" name="status" value="{{ old('status')?old('status'):
                                                $Report->status }}" placeholder="status" />
                                                @if ($errors->has('status'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('status') }}</small>
                                                    </p>
                                                @endif
                                            </div> --}}


                                            {{-- <div class="form-group">
                                                <label class="col-form-label" for="submittedon">submittedon</label>
                                                <input class="form-control {{ $errors->has('submittedon') ? ' is-invalid' : '' }}" id="submittedon" type="text" name="submittedon" value="{{ old('submittedon')?old('submittedon'):$Report->submittedon }}" placeholder="submittedon" />
                                                @if ($errors->has('submittedon'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('submittedon') }}</small>
                                                    </p>
                                                @endif
                                            </div> --}}

                                            {{-- <div class="form-group">
                                                <label class="col-form-label" for="amount">amount</label>
                                                <input class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" id="amount" type="text" name="amount" value="{{ old('amount')?old('amount'):$Report->amount }}" placeholder="amount" />
                                                @if ($errors->has('amount'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('amount') }}</small>
                                                    </p>
                                                @endif
                                            </div> --}}


                                            <div class="form-group">
                                                <button class="btn btn-primary" type="submit">Save</button>
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
