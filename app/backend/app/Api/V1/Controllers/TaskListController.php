<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/7
 * Time: 23:14
 */

namespace App\Api\V1\Controllers;


use App\Models\TaskList;
use App\Models\TaskStage;

class TaskListController extends BaseController
{
    public function index()
    {
        $projectId = request('_project_id');
        $taskLists = TaskList::where('_project_id', $projectId)
            ->get();
        return $taskLists;
    }

    public function update($id)
    {
        $taskList = TaskList::where('_id', $id)->first();
        $stageIds = request('stage_ids');
        $taskList->stage_ids = $stageIds;
        $taskList->save();
        //TODO 优化
        foreach ($stageIds as $k => $stageId) {
            TaskStage::where('_id', $stageId)->update(['sort' => $k]);
        }
        return $taskList;
    }
}