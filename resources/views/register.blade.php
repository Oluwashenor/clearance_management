@extends('layouts.auth-layout')

@section('content')

<section class="signup">
    <!-- <img src="images/signup-bg.jpg" alt=""> -->
    <div class="container">
        <div class="signup-content">
            <form method="POST" action="/registerAction" id="signup-form" class="signup-form">
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                {{csrf_field()}}
                <h2 class="form-title">Create account</h2>
                <div class="form-group">
                    <input type="text" class="form-input" name="name" id="name" placeholder="Your Name" />
                </div>
                <div class="form-group">
                    <input type="email" class="form-input" name="email" id="email" placeholder="Your Email" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-input" name="password" id="password" placeholder="Password" />
                    <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-input" name="password_confirmation" id="re_password" placeholder="Repeat your password" />
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up" />
                </div>
            </form>
            <p class="loginhere">
                Have already an account ? <a href="#" class="loginhere-link">Login here</a>
            </p>
        </div>
    </div>
</section>


@endsection