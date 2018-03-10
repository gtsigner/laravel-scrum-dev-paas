<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/7
 * Time: 13:33
 */

namespace App\Models;


use Moloquent;

/**
 * 任务执行的阶段
 *
 * @field _project_id String 项目ID
 * @field _creator_uid String 创建者
 * @field title String  标题
 * @field description String 描述
 * @field sort  int 排序
 *
 * Class Stage
 * @package App\Models
 */
class SmartStage extends Moloquent
{
    protected $collection = 'smart_stage';




}