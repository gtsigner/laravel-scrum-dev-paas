<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/7
 * Time: 13:33
 */

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\{
    Model
};

/**
 * @field   _id
 * @field   _project_id
 * @field   _creator_id
 * @field   title
 * @field   stage_ids   Array   阶段ID
 * @field   smarty_group   int  1:分组,0:不分组
 * Class TaskList
 * @package App\Models
 */
class TaskList extends Model
{
    protected $collection = 'task_lists';

    protected $fillable = [
        '_project_id',
        '_creator_id',
        'title',
        'stage_ids',
        'smarty_group'
    ];
}