<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function store(Project $project)
    {
        Gate::authorize('create', [Post::class, $project]);

        $validated = request()->validate([
            'message' => 'required|string|max:255',
        ]);

        Post::create([
            'user_id' => auth()->user()->id,
            'project_id' => $project->id,
            'message' => $validated['message']
        ]);
        
        return back();
    }

    public function update(Project $project, Post $post)
    {        
        $validated = request()->validate([
            'message' => 'required|string|max:255',
        ]);

        $post->message = $validated['message'];

        $post->save();

        return back();
    }

    public function destroy(Project $project, Post $post)
    {        
        Post::destroy($post->id);

        return back();
    }
}
