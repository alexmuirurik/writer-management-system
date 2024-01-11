@extends('layouts.auth')

@section('content')

<div class="container d-flex justify-content-center" style="height: 95vh">
    <a href="#" class="btn btn-danger btn-sm float-right" style="position: absolute; right: 20px">Apply for a Job</a>
    <div class="signup-form w-50 m-auto">
        <div class="avatar d-flex justify-content-center">
            <img src="/assets/img/ddsd.png" alt="" srcset="" class="img-fluid avatar">
        </div>
        <div class="card signup-box">
            <div class="card-body p-0">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label><strong>First Name</strong></label>
                                <input id="firstname" type="text" class="form-control @error('name') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <label><strong>Last Name</strong></label>
                                <input id="lastname" type="text" class="form-control @error('name') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

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
                        <label class="col-form-label"><strong>Role Name</strong></label>
                        <select class="select select2-hidden-accessible form-control">
                            <option selected="" disabled="">Select Role Name</option>
                            <option value="Super Admin">Project Manager</option>
                            <option value="Normal User">Writer</option>
                            <option value="Client">Developer</option>
                        </select>
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

                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <p>Already have an account? <a href="{{route('login')}}"><strong>{{ __('Login') }}</strong></a></p>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary btn-sm account-btn float-right" type="submit">{{ __('Register') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection
