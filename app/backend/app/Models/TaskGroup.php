<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/7
 * Time: 20:54
 */

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model;

/**
 *
 * @field   _id     ObjectId    分组
 * @field   _project_id
 * @field   _creator_id
 * @field   name    String
 * @field   view    Array   视图
 * @field   type
 * @field   description
 * @field   filter
 * Class SmartGroup
 * @package App\Models
 */
class TaskGroup extends Model
{
    /*{
        "_id":"5a913dee611d9e01c4c4c301",
        "name":"sprint",
        "view":{
            "type":"kanban",
            "vertical":"subtask",
            "horizontal":"stage",
            "_id":"5a913dee611d9e01c4c4c2fd"
        },
        "type":"sprint",
        "description":"",
        "filter":"sprintStatus = active",
        "_projectId":"5a913dee611d9e01c4c4c2f1",
        "_creatorId":"59fc78381d77e2d5c5a34d56",
        "created":"2018-02-24T10:26:54.641Z",
        "updated":"2018-02-24T10:26:54.641Z"
    }
    */

    protected $collection = 'task_groups';

    protected $fillable = [
        '_project_id', '_creator_id', 'view', 'type', 'description', 'filter'
    ];
}