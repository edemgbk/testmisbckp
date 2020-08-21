@extends('layouts.app')

@section('content')

  <main class="c-main">
    <!-- Breadcrumb-->

    <div class="container-fluid">
      <div class="ui-view">

        <div class="row">
          <!-- /.col-->
          <div class=" col-sm-12 col-md-9 accordion" id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <i class="icon-note"></i>Add Expense
              {{-- <a href="{{route('applications')}}">view</a> --}}
                <div class="card-header-actions">
                  <a class="card-header-action" href="#" target="_blank"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <h6>Expense </h6>
                    <form id="roleForm"   method="POST" action="{{ route('expenses.create')}}">
                      @csrf
                      <div class="form-group">
                        <label class="col-form-label" for="Date"> Expense Date*</label>
                        <input class="form-control {{ $errors->has('Date') ? ' is-invalid' : '' }}" id="Date" type="Date" name="date" value="{{ old('Date')}}" placeholder=" Enter Expense Date" />
                        @if ($errors->has('Date'))
                          <p class="text-right mb-0">
                            <small class="warning text-muted">{{ $errors->first('Date') }}</small>
                          </p>
                        @endif
                      </div>

                      <div class="form-group{{ $errors->has('category') ? ' form-control-warning' : '' }}">
                        <label for="category">Category <span class="required">*</span></label>
                        <select name="category_id" id="category" class="form-control"  style="width: 100%">
                            @foreach($Categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category'))
                            <p class="text-right">
                                <small class="warning text-muted">{{ $errors->first('category') }}</small>
                            </p>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('merchants') ? ' form-control-warning' : '' }}">
                        <label for="merchants">Merchant <span class="required"></span></label>
                        <select name="merchant_id" id="merchants" class="form-control"  style="width: 100%">
                            @foreach($Merchants as $merchant)
                                <option value="{{$merchant->id}}">{{$merchant->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('merchants'))
                            <p class="text-right">
                                <small class="warning text-muted">{{ $errors->first('merchants') }}</small>
                            </p>
                        @endif
                    </div>

                      <div class="form-group">
                        <label class="col-form-label" for="reference">Reference</label>
                        <input class="form-control {{ $errors->has('reference') ? ' is-invalid' : '' }}" id="reference" type="text" name="reference" value="{{ old('reference')}}" placeholder="Enter reference" />
                        @if ($errors->has('reference'))
                          <p class="text-right mb-0">
                            <small class="warning text-muted">{{ $errors->first('reference') }}</small>
                          </p>
                        @endif
                      </div>

                      {{-- <div class="form-group">
                        <label class="col-form-label" for="Date">Amount</label>
                        <input class="form-control {{ $errors->has('Description') ? ' is-invalid' : '' }}" id="Description" type="text" name="Description" value="{{ old('Description')}}" placeholder="Enter Description" />
                        @if ($errors->has('Description'))
                          <p class="text-right mb-0">
                            <small class="warning text-muted">{{ $errors->first('Description') }}</small>
                          </p>
                        @endif
                      </div> --}}

                      <div class="form-group">
                        <label class="col-form-label" for="appendedPrependedInput">Amount*</label>
                        <div class="controls">
                        <div class="input-prepend input-group">
                        <div class="input-group-prepend">


                            <div class="form-group{{ $errors->has('currency_id') ? ' form-control-warning' : '' }}">
                                <select name="currency_id" id="currency_id" class="form-control"  style="width: 100%">
                                    @foreach($Currencys as $Currency)
                                        <option value="{{$Currency->id}}">{{$Currency->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('currency_id'))
                                    <p class="text-right">
                                        <small class="warning text-muted">{{ $errors->first('currency_id') }}</small>
                                    </p>
                                @endif
                            </div>

                        </div>
                        <input class="form-control" id="appendedPrependedInput" name="amount" size="16" type="text">
                        @if ($errors->has('Description'))
                        <p class="text-right mb-0">
                          <small class="warning text-muted">{{ $errors->first('Description') }}</small>
                        </p>
                      @endif
                        </div>
                         </div>
                        </div>

                        <div class="form-group{{ $errors->has('paidthrough') ? ' form-control-warning' : '' }}">
                            <label for="paidthrough">PaidTThrough <span class="required">*</span></label>
                            <select name="paidthrough_id" id="paidthrough" class="form-control"  style="width: 100%">
                                @foreach($Paid_Through as $paidthru)
                                    <option value="{{$paidthru->id}}">{{$paidthru->accountname}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('paidthrough'))
                                <p class="text-right">
                                    <small class="warning text-muted">{{ $errors->first('paidthrough') }}</small>
                                </p>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label"></label>
                            <div class="col-md-3 col-form-label">



                            </div>
                     </div>

                      {{--<script src="{{asset('js/advanced-forms.js')}}" defer>--}}
                          {{--$('#select2-1, #select2-2, #select2-4').select2({--}}
                              {{--theme: 'bootstrap'--}}
                          {{--});--}}
                      {{--</script>--}}

                      {{-- @if($permissions->count() > 0) --}}
                      {{-- <fieldset class="form-group"> --}}
                        {{-- <label  class="col-form-label" for="permission" >N/B</label> --}}
                        {{-- <select class="form-control select2-multiple" name="permissions[]" id="select2-2" multiple="multiple" required > --}}

                          {{-- @foreach($permissions as $permission)
                          <option value="{{$permission->id}}">{{$permission->name}}</option>
                          @endforeach --}}

                        {{-- </select> --}}
                        {{-- @if ($errors->has('permissions'))
                        <p class="text-right">
                        <small class="warning text-muted">{{ $errors->first('permissions') }}</small>
                        </p>
                        @endif
                      </fieldset> --}}

                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input"> Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="textarea-input" name="description" rows="9" placeholder="Content.."></textarea>
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <label class="col-form-label" for="name"> Add to A report</label>
                            {{-- <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" type="text" name="name" value="{{ old('name')}}" placeholder=" Enter Name" />
                            @if ($errors->has('name'))
                              <p class="text-right mb-0">
                                <small class="warning text-muted">{{ $errors->first('name') }}</small>
                              </p>
                            @endif --}}
                            {{-- <select class="form-control form-control" id="select3" name="reports">
                                <option value="report1">report1</option>
                                <option value="report2">report2</option>
                                <option value="2"></option>
                                <option value="3"></option>
                                </select>

                          </div>  --}}


                          <div class="form-group{{ $errors->has('reports') ? ' form-control-warning' : '' }}">
                            <label for="reports">Add to a report <span class="required">*</span></label>
                            <select name="reports" id="reports" class="form-control"  style="width: 100%">
                                @foreach($Reports as $Report)
                                    <option value="{{$Report->id}}">{{$Report->title}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('reports'))
                                <p class="text-right">
                                    <small class="warning text-muted">{{ $errors->first('reports') }}</small>
                                </p>
                            @endif
                        </div>


                          {{-- <div class="form-group{{ $errors->has('reports') ? ' form-control-warning' : '' }}">
                            <label for="reports">Merchant <span class="required">*</span></label>
                            <select name="reports" id="reports" class="form-control"  style="width: 100%">
                                @foreach($Merchants as $merchant)
                                    <option value="{{$merchant->id}}">{{$merchant->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('reports'))
                                <p class="text-right">
                                    <small class="warning text-muted">{{ $errors->first('reports') }}</small>
                                </p>
                            @endif
                        </div> --}}

                      {{-- @else --}}
                      {{-- <div class="form-group">
                      <label for="message">{{__('notice')}}</label>
                      </div> --}}
                      {{-- @endif --}}
                      <div class="form-group">
                        <button class="btn btn-primary" type="submit">Save </button>
                        <button class="btn btn-default" type="submit">cancel </button>

                        {{-- <button class="btn btn-primary" type="submit" name="save" value="save">Save &</button> --}}

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
              <i class="fa fa-edit"></i> List Expenses
              <div class="card-header-actions">

              </div>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered datatable">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Category</th>
                  <th>Merchant.</th>
                  <th>Report</th>
                  <th>Status</th>
                  {{-- <th>paidthrough</th> --}}
                  <th>Amount</th>
                  <th>Actions</th>
                </tr>
                </thead>
            <tbody>

                @if($Expenses->count() > 0)
                 @foreach($Expenses as $Expense)
                <tr>
                    <td>
                        {{$Expense->date}}
                      </td>
                    <td>
                        {{-- {{$Expense->category_id}} --}}
                        @foreach($Expense->categories as $category)

                      {{$category->name}}
                      @endforeach
                      </td>
                    <td>

                        {{-- @foreach($Expense->merchants as $merchant)

                        {{$merchant->name}}
                        @endforeach --}}
                    </td>
                  <td>
                    @foreach($Expense->reports as $report)

                      {{$report->title}}
                      @endforeach
                    </td>

                    <td>
                        {{$Expense->status}}

                    </td>

                 <td>
                    {{$Expense->currency_id}}
                    {{$Expense->amount}}

                </td>

                  <td>
                    <a class="btn btn-success" href="{{route('expenses.view',[\Illuminate\Support\Facades\Crypt::encrypt($Expense->id)])}}">
                      <i class="fa fa-search-plus"></i>
                    </a>
                    <a class="btn btn-info" href="{{route('expenses.edit',[\Illuminate\Support\Facades\Crypt::encrypt($Expense->id)])}}">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger" href=""
                    onclick="deleteExpense('{{$Expense->id}}')"
                    >
                      <i class="fa fa-trash-o"></i>
                    </a>

                     <form id="delete-form{{$Expense->id}}"
                            action="
                            {{ route('expenses.delete') }}
                            " method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="id"
                               value="{{\Illuminate\Support\Facades\Crypt::encrypt($Expense->id)}}">
                      </form>

                  </td>
                </tr>
                   @endforeach
                @else
                  <tr>
                    <td colspan="4" class="text-center">No role  Set</td>
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
    function deleteExpense(key) {


        if (confirm('Are you sure, you want to delete this role?')) {
            event.preventDefault();
            document.getElementById('delete-form' + key).submit();
        } else {
            event.preventDefault();
            document.getElementById('delete-form' + key).reset();
        }




    }

                                </script>
