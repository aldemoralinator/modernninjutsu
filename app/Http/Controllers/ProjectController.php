<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $validated = request()->validate([
            'name' => 'required|string|max:24',
        ]);
        $project = Project::create($validated);
        $slug = $project->slug;
        $project->invite(auth()->user()->id);
        auth()->user()->acceptInvitation($project->id);
        return redirect( route('project_show', ['project'=>$slug]) );
    }

    public function show(Project $project)
    {
        return view('projects.show', [
            'project'=>$project,
            'members'=>$project->members
        ]);
    }

    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project'=>$project
        ]);
    }

    public function update(Project $project)
    { 
        $validated = request()->validate([
            'name' => 'required|string|max:24',
        ]);
        $project->name = $validated['name'];
        $project->save();
        return redirect( route('project_show', ['project'=>$project->slug]) );
    }
}
