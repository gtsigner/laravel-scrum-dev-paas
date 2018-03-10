<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$api = app('Dingo\Api\Routing\Router');


Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('login', 'Auth\AuthController@login');
    Route::post('logout', 'Auth\AuthController@logout');
    Route::post('refresh', 'Auth\AuthController@refresh');
    Route::post('profile', 'Auth\AuthController@profile');
});

$api->version('v1', ['middleware' => 'api.auth'], function ($api) {
    $api->resource('user', 'App\Api\V1\Controllers\UserController');
    $api->resource('projects', 'App\Api\V1\Controllers\ProjectController');

    //Project Posts
    $api->get('projects/{project_id}/posts', 'App\Api\V1\Controllers\ProjectController@posts');


    $api->resource('task_groups', 'App\Api\V1\Controllers\TaskGroupController');
    $api->resource('task_lists', 'App\Api\V1\Controllers\TaskListController');
    $api->resource('task_stages', 'App\Api\V1\Controllers\TaskStageController');
    $api->resource('tasks', 'App\Api\V1\Controllers\TaskController');
    $api->resource('jobs', 'App\Api\V1\Controllers\JobController');

    $api->any('tasks/move/{id}', 'App\Api\V1\Controllers\TaskController@move');

    //applications
    $api->resource('posts', 'App\Api\V1\Controllers\PostsController');
});





