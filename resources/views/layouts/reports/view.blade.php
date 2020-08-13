
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
                        <img class="card-img-top" src="..." alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Card  view title</h5>

                            <p class="card-text">
                                Name :
                                {{-- {{$role->name}} --}}
                            </p>
                            <p class="card-text">
                                Display name :
                                 {{-- {{$role->display_name}} --}}
                            </p>
                            <p class="card-text">
                                Description :
                                {{-- {{$role->description}} --}}
                            </p>
                            <p class="card-text"><b>List of details</b></p>
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
                                <button class="btn btn-primary" type="submit" name="save" value="save">Save as draft</button>
                                <button class="btn btn-primary" type="submit" name="save" value="save">Save &amp; Send </button>



                              </div>
                        </div>
                    </div>
                </div>
                <!-- /.row-->
            </div>

        </div>
@endsection
