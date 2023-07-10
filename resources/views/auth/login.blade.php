@extends('layouts.app')

@section('content')
<div class="container">
    <div class="box"></div>   {{-- <div class="row justify-content-center"> --}}
        <div class="container-forms">
            <div class="container-info">
                <div class="info-item">
                    <div class="table">
                        <div class="table-cell">
                            <p>
                            Have an account?
                            </p>
                            <div class="btn" id='btn1'>
                            Log in
                            </div>
                        </div>
                    </div>
                </div>
                <div class="info-item">
                    <div class="table">
                    <div class="table-cell">
                        <p>
                        Don't have an account? 
                        </p>
                        <div class="btn" id='btn2'>
                        Sign up
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="container-form ">
                <div class="form-item log-in">
                    <div class="table">
                        <div class="table-cell">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <h2 class="fw-bolder text-primary">LOGIN CONTACT</h2>
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                {{-- <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <div class="ddd">
                                            <button type="submit" class="btn btn_in btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                        </div>

                                        @if (Route::has('password.request'))
                                            <div>
                                                <a class="link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="form-item sign-up">
                <div class="table">
                    <div class="table-cell">
                        <form method="POST" action="{{route('register') }}">
                            @csrf
                            <h2 class="fw-bolder text-primary">REGISTRE CONTACT</h2>
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" @error('name') is-invalid @enderror placeholder="Full Name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="Address Mail" class="form-control" @error('email') is-invalid @enderror name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="ddd">
                                    <button type="submit" class="btn btn_in btn-primary" id="btn2">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                            {{-- <div class="btn">
                            Sign up
                            </div> --}}
                        </form>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
