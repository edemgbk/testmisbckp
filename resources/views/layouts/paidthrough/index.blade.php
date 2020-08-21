@extends('layouts.app')

@section('content')

  <main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Home</li>
      <li class="breadcrumb-item">
        <a href="#">Admin</a>
      </li>
      <li class="breadcrumb-item active">Paid Through</li>
    </ol>
    <div class="container-fluid">
      <div class="ui-view">
        <div class="row">
          <!-- /.col-->
          <div class=" col-sm-12 col-md-12 accordion" id="accordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <i class="icon-note"></i>Add Paid Through
                <div class="card-header-actions">
                  <a class="card-header-action" href="#" target="_blank"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  </a>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <h6>Simple Form</h6>
                    <form id="roleForm"   method="POST" action="{{ route('user-management.merchants.create')}}">
                      @csrf

                      <div class="form-group">
                        <label class="col-form-label" for="name">Name</label>
                        <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" type="text" name="name" value="{{ old('name')}}" placeholder=" name" />
                        @if ($errors->has('name'))
                          <p class="text-right mb-0">
                            <small class="warning text-muted">{{ $errors->first('name') }}</small>
                          </p>
                        @endif

                      </div>

                      <div class="form-group">
                        <label class="col-form-label" for="username">Code</label>
                        <input class="form-control {{ $errors->has('Code') ? ' is-invalid' : '' }}" id="Code" type="text" name="code" value="{{ old('Code')}}" placeholder="Code" />
                        @if ($errors->has('Code'))
                          <p class="text-right mb-0">
                            <small class="warning text-muted">{{ $errors->first('Code') }}</small>
                          </p>
                        @endif
                      </div>



                      {{--<script src="{{asset('js/advanced-forms.js')}}" defer>--}}
                          {{--$('#select2-1, #select2-2, #select2-4').select2({--}}
                              {{--theme: 'bootstrap'--}}
                          {{--});--}}
                      {{--</script>--}}

                      {{-- @if($permissions->count() > 0)
                      <fieldset class="form-group">
                        <label  class="col-form-label" for="permission" >Permission</label>
                        <select class="form-control select2-multiple" name="permissions[]" id="select2-2" multiple="multiple" required >

                          @foreach($permissions as $permission)
                          <option value="{{$permission->id}}">{{$permission->name}}</option>
                          @endforeach
                        </select>
                        @if ($errors->has('permissions'))
                        <p class="text-right">
                        <small class="warning text-muted">{{ $errors->first('permissions') }}</small>
                        </p>
                        @endif --}}
                      </fieldset>

                      {{-- @else --}}

                      {{-- @endif --}}
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

        <div class="animated fadeIn">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-edit"></i> List Paid Through
              <div class="card-header-actions">

              </div>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered datatable">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Description</th>

                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($paidthroughs->count() > 0)
                  @foreach($paidthroughs as $paidthrough)
                <tr>
                  <td>{{$paidthrough->accountname}}</td>
                  <td>{{$paidthrough->description}}</td>




                   <td>
                    {{-- <a class="btn btn-success" href="
                    {{route('user-management.merchants.view',[\Illuminate\Support\Facades\Crypt::encrypt($paidthrough->id)])}}
                    ">
                      <i class="fa fa-search-plus"></i>
                    </a> --}}
                    <a class="btn btn-info" href="
                    {{route('user-management.merchants.edit',[\Illuminate\Support\Facades\Crypt::encrypt($paidthrough->id)])}}
                    ">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a class="btn btn-danger" href="" onclick="deletePaidThrough('{{$paidthrough->id}}')">


                       <i class="fa fa-trash-o"></i>
                    </a>



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
    function deletePaidThrough(key) {


        if (confirm('Are you sure, you want to delete this role?')) {
            event.preventDefault();
            document.getElementById('delete-form' + key).submit();
        } else {
            event.preventDefault();
            document.getElementById('delete-form' + key).reset();
        }




    }



                                </script>
