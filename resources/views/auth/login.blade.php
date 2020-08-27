@extends('layouts.auth')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
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
        <div class="col-md-8">
          <div class="card-group" margin-top: 50px;">
            <div class="card p-4">
              <div class="card-body">
                <h1>{{ __('Login') }}</h1>
                {{-- class="form-horizontal" --}}
                <form id="loginForm"  method="POST" action="{{ route('login') }}"  >
                    @csrf
                    <p class="text-muted">Sign In to your account</p>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                      <span class="input-group-text">
                      {{-- <svg class="c-icon">
                        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-user"></use>
                      </svg> --}}
                    </span>
                    </div>


                   {{-- <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                                <input  id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  autofocus placeholder="email">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                @endif

                  </div>
                   <div class="input-group mb-4">
                  <div class="input-group-prepend"><span class="input-group-text">
                      {{-- <svg class="c-icon">
                        <use xlink:href="node_modules/@coreui/icons/sprites/free.svg#cil-lock-locked"></use>
                      </svg> --}}
                    </span>
                </div>

                      {{-- <input  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                      @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror --}}

                  <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  placeholder="password">
                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                  @endif

                   </div>
                    <div class="row">
                  <div class="col-6">
                    <button class="btn btn-primary px-4" type="button">Login</button>
                  </div>
                  <div class="col-6 text-right">
                    @if (Route::has('password.request'))
                    <button class="btn btn-link px-0" href="{{ route('password.request') }}" type="">{{ __('Forgot Password?') }}
                    </button>
                    @endif
                  </div>
                   </div>
                </form>
              </div>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
              {{-- <div class="card-body text-center">
                <div>
                  <h2>Sign up</h2>

                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  @if (Route::has('register'))
                  <button class="btn btn-lg btn-outline-light mt-3" type="button" href="{{ route('register') }}">Register Now!</button>
                  <a href="{{ route('register') }}">Register</a>

                  @endif

                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>




@endsection
