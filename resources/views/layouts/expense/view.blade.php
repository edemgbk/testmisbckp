
@extends('layouts.app')

@section('content')
    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            {{-- <li class="breadcrumb-item active">view</li> --}}
        </ol>
        <div class="container-fluid">
            <div class="ui-view">
                <div class="row">
                    <div class="card col-md-9">
                        <div class="card-body">
                            <h5> Expense Details</h5>

                            <h6 class="card-title">AMOUNT  <span>  {{$expense->amount}} </span></h5>
                                <p class="card-text">
                                    Date
                                    {{$expense->date}}
                                </p>
                                <p class="card-text">
                                    status :<span class="badge badge-pill badge-info"> {{$expense->status}}</span>

                                </p>


                            <p class="card-text">
                                Merchant
                                @foreach($expense->merchants as $merchant)
                                {{$merchant->name }}
                                @endforeach
                            </p>
                            <p class="card-text">
                                categroy
                                {{-- {{$expense->categories}} --}}

                                @foreach($expense->categories as $category)
                                {{$category->name }}
                                @endforeach
                            </p>
                            <p class="card-text">
                                description
                                {{$expense->description}}
                            </p>
                            <p class="card-text">
                                reference :
                                {{$expense->reference}}
                            </p>
                            <p class="card-text">paidthrough:{{$expense->paidthrough_id}}
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
                                {{-- <a href="{{route('expenses.edit',[\Illuminate\Support\Facades\Crypt::encrypt($expense->id)])}}" class="card-link"> <i class="fa fa-edit">edit</i></a> --}}

                                <button class="btn btn-danger" type="submit" onclick="deleteExpense('{{$expense->id}}')"> delete</button>

                                <a href="{{route('expenses.edit',[\Illuminate\Support\Facades\Crypt::encrypt($expense->id)])}}" class="btn btn-default">
                                    {{ __('edit') }}
                                </a>

                                {{-- <a class="btn btn-danger" href=""
                                onclick="deleteExpense('{{$expense->id}}')"
                                >
                                  <i class="fa fa-trash-o"></i>
                                </a> --}}


                                 <form id="delete-form{{$expense->id}}"
                                        action="
                                        {{ route('expenses.delete') }}
                                        " method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')

                                    <input type="hidden" name="id"
                                           value="{{\Illuminate\Support\Facades\Crypt::encrypt($expense->id)}}">
                                  </form>

                              </div>
                        </div>
                    </div>
                </div>
                <!-- /.row-->
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
