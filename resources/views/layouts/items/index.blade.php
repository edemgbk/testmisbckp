@extends('layouts.app')

@section('content')

  <main class="c-main">
    <!-- Breadcrumb-->

    <div class="container-fluid">
      <div class="ui-view">

        <div class="row">
          <!-- /.col-->
          <div class=" col-sm-12 col-md-12 accordion" id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <i class="icon-note"></i>Add Item
                <div class="card-header-actions">
                  <a class="card-header-action" href="#" target="_blank"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <h6>Simple Form</h6>
                    <form id="roleForm"   method="POST" action="">
                      @csrf

                      <div class="form-group row">
                        <label class="col-md-3 col-form-label">Customer Type</label>
                        <div class="col-md-3 col-form-label">
                        <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" id="inline-radio1" type="radio" value="option1" name="inline-radios">
                        <label class="form-check-label" for="inline-radio1">Business</label>
                        </div>
                        <div class="form-check form-check-inline mr-1">
                        <input class="form-check-input" id="inline-radio2" type="radio" value="option2" name="inline-radios">
                        <label class="form-check-label" for="inline-radio2">Indivivual</label>
                        </div>

                        </div>
                 </div>
                      <div class="form-group">
                        <label class="col-form-label" for="Address">Name</label>
                        <input class="form-control {{ $errors->has('Address') ? ' is-invalid' : '' }}" id="Address" type="text" name="Address" value="{{ old('Address')}}" placeholder="Enter Address" />
                        @if ($errors->has('Address'))
                          <p class="text-right mb-0">
                            <small class="warning text-muted">{{ $errors->first('Address') }}</small>
                          </p>
                        @endif
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="hf-email">Unit</label>


                        <div class="col-md-3">
                            <select class="form-control form-control" id="select3" name="select3">
                            <option value="0">salutation</option>
                            <option value="1">mr</option>
                            <option value="2">mrs</option>
                            <option value="3">ms</option>
                            </select>
                            </div>



                        </div>
                      <div class="form-group">
                        <label class="col-form-label" for="Date"> Selling Price</label>
                        <input class="form-control {{ $errors->has('Description') ? ' is-invalid' : '' }}" id="Description" type="text" name="Description" value="{{ old('Description')}}" placeholder="Enter Description" />
                        @if ($errors->has('Description'))
                          <p class="text-right mb-0">
                            <small class="warning text-muted">{{ $errors->first('Description') }}</small>
                          </p>
                        @endif
                      </div>

                      <div class="form-group">
                        <label class="col-form-label" for="Date">Description</label>
                        <input class="form-control {{ $errors->has('Description') ? ' is-invalid' : '' }}" id="Description" type="text" name="Description" value="{{ old('Description')}}" placeholder="Enter Description" />
                        @if ($errors->has('Description'))
                          <p class="text-right mb-0">
                            <small class="warning text-muted">{{ $errors->first('Description') }}</small>
                          </p>
                        @endif
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="hf-email">Tax</label>


                        <div class="col-md-3">
                            <select class="form-control form-control" id="select3" name="select3">
                            <option value="0">salutation</option>
                            <option value="1">mr</option>
                            <option value="2">mrs</option>
                            <option value="3">ms</option>
                            </select>
                            </div>

                       

                        </div>

                      {{--<script src="{{asset('js/advanced-forms.js')}}" defer>--}}
                          {{--$('#select2-1, #select2-2, #select2-4').select2({--}}
                              {{--theme: 'bootstrap'--}}
                          {{--});--}}
                      {{--</script>--}}

                      {{-- @if($permissions->count() > 0) --}}
                      <fieldset class="form-group">
                        <label  class="col-form-label" for="permission" >N/B</label>
                        {{-- <select class="form-control select2-multiple" name="permissions[]" id="select2-2" multiple="multiple" required > --}}

                          {{-- @foreach($permissions as $permission)
                          <option value="{{$permission->id}}">{{$permission->name}}</option>
                          @endforeach --}}

                        {{-- </select> --}}
                        @if ($errors->has('permissions'))
                        <p class="text-right">
                        <small class="warning text-muted">{{ $errors->first('permissions') }}</small>
                        </p>
                        @endif
                      </fieldset>

                      {{-- @else --}}
                      <div class="form-group">
                      <label for="message">{{__('notice')}}</label>
                      </div>
                      {{-- @endif --}}
                      <div class="form-group">
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
              <i class="fa fa-edit"></i> List Invoices
              <div class="card-header-actions">

              </div>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered datatable">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Address</th>
                  <th>AccountNo.</th>
                  <th>Date</th>
                  <th>Description</th>
                  <th>Amount</th>

                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                {{-- @if($roles->count() > 0)
                  @foreach($roles as $role)
                <tr>
                  <td>{{$role->name}}</td>
                  <td>{{$role->display_name}}</td>
                  <td>{{$role->description}}</td>

                  <td>
                    <a class="btn btn-success" href="{{route('user-management.roles.view',[\Illuminate\Support\Facades\Crypt::encrypt($role->id)])}}">
                      <i class="fa fa-search-plus"></i>
                    </a>
                    <a class="btn btn-info" href="{{route('user-management.roles.edit',[\Illuminate\Support\Facades\Crypt::encrypt($role->id)])}}">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger" href="" onclick="deleteRole('{{$role->id}}')">
                      <i class="fa fa-trash-o"></i>
                    </a>

                     <form id="delete-form{{$role->id}}"
                            action="{{ route('user-management.roles.delete') }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="id"
                               value="{{\Illuminate\Support\Facades\Crypt::encrypt($role->id)}}">
                      </form>

                  </td>
                </tr>
                  @endforeach
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
