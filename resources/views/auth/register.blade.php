@extends('layouts.main')

@section('content')
    <!-- Sign up form -->
    <section class="signup">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="first_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input placeholder="Full Name" id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" value="{{ old('full_name') }}"  autocomplete="name" autofocus>

                                @error('full_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="nik"><i class="zmdi zmdi-filter-list"></i></label>
                            <input placeholder="No Handphone" id="number_phone" type="text" class="form-control @error('number_phone') is-invalid @enderror" name="number_phone" value="{{ old('number_phone') }}" required autocomplete="nik">

                            @error('number_phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input placeholder="Your Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input placeholder="Repeat your password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                        </div>
                    </form>
                </div>
                <div class="signup-image">
                    <figure><img src="{{asset('asset')}}/images/signup-image.jpg" alt="sing up image"></figure>
                    <a href="{{ route('login') }}" class="signup-image-link">I am already member</a>
                </div>
            </div>
        </div>
    </section>
@endsection
