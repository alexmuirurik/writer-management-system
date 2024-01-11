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

                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection
