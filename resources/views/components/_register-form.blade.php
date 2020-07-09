<form 
    class="form"
    method="POST" 
    action="{{ route('register') }}"
>
    @csrf

    <div class="form__form-group">
        <label 
            for="register-username" 
            class="form-group__label"
        >
            {{ __('Username') }}
        </label> 

        <input 
            id="register-username" 
            type="text" 
            class=
            "form-group__input @error('username') form-group__error @enderror" 
            name="username" 
            value="{{ old('username') }}" 
            required 
            autocomplete="username"
        /> 

        @error('username')
            <span class="form-group__error-message" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form__form-group">
        <label 
            for="register-email" 
            class="form-group__label"
        >
            {{ __('E-Mail Address') }}
        </label> 
        
        <input 
            id="register-email" 
            type="email" 
            class=
            "form-group__input @error('email') form-group__error @enderror" 
            name="email" 
            value="{{ old('email') }}" 
            required 
            autocomplete="email"
        /> 

        @error('email')
            <span class="form-group__error-message" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    
    <div class="form__form-group">
        <label 
            for="register-password" 
            class="form-group__label"
        >
            {{ __('Password') }}
        </label> 
        
        <input 
            id="register-password" 
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
            for="register-confirm-password" 
            class="form-group__label"
        >
            {{ __('Confirm Password') }}
        </label> 
        
        <input 
            id="register-confirm-password" 
            type="password" 
            class="form-group__input" 
            name="password_confirmation" 
            required 
            autocomplete="new-password"
        /> 

        @error('password')
            <span class="form-group__error-message" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form__submit-container">
        <button type="submit" class="form__submit">
            {{ __('Register') }}
        </button>
    </div>
</form>