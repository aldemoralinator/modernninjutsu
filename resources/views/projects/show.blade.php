@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="/css/project.css" />
@endsection

@section('content')
<div class="project-dashboard">
    <div class="project-dashboard__nav-links">
        <a href="{{ route('dashboard') }}" class="nav-links__link">
            <i class="fa fa-caret-left" aria-hidden="true"></i>
            
            <div class="nav-links__link__name"> Dashboard</div>
        </a>
        <div
            onclick="showMembers()"  
            class="nav-links__link manage-project--mobile"
        >
            <div class="nav-links__link__name">
                Menu
            </div>
             <i class="fa fa-bars" aria-hidden="true"></i> 
        </div>
        <a href="{{ route('project_edit', ['project'=>$project->slug]) }}" 
            class="nav-links__link manage-project--desktop"
        >
            <div class="nav-links__link__name">
                {{ $project->name }}
            </div>
            <i class="fa fa-cogs" aria-hidden="true"></i>
        </a>
    </div>
    
    <div class="project-dashboard__project-body">
        
        <div class="project-body__discussions">
            <div class="special-case__building">
                <i class="fa fa-wrench" aria-hidden="true"></i>
            </div>
            <div class="project-body__title">
                Discussions
            </div>
            <form 
                class="project-body__create-post-form"
                action="{{ route('post_store', $project->slug) }}"
                method="POST"
            >
                @csrf
                
                <div class="create-post-input-container">
                    <textarea 
                        name="message" 
                        id="create-post-input" 
                        class="create-post-form__input"
                        cols="30" 
                        rows="10"
                        required
                    ></textarea>
                    <input 
                        class="create-post-form__submit" 
                        type="submit" 
                        value="Create Post"
                    />
                </div>
            </form>
            <div class="discussions__post-list">
                @foreach ($project->posts() as $post)
                    <div class="post-list__post-container">
                        <div class="post-container__project">
                            {{ $post->project->name }}
                            <a 
                                href="{{ route('profile_show', [
                                    'profile'=>$post->user->username
                                    ]) }}" 
                                class="post-container__body__username">
                                    &commat; {{ $post->user->username }}
                            </a>
                            <span class="post-container__body__created-at">
                                {{ $post->created_at->diffForHumans() }}
                            </span>
                            @canany(['update', 'destroy'], $post)
                                <div class="special__comment--option">
                                    <i class="fa fa-cog" aria-hidden="true"></i>
                                    <div class="comment--option__dropdown-content"> 
                                        {{-- <a 
                                            href="/"
                                            onclick=
                                                "
                                                    event.preventDefault(); 
                                                    document.getElementById(
                                                        'edit-comment-form'
                                                    ).submit();
                                                "
                                            class=""
                                        >
                                            Edit
                                        </a> --}}
                                        {{-- <form 
                                            id="edit-comment-form" 
                                            action="/" 
                                            method="POST" 
                                            style="display: none;"
                                        >
                                            @csrf 
                                            @method('PATCH')
                                        </form> --}} 
                                        @can('delete', $post) 
                                            <form 
                                                action="{{ route('post_destroy', [
                                                    'project'=>$project->slug,
                                                    'post'=>$post
                                                ]) }}" 
                                                method="POST"
                                                style="outline: transparent"
                                            >
                                                @csrf 
                                                @method('DELETE')
                                                <input
                                                    class="dropdown-content__btn" 
                                                    type="submit" 
                                                    value="Delete"
                                                />
                                            </form>
                                        @endcan
                                    </div> 
                                </div>
                            @endcanany
                        </div>
                        <div class="post-container__body">
                            <span class="post-container__body__message">
                                {{ $post->message }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div
            id="project-body__member-container"  
            class="project-body__member-container">
            <div onclick="hideMembers()" class="member-container__hide"></div>
            <div class="project-body__member-list">
                <a href="{{ route('project_edit', ['project'=>$project->slug]) }}" 
                    class="nav-links__link special__manage-project--mobile"
                >
                    <div class="nav-links__link__name">
                        {{ $project->name }}
                    </div>
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                </a>
                <div class="member-list__title">Members</div>
                <div class="special-case__border-left">
                    @foreach ($members as $member)
                        <a style="
                             {{ 
                                $member->pivot->confirmed == false
                                ? 'color: lightgrey'
                                : ''
                            }};
                            " 
                            href="{{ route('profile_show', [
                                'profile'=>$member->username
                            ]) }}" 
                            class="member-list__item"
                        >
                            &commat;{{ $member->username }}
                        </a>
                    @endforeach 
                    <span class="special__invitation">
                        <a href="{{ route('invitation_index') }}" >
                            {{ __('Invitations') }}
                        </a> 
                    </span>
                
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

@section('script')
<script src="/js/project.js"></script>
@endsection