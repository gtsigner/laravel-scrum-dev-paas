<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/6
 * Time: 23:03
 */

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 *
 * @field   _id
 * @field   _creator    Object      项目归属
 * @field   _creator_id  String      项目归属
 * @field   title           String      项目名称
 * @field   description
 * @field   logo        Sting       项目背景图
 * @field   is_public   bool        是否公开
 * @field   task_types  Array       任务类型
 * @field   applications   Array         应用和插件
 * @field   tags        Array       关联的标签
 * @field   start_time  datetime    项目开始时间
 * @field   finish_time date_time   项目结束时间
 * @field   transferable    bool    项目是否可以移交
 * @field   status      1:进行中，2:暂停，3:取消，4:完成
 *
 *
 * Class Project
 * @package App\Models
 */

/**
 * @task_types
 *
 * Class Project
 * @package App\Models
 */
class Project extends Eloquent
{

    protected $collection = 'projects';

    public function taskTypes()
    {
        $taskType = [
            '_id' => '任务ID',
            'removable' => false//是否可以删除
        ];

    }

}