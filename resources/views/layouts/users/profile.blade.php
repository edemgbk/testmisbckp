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
        <li class="breadcrumb-item active">profile</li>
      </ol>
      <div class="container-fluid">

        <div class="ui-view">
          <div class="row">

            <div class="col-sm-6 col-md-6">
              <div class="card card-accent-secondary">
                <div class="card-header">Card with accent</div>
                <div class="card-body">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip
                  ex ea commodo consequat.</div>
              </div>
            </div>

            <!-- /.col-->
            <div class=" col-sm-6 col-md-6 accordion" id="accordion">

              <div class="card">
                <div class="card-header" id="headingOne">
                  <i class="icon-note"></i>Profile
                  <div class="card-header-actions">
                    <a class="card-header-action" href="#" target="_blank"  data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    </a>
                  </div>
                </div>

                <div class="card-body">

                  <div class="row">
                    <div class="col-md-12">
                      <h6>Simple Form</h6>
                      <form id="profileForm"   method="POST" action="{{ route('user-management.user.edit_user',[\Illuminate\Support\Facades\Crypt::encrypt($user->id)]) }}">
                        @csrf {{method_field("PUT")}}

                        <div class="form-group">
                          <label class="col-form-label" for="first_name">First name</label>
                          <input class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" id="first_name" type="text" name="first_name" value="{{ old('first_name')?old('first_name'):$user->first_name }}" placeholder="First name" />
                          @if ($errors->has('first_name'))
                            <p class="text-right mb-0">
                              <small class="warning text-muted">{{ $errors->first('first_name') }}</small>
                            </p>
                          @endif

                        </div>
                        <div class="form-group">
                          <label class="col-form-label" for="last_name">Last name</label>
                          <input class="form-control {{ $errors->has('last_name') ? ' is-invalid' : '' }}" id="last_name" type="text" name="last_name" value="{{ old('last_name')?old('last_name'):$user->last_name }}" placeholder="Last name" />
                          @if ($errors->has('last_name'))
                            <p class="text-right mb-0">
                              <small class="warning text-muted">{{ $errors->first('last_name') }}</small>
                            </p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label class="col-form-label" for="username">Username</label>
                          <input class="form-control {{ $errors->has('username') ? ' is-invalid' : '' }}" id="username" type="text" name="username" value="{{ old('username')?old('username'):$user->username }}" placeholder="Username" />
                          @if ($errors->has('username'))
                            <p class="text-right mb-0">
                              <small class="warning text-muted">{{ $errors->first('username') }}</small>
                            </p>
                          @endif
                        </div>
                        <div class="form-group">
                          <label class="col-form-label" for="email">Email</label>
                          <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" type="text" name="email" value="{{ old('email')?old('email'):$user->email }}" placeholder="Email" />
                          @if ($errors->has('email'))
                            <p class="text-right mb-0">
                              <small class="warning text-muted">{{ $errors->first('email') }}</small>
                            </p>
                          @endif
                        </div>

                        <div class="row">
                          <div class="form-group col-md-6">
                            <label class="col-form-label" for="password">Password</label>
                            <input class="form-control" id="password" type="password" name="password" placeholder="Password" />
                          </div>
                          <div class="form-group col-md-6">
                            <label class="col-form-label" for="confirm_password">Confirm password</label>
                            <input class="form-control" id="confirm_password" type="password" name="confirm_password" placeholder="Confirm password" />
                          </div>
                        </div>

                        <div class="form-group">
                          <div class="checkbox">
                            <label>
                              <input id="agree" type="checkbox" name="agree" value="agree" /> Please agree to our policy
                            </label>
                          </div>
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
        </div>



</div>

    </main>


@endsection
