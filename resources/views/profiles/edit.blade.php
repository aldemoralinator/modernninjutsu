@extends('layouts.home')

@section('home-css')
<link rel="stylesheet" href="/css/profile.css" /> 
<link rel="stylesheet" href="/css/components.project-list.css" />
@endsection

@section('home-layout')
<div class="auth-container">
    <div class="auth-container__links-container">
        Edit Profile
    </div>
    <div class="auth-container__form">
        @include('components._edit-profile-form')
    </div>
</div>
@endsection