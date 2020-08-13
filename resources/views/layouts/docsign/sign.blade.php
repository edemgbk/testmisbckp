@extends('layouts.app')

@section('content')

  <main class="c-main">
    <!-- Breadcrumb-->

    <div class="container-fluid">
      <div class="ui-view">


        <div class="row">
            <div class="col-sm-4">
            <div class="card">
            <div class="card-header">Example Form</div>
            <div class="card-body">
            <form action="" method="post">
            <div class="form-group">
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">Username</span></div>
            <input class="form-control" id="username3" type="text" name="username3" autocomplete="username">
            <div class="input-group-append"><span class="input-group-text">
            <svg class="c-icon">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
            </svg></span></div>
            </div>
            </div>
            <div class="form-group">
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">Email</span></div>
            <input class="form-control" id="email3" type="email" name="email3" autocomplete="email">
            <div class="input-group-append"><span class="input-group-text">
            <svg class="c-icon">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
            </svg></span></div>
            </div>
            </div>
            <div class="form-group">
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">Password</span></div>
            <input class="form-control" id="password3" type="password" name="password3" autocomplete="new-password">
            <div class="input-group-append"><span class="input-group-text">
            <svg class="c-icon">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
            </svg></span></div>
            </div>
            </div>
            <div class="form-group form-actions">
            <button class="btn btn-sm btn-primary" type="submit">Submit</button>
            </div>
            </form>
            </div>
            </div>
            </div>

            <div class="col-sm-4">
            <div class="card">
            <div class="card-header">Example Form</div>
            <div class="card-body">
            <form action="" method="post">
            <div class="form-group">
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">
            <svg class="c-icon">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
            </svg></span></div>
            <input class="form-control" id="username" type="text" name="username" placeholder="Username" autocomplete="username">
            </div>
            </div>
            <div class="form-group">
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">
            <svg class="c-icon">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
            </svg></span></div>
            <input class="form-control" id="email" type="email" name="email" placeholder="Email" autocomplete="email">
            </div>
            </div>
            <div class="form-group">
            <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text">
            <svg class="c-icon">
            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
            </svg></span></div>
            <input class="form-control" id="password" type="password" name="password" placeholder="Password" autocomplete="new-password">
            </div>
            </div>
            <div class="form-group form-actions">
            <button class="btn btn-sm btn-success" type="submit">Submit</button>
            </div>
            </form>
            </div>
            </div>
            </div>
            </div>


        <div class="row">
            <!-- /.col-->
            <div class=" col-sm-12 col-md-12 accordion" id="accordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <i class="icon-note"></i>Add Signin
                  <div class="card-header-actions">
                    <a class="card-header-action" href="#" target="_blank"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    </a>
                  </div>
                </div>

              </div>

            </div>
            <!-- /.col-->
          </div>

        <div class="animated fadeIn">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-edit"></i> List SiginForms
              <div class="card-header-actions">

              </div>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered datatable">
                <thead>
                <tr>
                  <th> SignForm Name</th>
                  <th>Template Name</th>
                  <th>Number Of Responses</th>
                  <th>Status</th>
                  <th>Owner Name</th>
                  <th>Created On</th>
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
