@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/form.css" />
@endsection

@section('content')
<div class="whole-page-form">
    <div class="form-container">
        <form 
            class="form"
            method="POST" 
            action="{{ route('password.update') }}"
        >
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-title">Reset Password</div>

            <div class="form__form-group">
                <label 
                    for="email" 
                    class="form-group__label">
                    {{ __('E-Mail Address') }}
                </label>

                <input 
                    id="email" 
                    type="email" 
                    class=
                    "form-group__input @error('email') form-group__error @enderror" 
                    name="email" 
                    value="{{ $email ?? old('email') }}"
                    required 
                    autocomplete="email" 
                    autofocus
                />

                @error('email')
                    <span class="form-group__error-message" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form__form-group">
                <label 
                    for="password" 
                    class="form-group__label"
                >
                    {{ __('Password') }}
                </label>

                <input 
                    id="password" 
                    type="password" 
                    class=
                    "form-group__input @error('password') form-group__error @enderror" 
                    name="password" 
                    required 
                    autocomplete="new-password"
                />

                @error('password')
                    <span class="form-group__error-message" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form__form-group">
                <label 
                    for="confirm-password" 
                    class="form-group__label"
                >
                    {{ __('Confirm Password') }}
                </label>
                
                <input 
                    id="password-confirm" 
                    type="password" 
                    class="form-group__input" 
                    name="password_confirmation" 
                    required 
                    autocomplete="new-password"
                />
            </div>

            <div class="form__submit-container">
                <button type="submit" class="form__submit">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
    
</div>
@endsection