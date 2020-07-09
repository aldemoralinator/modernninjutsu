<form 
    class="form"
    method="POST" 
    action="{{ route('profile_update', [
        'profile'=>auth()->user()->username
    ]) }}"
    enctype="multipart/form-data"
>
    @csrf
    @method('PATCH')

    <input
        id="edit-profile-email" 
        type="email" 
        style="visibility: hidden"
        name="email" 
        value="{{ $profile->email }}" 
        required
    />

    <div class="form__form-group">
        <label 
            for="edit-profile-picture" 
            class="form-group__label"
        >
            {{ __('Profile Picture') }}
        </label>

        <input type="file" name="avatar" id="edit-profile-picture" />
    </div>

    <div class="form__form-group">
        <label 
            for="edit-profile-email" 
            class="form-group__label"
        >
            {{ __('E-Mail Address') }}
        </label>

        <div class="form-group__input">
           {{ $profile->email }}
        </div>
    </div>

    <div class="form__form-group">
        <label 
            for="edit-profile-username" 
            class="form-group__label"
        >
            {{ __('Username') }}
        </label>

        <input
            id="edit-profile-username" 
            type="text" 
            class=
                "form-group__input @error('username') form-group__error @enderror" 
            name="username"
            value="{{ $profile->username }}" 
            required 
            autocomplete="text" 
            
        /> <br>

        @error('username')
            <span class="form-group__error-message" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form__form-group">
        <label 
            for="edit-profile-firstname" 
            class="form-group__label"
        >
            {{ __('First Name') }}
        </label>

        <input
            id="edit-profile-firstname" 
            type="text" 
            class=
                "form-group__input @error('firstname') form-group__error @enderror" 
            name="firstname"
            value="{{ $profile->firstname }}"  
            autocomplete="text" 
            
        /> <br>

        @error('firstname')
            <span class="form-group__error-message" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form__form-group">
        <label 
            for="edit-profile-lastname" 
            class="form-group__label"
        >
            {{ __('Last Name') }}
        </label>

        <input
            id="edit-profile-lastname" 
            type="text" 
            class=
                "form-group__input @error('lastname') form-group__error @enderror" 
            name="lastname"
            value="{{ $profile->lastname }}"  
            autocomplete="text" 
            
        /> <br>

        @error('lastname')
            <span class="form-group__error-message" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form__form-group">
        <label 
            for="edit-profile-contact-number" 
            class="form-group__label"
        >
            {{ __('Contact Number') }}
        </label>

        <input
            id="edit-profile-contact-number" 
            type="text" 
            class=
                "form-group__input @error('contact_number') form-group__error @enderror" 
            name="contact_number"
            value="{{ $profile->contact_number }}"  
            autocomplete="text" 
            
        /> <br>

        @error('contact_number')
            <span class="form-group__error-message" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="form__submit-container"> 
        <a href="{{ route('password.request') }}" class="form__submit">Change Password</a>
    </div>
  
    <div class="form__submit-container">
        <button type="submit" class="form__submit">
            {{ __('Update') }}
        </button> 
    </div>


</form>