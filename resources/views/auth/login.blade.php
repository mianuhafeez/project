@extends('layouts.auth')

@section('content')
<div class="main">
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{asset('images/signin.jpg')}}" alt="sing up image"/></figure>
                    <a href="{{route('register')}}" class="signup-image-link">Create an account</a>
                </div>
                <div class="signin-form">
                    <login-form></login-form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
