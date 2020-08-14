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
                <i class="icon-note"></i>Add Report
                <div class="card-header-actions">
                  <a class="card-header-action" href="#" target="_blank"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9">
                    <h6>Expense </h6>
                    <form id="roleForm"   method="POST" action="">
                      @csrf
                      <div class="form-group">
                        <label class="col-form-label" for="name"> Report Title</label>
                        {{-- <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" type="text" name="name" value="{{ old('name')}}" placeholder=" Enter Name" />
                        @if ($errors->has('name'))
                          <p class="text-right mb-0">
                            <small class="warning text-muted">{{ $errors->first('name') }}</small>
                          </p>
                        @endif --}}
                        <select class="form-control form-control" id="select3" name="select3">
                            <option value="0"></option>
                            <option value="1"></option>
                            <option value="2"></option>
                            <option value="3"></option>
                            </select>

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
                            <textarea class="form-control" id="textarea-input" name="textarea-input" rows="9" placeholder="Content.."></textarea>
                            </div>
                        </div>
<div class="row">
                        <div class="form-group col-md-6">
                            <label class="col-form-label" for="Date"> Date: from</label>
                            <input class="form-control {{ $errors->has('Date') ? ' is-invalid' : '' }}" id="Date" type="Date" name="Date" value="{{ old('Date')}}" placeholder=" Enter Date" />
                            @if ($errors->has('Date'))
                              <p class="text-right mb-0">
                                <small class="warning text-muted">{{ $errors->first('Date') }}</small>
                              </p>
                            @endif
                          </div>

                          <div class="form-group col-md-6">
                            <label class="col-form-label" for="Date"> Date:to</label>
                            <input class="form-control {{ $errors->has('Date') ? ' is-invalid' : '' }}" id="Date" type="Date" name="Date" value="{{ old('Date')}}" placeholder=" Enter Date" />
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
                        <button class="btn btn-primary" type="submit" name="save" value="save">Save</button>
                        <button class="btn btn-primary" type="submit" name="save" value="save">Save & Send </button>

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
                      <th>Date</th>
                      <th>Category</th>
                      <th>Merchant.</th>
                      <th>Report</th>
                      <th>Status</th>
                      <th>Amount</th>

                      <th>Actions</th>
                    </tr>
                    </thead>
                 <tbody>

                    {{-- @if($roles->count() > 0) --}}
                      {{-- @foreach($roles as $role) --}}
                    <tr>
                        <td>
                            {{-- {{$role->name}} --}}
                          </td>
                        <td>
                            {{-- {{$role->display_name}} --}}
                          </td>
                        <td>
                            {{-- {{$role->description}} --}}
                          </td>
                      <td>
                          {{-- {{$role->name}} --}}
                        </td>
                      <td>
                          {{-- {{$role->display_name}} --}}
                        </td>
                      <td>
                          {{-- {{$role->description}} --}}
                        </td>

                      <td>
                        <a class="btn btn-success" href="{{route('reportsgi.view')}}"
                        {{-- {{route('user-management.roles.view',[\Illuminate\Support\Facades\Crypt::encrypt($role->id)])}} --}}
                        >
                          <i class="fa fa-search-plus"></i>
                        </a>
                        <a class="btn btn-info" href="
                        {{-- {{route('user-management.roles.edit',[\Illuminate\Support\Facades\Crypt::encrypt($role->id)])}} --}}
                        ">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a class="btn btn-danger" href=""
                        {{-- onclick="deleteRole('{{$role->id}}')" --}}
                        >
                          <i class="fa fa-trash-o"></i>
                        </a>

                         {{-- <form id="delete-form{{$role->id}}"
                                action="{{ route('user-management.roles.delete') }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')

                            <input type="hidden" name="id"
                                   value="{{\Illuminate\Support\Facades\Crypt::encrypt($role->id)}}">
                          </form> --}}

                      </td>
                    </tr>
                      {{-- @endforeach
                    @else
                      <tr>
                        <td colspan="4" class="text-center">No role  Set</td>
                      </tr>
                    @endif --}}
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
    function deleteRole(key) {


        if (confirm('Are you sure, you want to delete this role?')) {
            event.preventDefault();
            document.getElementById('delete-form' + key).submit();
        } else {
            event.preventDefault();
            document.getElementById('delete-form' + key).reset();
        }




    }

                                </script>
