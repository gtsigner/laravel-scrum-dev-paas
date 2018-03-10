<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/6
 * Time: 17:50
 */

namespace App\Api\V1\Controllers;


use App\Models\Posts;
use App\Models\Project;
use App\Repositories\ProjectRepository;
use Dingo\Api\Routing\Helpers;
use MongoDB\BSON\ObjectId;

class ProjectController extends BaseController
{
    use Helpers;
    protected $projectRepos;

    public function __construct(ProjectRepository $repository)
    {
        parent::__construct();
        $this->projectRepos = $repository;
    }

    public function index()
    {
        $id = request('id', null);
        if ($id === null) {
            $myProjects = $this->projectRepos
                ->myProjects()->get();
            return $this->response->array([
                'projects' => $myProjects
            ]);
        } else {
            $where = ['_id' => $id];
            $project = $this->projectRepos
                ->where($where)
                ->first();
            return $this->response->array([
                'query' => $where,
                'project' => $project
            ]);
        }
    }

    public function store()
    {

        $project = $this->projectRepos->createProject();
        return $this->response->array([
            'message' => '添加成功',
            'project' => $project
        ]);
    }


    public function update($id)
    {
        $project = Project::where(['_id' => $id])->first();
        $project->title = request('title');
        $project->description = request('description');
        $project->save();

        return $project;
    }

    public function destroy($id)
    {

    }

    public function posts($projectId)
    {
        $posts = Posts::where('_project_id', $projectId)
            ->where('_creator_id', $this->cUser['_id'])
            ->get();
        return $posts;
    }
}