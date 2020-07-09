<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('test', function() {
    Storage::disk('google')->put('test.txt', 'Hello World');
});


################################################################################
##  PREVENT BACK HISTORY  ######################################################
################################################################################
Route::group(['middleware' => 'prevent-back-history'],function(){

Route::get('/', function () {
    if (auth()->user()) {
        return redirect(route('dashboard'));
    } else {
        return view('welcome');
    }
});

Auth::routes();
Route::middleware('auth')->group(function () {

    ##  DASHBOARD
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


    ##  PROFILE_CONTROLLER
    Route::get(
        '/profiles', 
        'ProfileController@index'
    )->name('profile_index');

    // Route::post(
    //     '/profiles', 
    //     'ProfileController@store'
    // )->name('profile_store');

    Route::get(
        '/profiles/{profile:username}', 
        'ProfileController@show'
    )->name('profile_show');

    Route::get(
        '/profiles/{profile:username}/edit',
        'ProfileController@edit'
    )->name('profile_edit')->middleware('can:update,profile');

    Route::patch(
        '/profiles/{profile:username}', 
        'ProfileController@update'
    )->name('profile_update')->middleware('can:update,profile');

    // Route::delete(
    //     '/profiles/{profile:username}', 
    //     'ProfileController@destroy'
    // )->name('profile_destroy');


    ##  PROJECT_CONTROLLER
     Route::get(
        '/projects/create', 
        'ProjectController@create'
    )->name('project_create');

    Route::post(
        '/projects', 
        'ProjectController@store'
    )->name('project_store');

    Route::get(
        '/projects/{project:slug}', 
        'ProjectController@show'
    )->name('project_show')->middleware('can:view,project');

    Route::get(
        '/projects/{project:slug}/edit', 
        'ProjectController@edit'
    )->name('project_edit')->middleware('can:update,project');

    Route::patch(
        '/projects/{project:slug}', 
        'ProjectController@update'
    )->name('project_update')->middleware('can:update,project');

    // Route::delete(
    //     '/projects/{project:slug}', 
    //     'ProjectController@destroy'
    // )->name('project_destroy');


    ##  INVITATION_CONTROLLER
    Route::get(
        '/invitations', 
        'InvitationController@index'
    )->name('invitation_index');

    // Route::get(
    //     '/profiles/{profile:username}/invitations', 
    //     'InvitationController@show'
    // )->name('invitation_show');

    Route::post(
        '/invitations/{user_id}/{project_id}',
        'InvitationController@store'
    )->name('invitation_store')->middleware('can:invite-user,project_id');

    Route::patch(
        '/invitations/{project:slug}',
        'InvitationController@update'
    )->name('invitation_update')->middleware('can:accept-project,project');

    Route::delete(
        '/invitations/{project:slug}',
        'InvitationController@destroy'
    )->name('invitation_destroy')->middleware('can:reject-project,project');


    ##  POST_CONTROLLER
    Route::post(
        '/projects/{project:slug}/posts', 
        'PostController@store'
    )->name('post_store');

    Route::patch(
        '/projects/{project:slug}/posts/{post}',
        'PostController@update'
    )->name('post_update')->middleware('can:update,post');

    Route::delete(
        'projects/{project:slug}/posts/{post}', 
        'PostController@destroy'
    )->name('post_destroy')->middleware('can:delete,post');

    // Route::get('/test', function () {
    //     storagePut('/aldem/testfile.png', request('file.txt'));
    // });

    // Route::get('test', function() { 
    //     Storage::disk('google')->put('test.txt', 'Hello World');
    // });

    Route::get('/test', 'ImageUploadController@home');

    Route::post('/upload/images', [
        'uses'   =>  'ImageUploadController@uploadImages',
        'as'     =>  'uploadImage'
    ]);
    
  

}); });



