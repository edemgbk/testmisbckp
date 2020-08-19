
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
                                {{$expense->merchant_id}}
                            </p>
                            <p class="card-text">
                                categroy
                                {{$expense->category_id}}
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
                                <button class="btn btn-primary" type="submit" name="save" value="save">edit</button>

                                <button class="btn btn-danger" type="submit" name="save" value="save">delete</button>


                              </div>
                        </div>
                    </div>
                </div>
                <!-- /.row-->
            </div>

        </div>
@endsection
