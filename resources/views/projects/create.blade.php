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
            action="{{ route('project_store') }}"
        >
            @csrf
            <div class="form-title">Create Project</div>

            <div class="form__form-group">
                <label 
                    for="create-project-name" 
                    class="form-group__label"
                >
                    {{ __('Project Name') }}
                </label>

                <input
                    id="create-project-name" 
                    type="text"
                    class="form-group__input @error('name') 
                        form-group__error @enderror" 
                    name="name"
                    value="{{ old('name') }}"
                    required 
                    autocomplete="name" 
                    autofocus
                />

                @error('name')
                    <span class="form-group__error-message" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form__submit-container">
                <button type="submit" class="form__submit">
                    {{ __('Submit') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection