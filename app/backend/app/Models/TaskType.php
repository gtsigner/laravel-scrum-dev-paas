<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/7
 * Time: 21:00
 */

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model;

/**
 * @field   _id     ObjectId    阶段标识
 * @filed   _creator_uid    String 用户
 * @field   title   String      需求|缺陷|迭代/任务
 * @field   description String  描述
 * @field   icon    String      图标
 * @field   custom_fields   Array  字段配置,这些都是附加动态字段
 *
 * Class TaskType
 * @package App\Models
 */
class TaskType extends Model
{
    protected $collection = 'task_types';


}