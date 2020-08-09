@extends('layouts.auth')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card mx-4">
          <div class="card-body p-4">
            <h1>{{ __('Register') }}</h1>
            {{-- class="form-horizontal" --}}
            <form id="registerForm" method="POST"  action="{{ route('register') }}">
                @csrf

            <p class="text-muted">Create your account</p>
            <div class="input-group mb-3">
              <div class="input-group-prepend"><span class="input-group-text">
                  {{-- <svg class="c-icon">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-user"></use>
                  </svg> --}}
                </span>
             </div>
                  {{-- <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror --}}

                  <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                  name="name" value="{{ old('name') }}" required autofocus  placeholder="name">
           @if ($errors->has('name'))
               <span class="invalid-feedback" role="alert">
                               <strong>{{ $errors->first('name') }}</strong>
                           </span>
           @endif
            </div>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                  {{-- <svg class="c-icon">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-envelope-open"></use>
                  </svg> --}}
                </span>
                </div>

                    <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                        name="first_name" value="{{ old('first_name') }}" required autofocus  placeholder="First Name">
                            @if ($errors->has('first_name'))
                            <span class="invalid-feedback" role="alert">
                     <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                            @endif
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text">
                    {{--<svg class="c-icon">--}}
                    {{--<use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>--}}
                    {{--</svg>--}}
                </span>
                </div>
                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                       name="last_name" value="{{ old('last_name') }}" required autofocus  placeholder="Last Name">
                @if ($errors->has('last_name'))
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                @endif
            </div>

            <div class="input-group mb-4">
                <div class="input-group-prepend">
                <span class="input-group-text">
                    {{--<svg class="c-icon">--}}
                    {{--<use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>--}}
                    {{--</svg>--}}
                </span>
                </div>
                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                       name="email" value="{{ old('email') }}" required autofocus  placeholder="email">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                @endif
            </div>


            <div class="input-group mb-4">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                  {{-- <svg class="c-icon">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-lock-locked"></use>
                  </svg> --}}
                </span>
             </div>
              <input class="form-control" type="password" placeholder="Password">
            </div>
            <div class="input-group mb-4">
              <div class="input-group-prepend">
                  <span class="input-group-text">
                  {{-- <svg class="c-icon">
                    <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-lock-locked"></use>
                  </svg> --}}
                </span>
            </div>
              <input class="form-control" type="password" placeholder="Repeat password">
            </div>
        </form>
            <button class="btn btn-block btn-success" type="button">Create Account</button>
          </div>
          <div class="card-footer p-4">
            <div class="row">
              <div class="col-6">
                <button class="btn btn-block btn-facebook" type="button"><span>facebook</span></button>
              </div>
              <div class="col-6">
                <button class="btn btn-block btn-twitter" type="button"><span>twitter</span></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
