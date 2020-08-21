
@extends('layouts.app')

@section('content')
    <main class="main">
        <!-- Breadcrumb-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">Roles</li>
        </ol>
        <div class="container-fluid">
            <div class="ui-view">
                <div class="row">

                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>

                            <p class="card-text">
                                Name : {{$Account_Type->name}}
                            </p>

                            <p class="card-text">
                                Description : {{$Account_Type->description}}
                            </p>
                            <p class="card-text"><b>List of permissions</b></p>
                        </div>

                        <div class="card-body">
                            <a href="#" class="card-link">Edit</a>
                            <a href="{{route('user-management.accounttype.edit')}}" class="card-link">Back</a>
                        </div>
                    </div>
                </div>
                <!-- /.row-->
            </div>

        </div>
@endsection
