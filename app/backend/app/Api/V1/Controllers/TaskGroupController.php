<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/7
 * Time: 22:48
 */

namespace App\Api\V1\Controllers;


use App\Models\TaskGroup;

class TaskGroupController extends BaseController
{


    public function index()
    {
        $projectId = request('project_id');
        $taskGroups = TaskGroup::where('_project_id', $projectId)->get();
        return $taskGroups;
    }
}