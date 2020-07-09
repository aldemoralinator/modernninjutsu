<form 
    class="form"
    method="POST" 
    action="{{ route('project_update', [
        'project'=>$project
    ]) }}"
>
    @csrf
    @method('PATCH')

    <div class="form__form-group">
        <label 
            for="edit-project-name" 
            class="form-group__label"
        >
            {{ __('Project Name') }}
        </label>

        <input
            id="edit-project-name" 
            type="text" 
            class=
                "form-group__input @error('name') form-group__error @enderror" 
            name="name"
            value="{{ $project->name }}" 
            autocomplete="text"
            required
        /> <br>

        @error('name')
            <span class="form-group__error-message" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
  
    <div class="form__submit-container">
        <button type="submit" class="form__submit">
            {{ __('Save Changes') }}
        </button> 
    </div>
</form>