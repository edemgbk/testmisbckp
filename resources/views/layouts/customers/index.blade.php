@extends('layouts.app')

@section('content')

  <main class="c-main">
    <!-- Breadcrumb-->

    <div class="container-fluid">
      <div class="ui-view">
        <div class="row">
            <div class="col-md-12">
            <div class="card">
            <div class="card-header"><strong>New Customer</strong> </div>
            <div class="card-body">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

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

             <div class="form-group row">
                <label class="col-md-3 col-form-label" for="hf-email">Primary Contact</label>


                <div class="col-md-3">
                    <select class="form-control form-control" id="select3" name="select3">
                    <option value="0">salutation</option>
                    <option value="1">mr</option>
                    <option value="2">mrs</option>
                    <option value="3">ms</option>
                    </select>
                    </div>

                <div class="col-md-3">
                <input class="form-control" id="hf-email" type="email" name="hf-email" placeholder="First Name" autocomplete="email">
                </div>
                <div class="col-md-3">
                    <input class="form-control" id="hf-email" type="email" name="hf-email" placeholder="Last Name" autocomplete="email">
                    </div>

                </div>

            <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Company Name</label>
            <div class="col-md-3">
            <input class="form-control" id="text-input" type="text" name="text-input" placeholder="Text">
            </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Customer Display Name</label>
                <div class="col-md-3">
                <input class="form-control" id="text-input" type="text" name="text-input" placeholder="Text">
                </div>
                </div>
            <div class="form-group row">
            <label class="col-md-3 col-form-label" for="email-input"> Customer Email </label>
            <div class="col-md-3">
            <input class="form-control" id="email-input" type="email" name="email-input" placeholder="Enter Email" autocomplete="email">
            </div>
            </div>

            </form>
            </div>
            <div class="card-header">

            </div>

            {{-- <div class="col-md-6">
                <div class="card"> --}}

<div class="row">
                <div class="col">
                    <div class="card-header">
                  <ul class="nav nav-pills mb-1" id="pills-tab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Other Details</a></li>
                    <li class="nav-item"><a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Address</a></li>
                    <li class="nav-item"><a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact Personas</a></li>
                    <li class="nav-item"><a class="nav-link" id="pills-profilet-tab" data-toggle="pill" href="#pills-profilet" role="tab" aria-controls="pills-profilet" aria-selected="false">Custom Fields</a></li>
                    <li class="nav-item"><a class="nav-link" id="pills-contacte-tab" data-toggle="pill" href="#pills-contacte" role="tab" aria-controls="pills-contacte" aria-selected="false"> Remarks</a></li>
                  </ul>
                    </div>
                    <div class="card-body">
        <div class="tab-content" id="pills-tabContent">
           <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

             <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Currrency*</label>
                <div class="col-md-3">
                    <select class="form-control form-control" id="select3" name="select3">
                    <option value="0">Currency</option>
                    <option value="1">GHS-Ghanaian Cedi</option>
                    <option value="2"></option>
                    <option value="3"></option>
                    </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="text-input">Payment Terms</label>

                    <div class="col-md-3">
                        <select class="form-control form-control" id="select3" name="select3">
                        <option value="0">Payment Terms</option>
                        <option value="1">Due on Receipt</option>
                        <option value="2">Due end of Month</option>
                        <option value="3"></option>
                        </select>
                        </div>
                    </div>
                <div class="form-group row">
                <label class="col-md-3 col-form-label" for="email-input"> Portal language </label>
                <div class="col-md-3">
                    <select class="form-control form-control" id="select3" name="select3">
                    <option value="0">English</option>
                    <option value="1">french</option>
                    <option value="2"></option>
                    <option value="3"></option>
                    </select>
                    </div>
             </div>
            </div>
