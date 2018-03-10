<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/8
 * Time: 15:58
 */

namespace App\Repositories;


use Jenssegers\Mongodb\Eloquent\Model;

class Repository
{
    protected $model;

    public function getModel()
    {
        return $this->model;
    }

    public function setModel(Model $model)
    {
        $this->model = $model;
    }

}