@extends('layouts.auth')

@section('content')

<div class="container d-flex justify-content-center" style="height: 90vh">
    <a href="#" class="btn btn-danger btn-sm float-right" style="position: absolute; right: 20px">Apply for a Job</a>
    <div class="signup-form w-50 m-auto">
        <div class="avatar d-flex justify-content-center">
            <img src="/assets/img/ddsd.png" alt="" srcset="" class="img-fluid avatar">
        </div>
        <div class="card signup-box">
            <div class="card-body p-0">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label><strong>Email</strong></label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label><strong>Password</strong></label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input class="form-check-input ml-auto" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label ml-3" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col pl-0">
                                <p>
                                    <a href="{{route('register')}}" class="btn btn-link btn-sm">Register</a> |  
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link btn-sm" href="{{ route('password.request') }}">
                                            {{ __('Reset Your Password') }}
                                        </a>
                                    @endif
                                </p>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary btn-sm float-right"> {{ __('Login') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection
