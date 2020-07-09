<form 
    class="form"
    method="POST" 
    action="{{ route('login') }}"
>
    @csrf

    <div class="form__form-group">
        <label 
            for="login-email" 
            class="form-group__label"
        >
            {{ __('E-Mail Address') }}
        </label>

        <input
            id="login-email" 
            type="email" 
            class=
                "form-group__input @error('email') form-group__error @enderror" 
            name="email" 
            value="{{ old('email') }}" 
            required 
            autocomplete="email" 
            autofocus
        /> <br>

        @error('email')
            <span class="form-group__error-message" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form__form-group">
        <label 
            for="login-password" 
            class="form-group__label"
        >
            {{ __('Password') }}
        </label>

        <input 
            id="login-password" 
            type="password" 
            class=
            "form-group__input @error('password') form-group__error @enderror" 
            name="password" 
            required 
            autocomplete="current-password"
        /> <br>

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
            {{ __('Login') }}
        </button>

        @if (Route::has('password.request'))
            <a 
                class="submit-container__forgot-password" 
                href="{{ route('password.request') }}"
            >
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
    </div>
</form>