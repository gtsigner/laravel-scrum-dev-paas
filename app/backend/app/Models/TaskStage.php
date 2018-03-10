<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/7
 * Time: 23:24
 */

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model;

/**
 *
 * @field   _project_id
 * @field   _task_list_id
 * @field   _creator_id
 * @field   name
 * @field   is_archived
 * @field   position
 * @field   sort
 *
 * Class TaskStage
 * @package App\Models
 */
class TaskStage extends Model
{

    /**/
    protected $collection = 'task_stages';

    protected $fillable = [
        '_project_id',
        '_task_list_id',
        '_creator_id',
        'name',
        'is_archived',
        'position',
        'sort'
    ];

}