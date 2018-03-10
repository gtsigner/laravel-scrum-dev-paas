<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/7
 * Time: 21:05
 */

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model;

/**
 * 扩展任务字段配置
 * @field   _id         ObjectId
 * @field   _role_ids   Array
 * @field   _project_id String      所属项目，如果是空表明可以全局使用
 * @field   _creator_uid    String  创建人ID
 * @field   name        String      标识
 * @field   title       String      名称
 * @field   description String      描述
 * @field   filed_type        获取字段类型
 *  ['custom_field','note','priority','tag']
 * @field   type  ['text','radio','checkbox','number','date','text']  类型
 * @field   choices     Array       选项
 * @field   displayed   bool        是否显示在任务卡片上
 * @field   required    bool        是否必填
 *
 *
 *
 * Class TaskFields
 * @package App\Models
 */
class TaskFields extends Model
{
    protected $collection = 'task_fields';

}