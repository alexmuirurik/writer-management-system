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
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif

                {{ __('Before proceeding, please check your email for a verification link.') }}
                {{ __('If you did not receive the email') }},

                <form class="d-inline" method="POST" aaction="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label><strong>Email</strong></label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label><strong>Password</strong></label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            </div>
                            <div class="col">
                                <label><strong>Repeat Password</strong></label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                    
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection
