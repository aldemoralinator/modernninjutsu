<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Project;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        // User::class => UserPolicy::class,
        // Project::class => ProjectPolicy::class,
    ]; 



    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('invite-user', function ($user, $project_id) {
            return Project::find($project_id)->members->pluck('id')->contains($user->id);
        });

        Gate::define('accept-project', function ($user, $project) {
            return $user->pendingInvitations->pluck('id')->contains($project->id);
        });

        Gate::define('reject-project', function ($user, $project) {
            return $user->pendingInvitations->pluck('id')->contains($project->id);
        });
    }
}
