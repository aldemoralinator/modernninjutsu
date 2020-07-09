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
            action="{{ route('password.confirm') }}"
        >
            @csrf

            <div class="form-title">Confirm Password</div>

            <div class="form__form-group">
                <div class="form-group__label">
                    {{ __('Please confirm your password before continuing.') }}
                </div>
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
                    class="form-group__input @error('password') form-group__error @enderror" 
                    name="password" 
                    required 
                    autocomplete="current-password"
                />

                @error('password')
                    <span class="form-group__error-message" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form__form-group">
                <input 
                    class="form-group__checkbox" 
                    type="checkbox" 
                    name="remember" 
                    id="remember" 
                    {{ old('remember') ? 'checked' : '' }}
                />
                <label class="form-group__checkbox-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="form__submit-container">
                <button type="submit" class="form__submit">
                    {{ __('Confirm Password') }}
                </button>

                @if (Route::has('password.request'))
                    <a 
                        class="submit-container__forgot-password" 
                        href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection