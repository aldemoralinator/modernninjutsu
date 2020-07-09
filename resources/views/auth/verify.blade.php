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
            action="{{ route('verification.resend') }}"
        >
            @csrf

            <div class="form-title">Verify</div>

            <div class="form__form-group">
                <div class="form-group__label">
                    {{ __('Verify Your Email Address') }}
                </div>
                @if (session('resent'))
                    <div class="form-group__error-message" role="alert">
                        {{ __('A fresh verification link has been 
                        sent to your email address.') }}
                    </div>
                @endif
                <div class="form-group__label">
                    {{ __('Before proceeding, please check your email for a 
                    verification link.') }}
                </div>
                <div class="form-group__label>
                    {{ __('If you did not receive the email') }}
                </div>
            </div>

            <div class="form__submit-container">
                <button 
                    type="submit" 
                    class="form__submit"
                >
                    {{ __('click here to request another') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 