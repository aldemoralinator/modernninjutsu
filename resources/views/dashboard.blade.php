@extends('layouts.home')

@section('home-css')
<link rel="stylesheet" href="/css/dashboard.css" />
<link rel="stylesheet" href="/css/components.project-list.css" />
@endsection

@section('home-layout')
<div class="dashboard-container">
    <div class="dashboard-container__projects-container">
        <div class="projects-container__title">Projects</div>
        <div class="project-list">
            @include('components._project-list')
            <a 
                href="{{ route('project_create') }}" 
                class="project-list__project-create"
            >
                create 
            </a>
        </div>
    </div>
    <div class="special-case__building">
        <i class="fa fa-wrench" aria-hidden="true"></i>
    </div>
</div>
{{-- <div class="dashboard-container">
    <div class="dashboard-container__discussion-container">
        <div class="discussion-container__title">Discussions</div>
        @include('components._discussion-list')
    </div>
</div> --}}
{{-- <div class="project-container">
    <div class="project-title">Active Projects</div>
    @include('components._project-list')
</div> --}}
{{-- <div class="activities-container">
    HOME CONTENTS :: --}}
    {{-- <div class="activity-title">Activities</div>
    <div class="activity-list">
        @foreach (range(1,6) as $activity)
            <div class="activity-item">
                <div class="activity-header">
                    ProjectA
                </div>
                <div class="activity-body">
                    Lorem, ipsum dolor sit amet consectetur adipisicing
                    elit. Consectetur consequuntur reiciendis porro 
                    laudantium corrupti at nobis libero vero cumque quia. 
                    <span class="activity-author">
                        -- &commat;aldemoralinator - may 10, 2020
                    </span>
                </div>
                <div class="activity-reply-list">
                    @foreach (range(1,3) as $reply)
                        <div class="reply-item">
                            Yes!! definitely!!
                            <span class="activity-author">
                                -- &commat;aldemoralinator - may 11, 2020
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div> --}}
{{-- </div> --}}
@endsection