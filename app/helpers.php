<?php

use Illuminate\Support\Facades\Storage;

use App\Status;

// function status($status) {
//     return Status::where('status', $status)->first()->id;
// }

// function statusIdToStatus($status_id) {
//     return Status::where('id', $status_id)->status;
// }

function storagePut(str $filePath, $file) {
    Storage::put($filePath, $file);
}

function storageGet(str $filePath) {
    Storage::get($filePath);
}

function collectionToIdArray($collection)
{
    return $collection->pluck('id')->toArray();
}

function getAllProjectsDistincMembersId($user)
{
    return $user->projects->map( function ($project) {
        return $project->members->pluck('id');
    })->flatten()->unique();
}