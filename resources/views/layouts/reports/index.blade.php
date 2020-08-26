@extends('layouts.app')

@section('content')

  <main class="c-main">
    <!-- Breadcrumb-->

    <div class="container-fluid">
@permission('create-report')
      <div class="ui-view">

        <div class="row">
          <!-- /.col-->
          <div class=" col-sm-12 col-md-9 accordion" id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <i class="icon-note"></i>Add Report
                <div class="card-header-actions">
                  <a class="card-header-action" href="#" target="_blank"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  </a>

                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9">
                    <h6> </h6>
                    <form id="reportsForm"   method="POST" action="{{ route('reports.create') }}">
                      @csrf


                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="title"> Report Title</label>
                        <div class="col-md-6">
                            <input class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" type="text" name="title" value="{{ old('title')}}" placeholder=" Enter title" />

                            @if ($errors->has('title'))
                            <p class="text-right mb-0">
                              <small class="warning text-muted">{{ $errors->first('title') }}</small>
                            </p>
                          @endif                            </div>
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
                        <label class="col-md-3 col-form-label" for="text-input"> Business Purpose</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="textarea-input" name="purpose" rows="9" placeholder="Content.."></textarea>
                            </div>
                        </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="Date"> Date: from</label>
                            <input class="form-control {{ $errors->has('Date') ? ' is-invalid' : '' }}" id="from" type="Date" name="fromd" value="{{ old('Date')}}" placeholder=" Enter Date" />
                            @if ($errors->has('Date'))
                              <p class="text-right mb-0">
                                <small class="warning text-muted">{{ $errors->first('Date') }}</small>
                              </p>
                            @endif
                          </div>

                          <div class="form-group col-md-6">
                            <label class="col-form-label" for="Date"> Date:to</label>
                            <input class="form-control {{ $errors->has('Date') ? ' is-invalid' : '' }}" id="Date" type="Date" name="tod" value="{{ old('Date')}}" placeholder=" Enter Date" />
                            @if ($errors->has('Date'))
                              <p class="text-right mb-0">
                                <small class="warning text-muted">{{ $errors->first('Date') }}</small>
                              </p>
                            @endif
                          </div>
                    </div>
                      {{-- @else --}}
                      {{-- <div class="form-group">
                      <label for="message">{{__('notice')}}</label>
                      </div> --}}
                      {{-- @endif --}}
                      <div class="form-group">
                        <button class="btn btn-success" type="submit" >Save</button>
                        {{-- <button class="btn btn-success" type="submit" >Save & Send </button> --}}
                        <button class="btn btn-default" type="submit" >cancel</button>

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
              <i class="fa fa-edit"></i> List Reports
              <div class="card-header-actions">

              </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered datatable">

                 <thead>
                    <tr>
                        {{-- <th>Report NUmber</th> --}}
                      <th>Report Title</th>
                      <th>Report Purpose</th>
                      <th>Start Date.</th>
                      <th>End Date</th>
                      <th>Status</th>
                      <th>Submitted On</th>
                      <th>Amount</th>

                      <th>Actions</th>
                    </tr>
                    </thead>
                 <tbody>

                    @if($Reports->count() > 0)
                      @foreach($Reports as $Report)
                    <tr>

                        <td>
                            {{$Report->title}}
                          </td>

                          <td>  {{$Report->purpose}}
                        </td>


                     <td>                           {{$Report->fromd}}
                </td>
                      <td>                            {{$Report->tod}}

                        </td>


                      <td>
                        {{-- {{$Report->status}} --}}
                            {{-- {{$Report->status}} --}}
                            @if($Report->status == 0)
                            <span class="label label-primary">Pending</span>
                            @elseif($Report->status == 1)
                            <span class="label label-success">Approved</span>
                            @elseif($Report->status == 2)
                            <span class="label label-danger">Rejected</span>
                            @else
                            <span class="label label-info">Postponed</span>
                           @endif

                         </td>

                         <td>
                           </td>

                           <td>

                            @foreach($Report->expenses as $expense)
                                    {{$expense->amount}}
                            @endforeach
                           </td>


                      <td>
                        <a class="btn btn-success" href="{{route('reports.view',[\Illuminate\Support\Facades\Crypt::encrypt($Report->id)])}}">

                                view
                          <i class="fa fa-search-plus"></i>
                        </a>

                        <a class="btn btn-info" href="{{route('reports.edit',[\Illuminate\Support\Facades\Crypt::encrypt($Report->id)])}}">
                         edit <i class="fa fa-edit"></i>
                        </a>


                        <a class="btn btn-danger" href=""
                        onclick="deleteExpense('{{$Report->id}}')"
                        >delete
                          <i class="fa fa-trash-o"></i>
                        </a>

                         <form id="delete-form{{$Report->id}}"
                                action="
                                {{ route('expenses.delete') }}
                                " method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')

                            <input type="hidden" name="id"
                                   value="{{\Illuminate\Support\Facades\Crypt::encrypt($Report->id)}}">
                          </form>
                       </td>
                    </tr>
                      @endforeach
                    @else
                      <tr>
                        <td colspan="4" class="text-center">No report  Set</td>
                      </tr>
                    @endif
                    </tbody>
                </table>
            </div>
          </div>
        </div>
        @endpermission


        @permission('approve-report')

            <div class="animated fadeIn">
              <div class="card">
                <div class="card-header">
                  <i class="fa fa-edit"></i> List Reports
                  <div class="card-header-actions">

                  </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered datatable">

                     <thead>
                        <tr>
                            {{-- <th>Report NUmber</th> --}}
                          <th>Report Title</th>
                          <th>Report Purpose</th>
                          <th>Start Date.</th>
                          <th>End Date</th>
                          <th>Status</th>
                          <th>Submitted On</th>
                          <th>Amount</th>

                          <th>Actions</th>
                        </tr>
                        </thead>
                     <tbody>

                        @if($Reports->count() > 0)
                          @foreach($Reports as $Report)
                        <tr>

                            <td>
                                {{$Report->title}}
                              </td>

                              <td>  {{$Report->purpose}}
                            </td>


                         <td>                           {{$Report->fromd}}
                    </td>
                          <td>                            {{$Report->tod}}

                            </td>


                          <td>
                            {{-- {{$Report->status}} --}}

                        @if($Report->status == 0)
                        <span class="badge badge-primary">Pending</span>
                        @elseif($Report->status == 1)
                        <span class="badge badge-success">Approved</span>
                        @elseif($Report->status == 2)
                        <span class="badge badge-danger">Rejected</span>
                        @else
                        <span class="badge badge-info">Postponed</span>
                       @endif

                             </td>

                             <td>
                               </td>


                               <td>

                                @foreach($Report->expenses as $expense)
                                        {{$expense->amount}}
                                @endforeach
                               </td>

                          <td>
                            <a class="btn btn-success" href="{{route('reports.view',[\Illuminate\Support\Facades\Crypt::encrypt($Report->id)])}}">

                              <i class="fa fa-search-plus"> view</i>
                            </a>

                            <a class="btn btn-info" href="{{route('reports.edit',[\Illuminate\Support\Facades\Crypt::encrypt($Report->id)])}}">
                              <i class="fa fa-edit"> edit</i>
                            </a>

                            <a class="btn btn-danger" href=""
                            onclick="deleteReport('{{$Report->id}}')">
                            <i class="fa fa-trash-o"> delete</i>
                            </a>

                             <form id="delete-form{{$Report->id}}"
                                    action="{{ route('reports.delete') }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')

                                <input type="hidden" name="id"
                                       value="{{\Illuminate\Support\Facades\Crypt::encrypt($Report->id)}}">
                              </form>

                           </td>
                        </tr>
                          @endforeach
                        @else
                          <tr>
                            <td colspan="4" class="text-center">No report  Set</td>
                          </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
              </div>
            </div>

        @endpermission

    </div>

  </main>

@endsection
<script>
    function deleteReport(key) {


        if (confirm('Are you sure, you want to delete this role?')) {
            event.preventDefault();
            document.getElementById('delete-form' + key).submit();
        } else {
            event.preventDefault();
            document.getElementById('delete-form' + key).reset();
        }

    }

</script>
