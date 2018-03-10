<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/7
 * Time: 23:24
 */

namespace App\Api\V1\Controllers;


use App\Models\TaskList;
use App\Models\TaskStage;

class TaskStageController extends BaseController
{

    public function index()
    {
        $projectId = request('project_id');
        $taskListId = request('task_list_id');

        //先获取TaskList
        $taskList = TaskList::where('_id', $taskListId)->first();
        //然后通过
        $stageIds = (array)$taskList['stage_ids'];
        $taskStages = TaskStage::where('_project_id', $projectId)
            ->where('_task_list_id', $taskListId)
            ->whereIn('_id', $stageIds)
            ->orderBy('sort', 'ASC')
            ->get();

        return $taskStages;
    }

    /**
     * 添加任务阶段
     * @return TaskStage
     */
    public function store()
    {
        $projectId = request('_project_id');
        $taskListId = request('_task_list_id');

        $taskList = TaskList::where('_id', $taskListId)->first();
        $taskStage = new TaskStage([
            '_project_id' => $projectId,
            '_task_list_id' => $taskListId,
            '_creator_id' => $this->cUser['_id'],
            'name' => request('name'),
            'is_archived' => false,
            'sort' => count($taskList->stage_ids)
        ]);
        $taskStage->save();
        /*更新任务列表*/
        TaskList::where('_id', $taskListId)->push('stage_ids', $taskStage->_id);

        return $taskStage;
    }

    public function update($id)
    {

    }
}