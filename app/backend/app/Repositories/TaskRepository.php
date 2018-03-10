<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/8
 * Time: 15:57
 */

namespace App\Repositories;


use App\Models\Task;
use App\Models\User;

class TaskRepository extends Repository
{
    public function __construct(Task $taskModel)
    {
        $this->model = $taskModel;
    }

    public function myTasks(User $user)
    {
        return $this->model->where('_creator_id', $user->_id);
    }
}