<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/7
 * Time: 20:02
 */

namespace App\Api\V1\Controllers;


use App\Models\Task;
use App\Repositories\TaskRepository;
use Request;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

class TaskController extends BaseController
{
    protected $taskRepos;

    public function __construct(TaskRepository $taskRepository)
    {
        parent::__construct();
        $this->taskRepos = $taskRepository;
    }


    public function index()
    {
        $projectId = request('project_id');
        $stageId = request('stage_id');
        $tasks = $this->taskRepos
            ->myTasks($this->cUser)
            ->where([
                '_project_id' => $projectId,
                '_stage_id' => $stageId
            ])
            ->orderBy('status', 'asc')
            ->get();
        return $tasks;

    }

    public function store()
    {
        $projectId = request('_project_id');
        $stageId = request('_stage_id');
        $taskListId = request('_task_list_id');

        $task = new Task([
            '_creator_id' => $this->cUser['_id'],
            '_project_id' => $projectId,
            '_stage_id' => $stageId,
            '_task_list_id' => $taskListId,
            'title' => request('title'),
            'mark' => request('mark'),
            'note' => request('note'),
            'status' => request('status')
        ]);

        $task->save();
        return $task;
    }

    public function update(Request $request, $id)
    {
        $task = Task::where('_id', $id)->first();
        if (!$task) {
            throw new ResourceNotFoundException('Not found Res');
        }
        $task->status = request('status');
        $task->save();
        return $task;
    }

    public function move($id)
    {
        $task = Task::where('_id', $id)->first();
        $task->_stage_id = request('_stage_id');
        $task->save();
        return $task;
    }
}