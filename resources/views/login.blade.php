@extends('layouts.auth-layout')

@section('content')

<section class="signup">
    <!-- <img src="images/signup-bg.jpg" alt=""> -->
    <div class="container">
        <div class="signup-content">
            <form method="POST" action="/loginAction" id="signup-form" class="signup-form">
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                {{csrf_field()}}
                <h2 class="form-title">Sign In</h2>
                <div class="form-group">
                    <input type="email" class="form-input" name="email" id="email" placeholder="Your Email" />
                </div>
                <div class="form-group">
                    <input type="text" class="form-input" name="password" id="password" placeholder="Password" />
                    <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" id="submit" class="form-submit" value="Sign up" />
                </div>
            </form>
            <p class="loginhere">
                Dont Have an account ? <a href="/register" class="loginhere-link">Register here</a>
            </p>
        </div>
    </div>
</section>


@endsection