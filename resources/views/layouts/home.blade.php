@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/layouts.home.css">
<link rel="stylesheet" href="/css/form.css" />

@yield('home-css')

@endsection

@section('content')

<div class="main-container">
    <div
        id="main-container__navigation-container" 
        class="main-container__navigation-container"
    >
        <div class="navigation-container__link-container">
            <a 
                href="{{ route('dashboard') }}" 
                class="
                    {{ (request()->segment(1) == 'dashboard') ? 'link--active' : '' }}
                    link-container__link"
                >
                Dashboard
            </a>
            <a href="{{ route('profile_show', [
                    'profile'=>auth()->user()->username
                ]) }}" 
                class="
                    {{ (request()->segment(1) == 'profiles') ? 'link--active' : '' }}
                    link-container__link">
                Profile
            </a>
            <a href="{{ route('invitation_index') }}" 
                class="
                    {{ (request()->segment(1) == 'invitations') ? 'link--active' : '' }}
                    link-container__link">
                Invitations
            </a>
            <a 
                href="{{ route('logout') }}"
                onclick=
                    "
                        event.preventDefault(); 
                        document.getElementById('logout-form').submit();
                    " 
                class="link-container__link"
            >
                Logout
            </a>
            <form 
                id="logout-form" 
                action="{{ route('logout') }}" 
                method="POST" 
                style="display: none;"
            >
                @csrf
            </form>
        </div>
        <div 
            onclick="hideNavigation()"
            class="navigation-container__hide-navigation"
        ></div>
    </div>
    <div class="main-container__main-content">

        <div
            onclick="showNavigation()" 
            class="main-content__show-navigation"
        >
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>

        @yield('home-layout')

    </div>
</div>

@endsection

@section('script')
<script src="/js/layouts.home.js"></script>
@endsection