<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
<div>
<div class="row">
<div class="col-lg-6">
    <h4>Billing Address</h4>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="text-input">Attention</label>
                <div class="col-md-9">
                  <input class="form-control" id="text-input" type="text" name="text-input" placeholder="Text">
                </div>
            </div>
            <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="text-input">Country/Region</label>
                <div class="col-md-9">
                    <input class="form-control" id="text-input" type="text" name="text-input" placeholder="Text">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="email-input"> Address </label>
                <div class="col-md-9">
                <input class="form-control" id="email-input" type="email" name="email-input" placeholder="Enter Email" autocomplete="email">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="email-input"> City </label>
                <div class="col-md-9">
                <input class="form-control" id="email-input" type="email" name="email-input" placeholder="Enter Email" autocomplete="email">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="email-input"> State </label>
                <div class="col-md-9">
                <input class="form-control" id="email-input" type="email" name="email-input" placeholder="Enter Email" autocomplete="email">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="email-input"> Zip Code </label>
                <div class="col-md-9">
                <input class="form-control" id="email-input" type="email" name="email-input" placeholder="Enter Email" autocomplete="email">
                </div>
            </div>
</div>

<div class="col-lg-6">
    <h4>Shipping Address </h4>
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="text-input">2 Company Name</label>
        <div class="col-md-9">
          <input class="form-control" id="text-input" type="text" name="text-input" placeholder="Text">
        </div>
    </div>
    <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Attention</label>
        <div class="col-md-9">
            <input class="form-control" id="text-input" type="text" name="text-input" placeholder="Text">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="email-input">Country /Region</label>
        <div class="col-md-9">
        <input class="form-control" id="email-input" type="email" name="email-input" placeholder="Enter Email" autocomplete="email">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="text-input">Address</label>
        <div class="col-md-9">
          <input class="form-control" id="text-input" type="text" name="text-input" placeholder="Text">
        </div>
    </div>
    <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input">Country/Region</label>
        <div class="col-md-9">
            <input class="form-control" id="text-input" type="text" name="text-input" placeholder="Text">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 col-form-label" for="email-input">Address</label>
        <div class="col-md-9">
        <input class="form-control" id="email-input" type="email" name="email-input" placeholder="Enter Email" autocomplete="email">
        </div>
    </div>
</div>
</div>
</div>
</div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

            {{-- <div class=" row">
            <div class="col-md-9">

                </div>
            </div> --}}

            <div class="card">
                <div class="card-header">
                  <i class="fa fa-edit"></i> List Customers
                  <div class="card-header-actions">

                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-striped table-bordered datatable">
                    <thead>
                    <tr>
                        <th>First Name</th>
                      <th>Last Name</th>
                      <th>Company Name</th>
                      <th>Customer Display Name</th>
                      <th>Customer Email.</th>
                      <th>Date</th>


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

        <div class="tab-pane fade" id="pills-profilet" role="tabpanel" aria-labelledby="pills-contact-tab">

            <div class="form-group row">
            <label class="col-md-3 col-form-label" for="text-input"></label>

            </div>

                    </div>

                    <div class="tab-pane fade" id="pills-contacte" role="tabpanel" aria-labelledby="pills-contact-tab">

                        <div class="form-group row">
                        <label class="col-md-3 col-form-label" for="text-input"> Remarks</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="textarea-input" name="textarea-input" rows="9" placeholder="Content.."></textarea>
                            </div>
                        </div>


                                </div>

                  </div>
                </div>
                </div>
              </div>

            <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
            <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
            </div>
            </div>
            {{-- <div class="card">
            <div class="card-header"><strong>Inline</strong> Form</div>
            <div class="card-body">
            <form class="form-inline" action="" method="post">
            <div class="form-group">
            <label class="mr-1" for="exampleInputName2">Name</label>
            <input class="form-control" id="exampleInputName2" type="text" placeholder="Jane Doe" autocomplete="name">
            </div>
            <div class="form-group">
            <label class="mx-1" for="exampleInputEmail2">Email</label>
            <input class="form-control" id="exampleInputEmail2" type="email" placeholder="jane.doe@example.com" autocomplete="email">
            </div>
            </form>
            </div>
            <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit"> Submit</button>
            <button class="btn btn-sm btn-danger" type="reset"> Reset</button>
            </div>
            </div> --}}
            </div>


        </div>

        <div class="animated fadeIn">
          <div class="card">
            <div class="card-header">
              <i class="fa fa-edit"></i> List Customers
              <div class="card-header-actions">

              </div>
            </div>
            <div class="card-body">
              <table class="table table-striped table-bordered datatable">
                <thead>
                <tr>
                    <th>First Name</th>
                  <th>Last Name</th>
                  <th>Company Name</th>
                  <th>Customer Display Name</th>
                  <th>Customer Email.</th>
                  <th>Date</th>


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
