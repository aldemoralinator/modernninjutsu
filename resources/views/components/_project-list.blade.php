
@foreach ($projects as $project)
    <a 
        href=
        "{{ route('project_show', ['project'=>$project->slug]) }}" 
        class="project-list__project-item"
    >
        <div class="project-item__content-container">
            <div class="project-item__name">
                {{ $project->name }}
            </div>
            <div class="project-item__members">
                {{ $project->members()->count() }} members
            </div>
            <div class="project-item__created-at">
                {{ $project->created_at }}
            </div>
        </div>
    </a>
@endforeach