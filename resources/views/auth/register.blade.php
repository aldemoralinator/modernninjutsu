@extends('layouts.landing')

@section('landing-layout')
<div class="auth-container">
    <div class="auth-container__links-container">
        <a href="{{ route('login') }}" class="links-container__login">
            Login
        </a>
        <a href="{{ route('register') }}" 
        class="links-container__register active">
            Register
        </a>
    </div>
    <div class="auth-container__form">
        @include('components._register-form')
    </div>
</div>
@endsection