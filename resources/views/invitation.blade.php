@extends('layouts.home')

@section('home-css')
<link rel="stylesheet" href="/css/invitation.css" />
@endsection

@section('home-layout')
<div class="invitation-main">
    <div class="project-invites">
        <div class="project-invites__title">
            Project Invites
        </div>
        <div class="project-invites__list">
            @forelse ($invitations as $invitation)
                <div class="invitation-item">
                    <div class="invitation__head">
                        <span class="invitation__name">
                            {{ $invitation->name }}
                        </span>
                        <span class="invitation__members">
                            {{ $invitation->members->count().' members' }}
                        </span>
                        <span class="invitation__date">
                            {{ $invitation->pivot->created_at->diffForHumans() }}
                        </span>
                        <div class="invitation__response__dropdown">
                            Respond
                            <div class="dropdown-content"> 
                                <a 
                                    href="/"
                                    onclick=
                                        "
                                            event.preventDefault(); 
                                            document.getElementById(
                                                'accept-invitation-form'
                                            ).submit();
                                        " 
                                    class=""
                                >
                                    Accept
                                </a>
                                <a 
                                    href="/"
                                    onclick=
                                        "
                                            event.preventDefault(); 
                                            document.getElementById(
                                                'reject-invitation-form'
                                            ).submit();
                                        " 
                                    class=""
                                >
                                    Reject
                                </a>
                                <form 
                                    id="accept-invitation-form" 
                                    action="{{ route('invitation_update', [
                                        'project'=>$invitation->slug
                                    ]) }}" 
                                    method="POST" 
                                    style="display: none;"
                                >
                                    @csrf 
                                    @method('PATCH')
                                </form>
                                <form 
                                    id="reject-invitation-form" 
                                    action="{{ route('invitation_destroy', [ 
                                        'project'=>$invitation->slug
                                    ]) }}" 
                                    method="POST" 
                                    style="display: none;"
                                >
                                    @csrf 
                                    @method('DELETE')
                                </form>
                            </div> 
                        </div>
                    </div>
                    <div class="invitation__introduction">
                        This is where you should put the description of your project
                    </div>
                </div>
            @empty 
                <div class="special-case__empty">
                    No Invites
                </div>
            @endforelse
        </div>
    </div>
    <div class="invite-people">
        <div class="invite-people__title">
            Invite People
        </div>
        <div class="invite-people__list">
            @forelse ($programmers as $programmer)
                <div class="invite-people__list-item">
                    <a 
                        href="{{ route('profile_show', [
                                'profile'=>$programmer->username
                            ]) }}"
                        class="invite-people__list-item__username">
                        &commat;{{ $programmer->username }}
                    </a>
                    <div class="invitation__response__dropdown">
                        Invite
                        <div class="dropdown-content">
                            @forelse ($projects as $project)
                                @if ($programmer->invitations->contains($project))
                                    
                                @else 
                                    <a 
                                        href="/"
                                        onclick=
                                            "
                                                event.preventDefault(); 
                                                document.getElementById(
                                                    'invite-form'
                                                ).submit();
                                            " 
                                        class=""
                                    >
                                        {{ $project->name }}
                                    </a>
                                    <form 
                                        id="invite-form" 
                                        action="{{ route('invitation_store', [
                                            'user_id'=>$programmer->id,
                                            'project_id'=>$project->id
                                        ]) }}" 
                                        method="POST" 
                                        style="display: none;"
                                    >
                                        @csrf 
                                    </form>
                                @endif
                            @empty 
                                <div class="special-case__empty">No Projects</div>
                            @endforelse 
                        </div> 
                    </div>
                </div>
            @empty 
                <div class="special-case__empty">
                    Not enough users
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection