@extends('layouts.app')

@section('content')

    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">Expense</li>
        </ol>
        <div class="container-fluid">

            <div class="ui-view">
                <div class="row">

                    <!-- /.col-->
                    <div class=" col-sm-12 col-md-9 accordion" id="accordion">

                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <i class="icon-note"></i>Edit Expense
                                <div class="card-header-actions">
                                    <a class="card-header-action" href="#" target="_blank"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    </a>
                                </div>
                            </div>

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-9">
                                        <h6>Simple Form</h6>
                                        <form id="roleForm"   method="POST" action="{{route('expenses.update',[\Illuminate\Support\Facades\Crypt::encrypt($expense->id)])}}">
                                            @csrf {{method_field('PUT')}}
                                            {{--<input  type="hidden" name="id"  value="{{\Illuminate\Support\Facades\Crypt::encrypt($merchants->id)}}">--}}



                                            <div class="form-group">
                                                <label class="col-form-label" for="date">Date</label>
                                                <input class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" id="startdate" type="date" name="date" value="{{ old('date')?old('startdate'):$expense->date }}" placeholder="date" />
                                                @if ($errors->has('date'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('date') }}</small>
                                                    </p>
                                                @endif
                                            </div>




                                            <div class="form-group">
                                                <label class="col-form-label" for="reference">reference</label>
                                                <input class="form-control {{ $errors->has('treferenceitle') ? ' is-invalid' : '' }}" id="reference" type="text" name="reference" value="{{ old('reference')?old('reference'):$expense->reference }}" placeholder="Enter reference" />
                                                @if ($errors->has('reference'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('reference') }}</small>
                                                    </p>
                                                @endif

                                            </div>


                                            <div class="form-group">
                                                <label class="col-form-label" for="description">description</label>
                                                <input class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" type="text" name="description" value="{{ old('description')?old('description'):$expense->description }}" placeholder="description" />
                                                @if ($errors->has('description'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('description') }}</small>
                                                    </p>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="col-form-label" for="amount">amount</label>
                                                <input class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" id="amount" type="text" amount="status" value="{{ old('amount')?old('amount'):$expense->amount }}" placeholder="amount" />
                                                @if ($errors->has('amount'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('amount') }}</small>
                                                    </p>
                                                @endif
                                            </div>


                                            <div class="form-group">
                                                <label class="col-form-label" for="reports">reports</label>
                                                <input class="form-control {{ $errors->has('reports') ? ' is-invalid' : '' }}" id="reports" type="text" name="reports" value="{{ old('reports')?old('reports'):$expense->reports }}" placeholder="reports" />
                                                @if ($errors->has('reports'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('reports') }}</small>
                                                    </p>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="col-form-label" for="category_id">category</label>
                                                <input class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}" id="category_id" type="text" name="category_id" value="{{ old('category_id')?old('category_id'):$expense->category_id }}" placeholder="category" />
                                                @if ($errors->has('category_id'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('category_id') }}</small>
                                                    </p>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="col-form-label" for="merchant_id">merchant</label>
                                                <input class="form-control {{ $errors->has('merchant_id') ? ' is-invalid' : '' }}" id="merchant_id" type="text" name="merchant_id" value="{{ old('merchant_id')?old('merchant_id'):$expense->merchant_id }}" placeholder="merchant" />
                                                @if ($errors->has('merchant_id'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('merchant_id') }}</small>
                                                    </p>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                            <label class="col-form-label" for="currency_id">currency</label>
                                            <input class="form-control {{ $errors->has('currency_id') ? ' is-invalid' : '' }}" id="currency_id" type="text" name="currency_id" value="{{ old('currency_id')?old('currency_id'):$expense->currency_id }}" placeholder="currency" />
                                            @if ($errors->has('currency_id'))
                                                <p class="text-right mb-0">
                                                    <small class="warning text-muted">{{ $errors->first('currency_id') }}</small>
                                                </p>
                                            @endif
                                        </div>



                                        <div class="form-group">
                                            <label class="col-form-label" for="paidthrough_id">paid through</label>
                                            <input class="form-control {{ $errors->has('paidthrough_id') ? ' is-invalid' : '' }}" id="paidthrough_id" type="text" name="paidthrough_id" value="{{ old('paidthrough_id')?old('paidthrough_id'):$expense->paidthrough_id }}" placeholder="paidthrough" />
                                            @if ($errors->has('paidthrough_id'))
                                                <p class="text-right mb-0">
                                                    <small class="warning text-muted">{{ $errors->first('paidthrough_id') }}</small>
                                                </p>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label class="col-form-label" for="status">status</label>
                                            <input class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" id="status" type="text" name="status" value="{{ old('status')?old('paidthrough_id'):$expense->status }}" placeholder="status" />
                                            @if ($errors->has('status'))
                                                <p class="text-right mb-0">
                                                    <small class="warning text-muted">{{ $errors->first('status') }}</small>
                                                </p>
                                            @endif
                                        </div>

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
