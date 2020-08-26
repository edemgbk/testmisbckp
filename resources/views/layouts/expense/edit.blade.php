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
                                                <input class="form-control {{ $errors->has('date') ? ' is-invalid' : '' }}" id="date" type="date" name="date" value="{{ old('date')?old('date'):$expense->date }}" placeholder="date" />
                                                @if ($errors->has('date'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('date') }}</small>
                                                    </p>
                                                @endif
                                            </div>




                                            <div class="form-group">
                                                <label class="col-form-label" for="reference">reference</label>
                                                <input class="form-control {{ $errors->has('reference') ? ' is-invalid' : '' }}" id="reference" type="text" name="reference" value="{{ old('reference')?old('reference'):$expense->reference }}" placeholder="Enter reference" />
                                                @if ($errors->has('reference'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('reference') }}</small>
                                                    </p>
                                                @endif

                                            </div>


                                            <div class="form-group">
                                                <label class="col-form-label" for="description">description</label>
                                                <textarea class="form-control" id="textarea-input" name="description" rows="9" placeholder="Content.." value="{{ old('description')?old('description'):$expense->description }}"></textarea>
                                                @if ($errors->has('description'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('description') }}</small>
                                                    </p>
                                                @endif
                                            </div>

                                            <div class="form-group">
                                                <label class="col-form-label" for="amount">amount</label>
                                                <input class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" id="amount" type="text" name="amount" value="{{ old('amount')?old('amount'):$expense->amount }}" placeholder="amount" />
                                                @if ($errors->has('amount'))
                                                    <p class="text-right mb-0">
                                                        <small class="warning text-muted">{{ $errors->first('amount') }}</small>
                                                    </p>
                                                @endif
                                            </div>

                                            <fieldset class="form-group">
                                                <label  class="col-form-label" for="report" >report</label>
                                                <select class="form-control" name="report_id" required >
                                                       @foreach($reports as $report)
                                                                                <option @if($report->id) selected
                                                                                        @endif value="{{$report->id}}">{{$report->name}}</option>
                                                                            @endforeach
                                                    </select>
                                                @if ($errors->has('report'))
                                                <p class="text-right">
                                                <small class="warning text-muted">{{ $errors->first('report') }}</small>
                                                </p>
                                                @endif
                                              </fieldset>



                                            <fieldset class="form-group">
                                                <label  class="col-form-label" for="category" >category</label>
                                                <select class="form-control" name="category_id" required >
                                                       @foreach($categories as $category)
                                                                                <option @if($category->id) selected
                                                                                        @endif value="{{$category->id}}">{{$category->name}}</option>
                                                                            @endforeach
                                                    </select>
                                                @if ($errors->has('category'))
                                                <p class="text-right">
                                                <small class="warning text-muted">{{ $errors->first('category') }}</small>
                                                </p>
                                                @endif
                                              </fieldset>



                                            <fieldset class="form-group">
                                                <label  class="col-form-label" for="merchant" >merchant</label>
                                                <select class="form-control" name="merchant_id" required >
                                                       @foreach($merchants as $merchant)
                                                                                <option @if($merchant->id) selected
                                                                                        @endif value="{{$merchant->id}}">{{$merchant->name}}</option>
                                                                            @endforeach
                                                    </select>
                                                @if ($errors->has('merchant'))
                                                <p class="text-right">
                                                <small class="warning text-muted">{{ $errors->first('merchant') }}</small>
                                                </p>
                                                @endif
                                              </fieldset>


                                              <fieldset class="form-group">
                                                <label  class="col-form-label" for="currency" >currency</label>
                                                <select class="form-control" name="currency_id" required>
                                                       @foreach($currencies as $currency)
                                                                                <option @if($currency->id) selected
                                                                                        @endif value="{{$currency->id}}">{{$currency->name}}</option>
                                                                            @endforeach
                                                    </select>
                                                @if ($errors->has('currency'))
                                                <p class="text-right">
                                                <small class="warning text-muted">{{ $errors->first('currency') }}</small>
                                                </p>
                                                @endif
                                              </fieldset>



                                            {{-- <label class="col-form-label" for="paidthrough_id">paid through</label>
                                            <input class="form-control {{ $errors->has('paidthrough_id') ? ' is-invalid' : '' }}" id="paidthrough_id" type="text" name="paidthrough_id" value="{{ old('paidthrough_id')?old('paidthrough_id'):$expense->paidthrough_id }}" placeholder="paidthrough" />
                                            @if ($errors->has('paidthrough_id'))
                                                <p class="text-right mb-0">
                                                    <small class="warning text-muted">{{ $errors->first('paidthrough_id') }}</small>
                                                </p>
                                            @endif --}}


                                          {{-- <div class="form-group{{ $errors->has('paidthrough') ? ' form-control-warning' : '' }}">
                                            <label for="paidthrough">PaidTThrough <span class="required">*</span></label>
                                            <select name="paidthrough_id" id="paidthrough" class="form-control"  style="width: 100%">

                                            </select>
                                            @if ($errors->has('paidthrough'))
                                                <p class="text-right">
                                                    <small class="warning text-muted">{{ $errors->first('paidthrough') }}</small>
                                                </p>
                                            @endif
                                        </div>

                                         --}}


                                        {{-- <div class="form-group">
                                            <label class="col-form-label" for="status">status</label>
                                            <input class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}" id="status" type="text" name="status" value="{{ old('status')?old('paidthrough_id'):$expense->status }}" placeholder="status" />
                                            @if ($errors->has('status'))
                                                <p class="text-right mb-0">
                                                    <small class="warning text-muted">{{ $errors->first('status') }}</small>
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
