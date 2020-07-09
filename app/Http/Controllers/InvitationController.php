<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Project;

class InvitationController extends Controller
{
    public function index()
    { 
        return view('invitation', [
            'profile'=>auth()->user(), 
            'programmers' => User::all()->where('id', '!=', auth()->user()->id),
            'invitations' => auth()->user()->pendingInvitations,
            'projects' => auth()->user()->projects
        ]);
    }

    public function store($user_id, $project_id)
    {
        Project::find($project_id)->invite($user_id);
        return back();
    }

    public function update(Project $project)
    { 
        auth()->user()->acceptInvitation($project->id);
        return redirect( route('project_show', ['project'=>$project->slug]) );
    }

    public function destroy(Project $project)
    { 
        auth()->user()->userDetachToProject($project->id);
        return back();
    }
}
