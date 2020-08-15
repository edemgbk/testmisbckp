
@extends('layouts.app')

@section('content')
    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">view</li>
        </ol>
        <div class="container-fluid">
            <div class="ui-view">
                <div class="row">

                    <div class="card col-md-9">
                        <div class="card-body">
                            <h5 class="card-title">Report title</h5><span class="badge badge-pill badge-info">draft</span>

                            <p class="card-text">
                                Report Number:er3423
                                {{-- {{$role->name}} --}}
                            </p>
                            <p class="card-text">
                                Duration:14 Aug 2020 - 15 Aug 2020
                                 {{-- {{$role->display_name}} --}}
                            </p>
                            <p class="card-text">
                               Submiteed On:
                                {{-- {{$role->description}} --}}
                            </p>
                            <p class="card-text">
                                Business Purpose : vrbtberwg
                                {{-- {{$role->description}} --}}
                            </p>
                            <p class="card-text">Amount to be reimbursed<b>GHS567.00
                            </b>

                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            {{-- @foreach($role->permissions as $permission) --}}
                                <li class="list-group-item">
                                    {{-- {{$permission->display_name}} --}}
                                </li>
                            {{-- @endforeach --}}
                        </ul>
                        <div class="card-body">
                            <div class="form-group">
                                <button class="btn btn-default" type="submit" name="save" value="save">Edit</button>
                                <button class="btn btn-success" type="submit" name="save" value="save">Send </button>

                                <button class="btn btn-default" type="submit" name="save" value="save">share</button>

                                <button class="btn btn-default" type="submit" name="save" value="save">export</button>
                                <button class="cursor-pointer btn btn-default" type="submit" name="save" value="save">attach file   </button>


                                <button class="btn btn-default" type="submit" name="save" value="save">print  </button>



                              </div>
                        </div>
                    </div>
                </div>
                <!-- /.row-->
            </div>



            <div class="animated fadeIn">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-edit"></i> List of related expenses
                    <div class="card-header-actions">

                    </div>
                  </div>
                  <div class="card-body">
                      <table class="table table-striped table-bordered datatable">

                       <thead>
                          <tr>
                            <th>Date</th>
                            <th>Receipt</th>
                            <th>Merchant.</th>
                            <th>Amount</th>
                            <th>Amount(GHS)</th>

                            <th>Status</th>
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
                                  <button class="btn btn-block btn-outline-primary" type="button">unreported expense(1)</button>

                                </td>
                              <td>
                                  {{-- {{$role->description}} --}}
                                </td>
                            <td>
                                {{-- {{$role->name}} --}}
                              </td>
                            <td>
                                {{-- {{$role->display_name}} --}}
                                <button class="btn btn-block btn-outline-primary" type="button">create new exepnse</button>

                              </td>
                            <td>
                                {{-- {{$role->description}} --}}
                              </td>

                            <td>
                              <a class="btn btn-success" href="
                              {{-- {{route('expense.edit')}} --}}
                              "
                              {{-- {{route('user-management.roles.view',[\Illuminate\Support\Facades\Crypt::encrypt($role->id)])}} --}}
                              >
                                <i class="fa fa-edit">edit</i>
                              </a>

                              <a class="btn btn-danger" href=""
                              {{-- onclick="deleteRole('{{$role->id}}')" --}}
                              >
                                <i class="fa fa-trash-o">delete</i>
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
@endsection
