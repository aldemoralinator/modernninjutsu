@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/layouts.landing.css" />
<link rel="stylesheet" href="/css/form.css" />
@endsection

@section('content')
<div class="main-container">
    <div class="main-container__intro-container">
        <div class="intro-container">
            <div class="intro-container__first">Modern</div>
            <div class="intro-container__second">Ninjutsu</div>
            <div class="intro-container__third">Project Collaboration App</div>
            <a href="{{ route('register') }}" 
                class="intro-container__begin-here"
            >
                Begin Here
            </a>
        </div>
    </div>
    <div class="main-container__auth-container">

        @yield('landing-layout')

    </div>
</div>
@endsection


