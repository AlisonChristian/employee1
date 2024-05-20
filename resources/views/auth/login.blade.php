@extends('layouts.master-blank')

@section('content')
<div class="wrapper-page" style="background-color: transparent; border: 3px solid black; border-radius: 30px;">
    <div class="overflow-hidden account-card mx-3" style="background-color: transparent;">
        <div class="p-4 text-black text-center position-relative">
            <h4 class="font-20 m-b-5" style="color: black;">Good day!</h4>
            <p class="text-white-50 mb-4"></p>
            <a href="{{ route('welcome') }}" class="logo logo-admin">
                <img src="../assets/images/Frame 1.png" alt="Logo" style="height: 60px; margin-right: 0px;">
            </a>
        </div>
            <div class="account-card-content">
                <form class="form-horizontal m-t-30" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                    <label for="email" class="col-form-label" style="color: black;">{{ __('Email Address') }}</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-form-label" style="color: black;">{{ __('Password') }}</label>


                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                   
                    <div class="form-group row m-t-20">
                        <div class=" col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember" style="color: black;">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button class="btn btn-success w-md waves-effect waves-light" type="submit">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
