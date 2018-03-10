<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/6
 * Time: 23:02
 */

namespace App\Repositories;


use App\Models\Project;
use App\Models\Task;
use App\Models\TaskGroup;
use App\Models\TaskList;
use App\Models\TaskStage;
use Request;

class ProjectRepository
{

    protected $model;

    public function __construct(Project $model)
    {
        $this->model = $model;
    }

    public function myProjects($domainType = 0)
    {
        $user = auth()->user();
        return $this->model
            ->where('_creator_id', $user['_id'])
            ->orderBy('create_at', 'desc');//创建时间排序
    }

    public function where($where)
    {
        return $this->model->where($where);
    }

    public function createProject()
    {
        $user = auth()->user();
        $project = new Project();
        $project->_creator_id = $user['_id'];
        $project->creator = [
            '_id' => $user['_id'],
            'name' => $user['username'],
            'avatar_url' => $user['avatar_url']
        ];
        $project->title = request('title');
        $project->description = request('description');
        $project->logo = request('logo');

        //模板ID
        $project->template_id = request('template_id');
        $project->is_public = true;
        $project->task_types = [];
        $project->applications = [];//应用
        $project->tags = [];
        $project->transferable = false;
        $project->status = 1;


        /*初始化应用程序*/
        $project->save();
        $this->_afterCreateProject($project);
        return $project;

    }

    private function _afterCreateProject(Project $project)
    {
        //专业模板,创建一个2个TaskGroup
        #region
        if ($project->template_id === 0) {
            //迭代面板
            $taskGroupSprint = new TaskGroup([
                '_project_id' => $project->_id,
                '_creator_id' => $project->_creator_id,
                'name' => 'sprint',
                'view' => [
                    'type' => 'sprint'
                ],
                'type' => 'sprint',
                'description' => '',
                'filter' => 'sprint_status = active',
            ]);
            $taskGroupSprint->save();

            //需求
            $taskGroupStory = new TaskGroup([
                '_project_id' => $project->_id,
                '_creator_id' => $project->_creator_id,
                'name' => 'story',
                'view' => [
                    'type' => 'story'
                ],
                'type' => 'story',
                'description' => '',
                'filter' => 'task_type = story',
            ]);
            $taskGroupStory->save();

            //缺陷
            $taskGroupBug = new TaskGroup([
                '_project_id' => $project->_id,
                '_creator_id' => $project->_creator_id,
                'name' => 'bug',
                'view' => [
                    'type' => 'bug'
                ],
                'type' => 'bug',
                'description' => '',
                'filter' => 'task_type = bug',
            ]);
            $taskGroupBug->save();
        }
        #endregion
        #region /*创建一个任务列表*/
        $taskList = new TaskList([
            '_project_id' => $project->_id,
            '_creator_id' => $project->_creator_id,
            'title' => '任务',
            'stage_ids' => [],
            'smarty_group' => 0
        ]);
        $taskList->save();
        #endregion


        //#region   初始化阶段信息
        $stages = [
            [
                'name' => '待处理',
                'is_archived' => false,
                'sort' => 0
            ],
            [
                'name' => '开发中',
                'is_archived' => false,
                'sort' => 1
            ],
            [
                'name' => '测试中',
                'is_archived' => false,
                'sort' => 2
            ],
            [
                'name' => '已完成',
                'is_archived' => false,
                'sort' => 3
            ],
        ];
        foreach ($stages as $stage) {
            $newStage = new TaskStage(array_merge($stage,
                [
                    '_project_id' => $project->_id,
                    '_creator_id' => $project->_creator_id,
                    '_task_list_id' => $taskList->_id
                ]
            ));
            $newStage->save();


            //#region   给阶段初始化一些任务
            $newTask = new Task([
                '_creator_id' => $project->_creator_id,
                '_project_id' => $project->_id,
                '_stage_id' => $newStage->_id,
                '_task_list_id' => $taskList->_id,
                'title' => '敏捷开发任务模板',
                'mark' => '',
                'note' => '',
                'status' => 1
            ]);
            $newTask->save();
            //#endregion


            //更新TaskList
            $taskList->push('stage_ids', $newStage->_id);

            $taskList->save();
        }

        //#endrgion 初始化阶段信息

    }

    private function _initTpl(Project &$project)
    {

        return $project;
    }
}