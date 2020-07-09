@extends('layouts.home')

@section('home-css')
<link rel="stylesheet" href="/css/profile.css" /> 
<link rel="stylesheet" href="/css/components.project-list.css" />
@endsection

@section('home-layout')
<div class="profile-main">
    <div class="profile-main__profile-column-1">
        <div class="profile-column-1__profile-picture-box">
            <div class="special-case__title">
                Profile
            </div>
            <div class="special-case__center-container">
                <div class="special-case__center-container__item">
                    <div class="profile-picture-box__body">
                        <div class="profile-picture-box__image">
                            <img src="{{ $profile->avatar }}" alt="" width="100%" height="100%">
                        </div>
                        
                        <div class="profile-picture-box__options-box"> 
                            @can('update', $profile)
                                <a href="{{ route('profile_edit', [
                                        'profile'=>auth()->user()->username
                                    ]) }}" 
                                    class="options-box__item"
                                >
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                </a>
                            @endcan

                            @cannot('update', $profile)
                                <div class="options-box__null-item"></div>
                            @endcannot  

                            <div class="options-box__null-item"></div>
                            <div class="options-box__null-item"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-column-1__profile-info-box">
            <div class="special-case__title">
                Basic Info
            </div>
            <div class="special-case__center-container">
                <div class="special-case__center-container__item">
                    <div class="profile-info-box__item">
                        Username:
                        <span class="profile-info-box__item--strong">
                            {{ $profile->username?:'__' }}
                        </span>
                    </div>
                    <div class="profile-info-box__item">
                        Name:
                        <span class="profile-info-box__item--strong">
                            {{ $profile->firstname.' '?:''}}
                            {{ $profile->lastname?:'__' }}
                        </span>
                    </div>
                    <div class="profile-info-box__item">
                        Email:
                        <span class="profile-info-box__item--strong">
                            {{ $profile->email?:'__'}}
                        </span>
                    </div>
                    <div class="profile-info-box__item">
                        Contact No.:
                        <span class="profile-info-box__item--strong">
                            {{ $profile->contact_number?:'__' }}
                        </span>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <div class="profile-main__profile-column-2">
        <div class="profile-column-2__project">
            <div class="special-case__title">
                Projects
            </div>
            <div class="project-list">
                @include('components._project-list')
            </div>
        </div>
        <div class="special-case__building">
            <i class="fa fa-wrench" aria-hidden="true"></i>
        </div>
    </div>
</div> 
@endsection
