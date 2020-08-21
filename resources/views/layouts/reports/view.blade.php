
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
                            <h5 class="card-title">
                            </h5> status :<span class="badge badge-pill badge-info"> {{$report->status}}</span>



                            <p class="card-text">
                                {{$report->title}}

                            </p>


                            <p class="card-text">
                                report number:er3423
                            </p>
                            <p class="card-text">
                                Duration: {{$report->fromd}}-{{$report->tod}}
                                 {{-- {{$role->display_name}} --}}
                            </p>
                            <p class="card-text">
                               Submiteed On:
                                {{-- {{$role->description}} --}}
                            </p>
                            <p class="card-text">
                                Business Purpose : {{$report->purpose}}
                                {{-- {{$role->description}} --}}
                            </p>
                            <p class="card-text">
                                Amount to be reimbursed:
                                @foreach($report->expenses as $expense)
                                             {{$expense->amount }}
                                 @endforeach
                                <b>
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
                                <button class="btn btn-success" type="submit" name="save" value="save">Submit </button>


                                {{-- <a href="{{action('ReportController@downloadPDF', $report->id)}}">Download PDF</a> --}}

                                <a href="{{action('ReportController@export')}}">Export</a>


                                {{-- <a class="btn btn-success" href="{{route('expenses.view',[\Illuminate\Support\Facades\Crypt::encrypt($Expense->id)])}}">
                                    <i class="fa fa-search-plus"></i>
                                  </a> --}}
                                <button class="cursor-pointer btn btn-default" type="submit" name="save" value="save">attach file   </button>





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
                            @foreach($report->expenses as $expense)
                          <tr>
                              <td>
                                  {{-- {{$role->name}} --}}
                                  Date:  {{$expense->date}}


                                </td>
                              <td>

                                  {{-- {{$role->display_name}} --}}

</td>
                              <td>
                                  {{-- {{$role->description}} --}}

                                </td>
                            <td>
                                {{-- {{$role->name}} --}}
                                {{$expense->amount}}

                              </td>
                            <td>
                                {{-- {{$role->display_name}} --}}
                                {{$expense->amount}}


                              </td>
                            <td>
                                {{-- {{$role->description}} --}}
                                status:{{$expense->status}}

                              </td>

                            <td>
                              {{-- <a class="btn btn-success" href=" --}}
                              {{-- {{route('expense.edit')}} --}}

                              {{-- {{route('user-management.roles.view',[\Illuminate\Support\Facades\Crypt::encrypt($role->id)])}} --}}
                              {{-- >
                                <i class="fa fa-edit">edit</i>
                              </a> --}}

                              <a class="btn btn-success" href="{{route('expenses.edit',[\Illuminate\Support\Facades\Crypt::encrypt($expense->id)])}}">

                                <i class="fa fa-edit">
                                    edit
                                </i>
                              </a>

                              <a class="btn btn-danger" href=""
                              onclick="deleteexpense('{{$expense->id}}')">
                                <i class="fa fa-trash-o">delete</i>
                              </a>

                               <form id="delete-form{{$expense->id}}"
                                      action="{{ route('expenses.delete') }}" method="POST" style="display: none;">
                                  @csrf
                                  @method('DELETE')

                                  <input type="hidden" name="id"
                                         value="{{\Illuminate\Support\Facades\Crypt::encrypt($expense->id)}}">
                                </form>

                            </td>
                          </tr>
                          @endforeach

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
