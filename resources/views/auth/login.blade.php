@extends('layouts.landing')

@section('landing-layout')
<div class="auth-container">
    <div class="auth-container__links-container">
        <a href="{{ route('login') }}" class="links-container__login active">
            Login
        </a>
        <a href="{{ route('register') }}" class="links-container__register">
            Register
        </a>
    </div>
    <div class="auth-container__form">
        @include('components._login-form')
    </div>
</div>
@endsection