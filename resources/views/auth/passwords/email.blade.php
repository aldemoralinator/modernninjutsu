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
            action="{{ route('password.email') }}"
        >
            @csrf

            <div class="form-title">Confirm Password</div>
    
            <div class="form__form-group">
                @if (session('status'))
                    <div class="form-group__error-message" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        
            <div class="form__form-group">
                <label 
                    for="email" 
                    class="form-group__label">
                    {{ __('E-Mail Address') }}
                </label>

                <input 
                    id="email" 
                    type="email" 
                    class="form-group__input @error('email') form-group__error @enderror" 
                    name="email" 
                    value="{{ old('email') }}" 
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
    
            <div class="form__submit-container">
                <button type="submit" class="form__submit">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>
    
    </div>
</div>
@endsection
