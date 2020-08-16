@extends('layouts.app')

@section('content')
  {{-- <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Dashboard</div>


                  <div class="card-body">
                      @if (session('status'))
                          <div class="alert alert-success" role="alert">
                              {{ session('status') }}
                          </div>
                      @endif

                      You are logged in!
                  </div>
              </div>
          </div>
      </div>


  </div>
   --}}

        <main class="main">
      <!-- Breadcrumb-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
          <a href="#">Admin</a>
        </li>
        <li class="breadcrumb-item active">Permissions</li>
      </ol>
      <div class="container-fluid">

        <div class="ui-view">
          <div class="row">


            <!-- /.col-->
            <div class=" col-sm-12 col-md-12 accordion" id="accordion">

              <div class="card">
                <div class="card-header" id="headingOne">
                  <i class="icon-note"></i>Add Permissions
                  <div class="card-header-actions">
                    <a class="card-header-action" href="#" target="_blank"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    </a>
                  </div>
                </div>

                <div class="card-body">

                  <div class="row">
                    <div class="col-md-12">
                      <h6>Simple Form</h6>
                      {{--@if (session('status'))--}}
                        {{--<div class="alert alert-success">--}}
                          {{--{{ session('status') }}--}}
                        {{--</div>--}}
                      {{--@endif--}}

                      @if (session('status'))
                        <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                        </div>
                      @endif
                      <form id="permissionForm"   method="POST" action="{{ route('user-management.permissions.create')}}">
                        @csrf

                        <div class="form-group">
                          <label class="col-form-label" for="name">Name</label>
                          <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" type="text" name="name" value="" placeholder=" name" />
                          @if ($errors->has('name'))
                            <p class="text-right mb-0">
                              <small class="warning text-muted">{{ $errors->first('name') }}</small>
                            </p>
                          @endif

                        </div>
                        <div class="form-group">
                          <label class="col-form-label" for="display_name">Display Name</label>
                          <input class="form-control {{ $errors->has('display_name') ? ' is-invalid' : '' }}" id="display_name" type="text" name="display_name" value="" placeholder="Display name" />
                          @if ($errors->has('display_name'))
                            <p class="text-right mb-0">
                              <small class="warning text-muted">{{ $errors->first('display_name') }}</small>
                            </p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label class="col-form-label" for="username">Description</label>
                          <input class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" type="text" name="description" value="" placeholder="description" />
                          @if ($errors->has('description'))
                            <p class="text-right mb-0">
                              <small class="warning text-muted">{{ $errors->first('description') }}</small>
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

          <div class="animated fadeIn">
            <div class="card">
              <div class="card-header">
                <i class="fa fa-edit"></i> List Permissions
                <div class="card-header-actions">

                </div>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered datatable">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Display Name</th>
                    <th>Description</th>

                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @if($permissions->count() > 0)
                    @foreach($permissions as $permission)
                  <tr>
                    <td>{{$permission->name}}</td>
                    <td>{{$permission->display_name}}</td>
                    <td>{{$permission->description}}</td>

                    <td>
                      <a class="btn btn-success" href="#">
                        <i class="fa fa-search-plus"></i>
                      </a>
                      <a class="btn btn-info" href="{{route('user-management.permissions.edit',[\Illuminate\Support\Facades\Crypt::encrypt($permission->id)])}}">
                        <i class="fa fa-edit"></i>
                      </a>
                      {{--<a class="btn btn-danger" href="{{route('user-management.permissions.delete',[\Illuminate\Support\Facades\Crypt::encrypt($permission->id)])}}">--}}
                        {{--<i class="fa fa-trash-o">--}}
                        {{--</i>--}}
                      {{--</a>--}}

                      <a class="btn btn-danger" href="#" onclick="deletePermission('{{$permission->id}}')">
                        <i class="fa fa-search-plus"></i>
                      </a>

                      {{--<input style="" class="jsgrid-button jsgrid-delete-button"--}}
                             {{--type="button"--}}
                             {{--title="Delete" onclick="deletePermission('{{$permission->id}}')">--}}

                      <form id="delete-form{{$permission->id}}"
                            action="{{ route('user-management.permissions.delete') }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="id"
                               value="{{\Illuminate\Support\Facades\Crypt::encrypt($permission->id)}}">
                      </form>

                    </td>
                  </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="4" class="text-center">No Permission Set</td>
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
    function deletePermission(key) {


        if (confirm('Are you sure, you want to delete this property?')) {
            event.preventDefault();
            document.getElementById('delete-form' + key).submit();
        } else {
            event.preventDefault();
            document.getElementById('delete-form' + key).reset();
        }




    }



                                </script>
