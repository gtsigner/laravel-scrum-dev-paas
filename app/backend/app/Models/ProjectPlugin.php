<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/7
 * Time: 14:26
 */

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model;

class ProjectPlugin extends Model
{
    /**
     * 字段备注
     * @var array
     */
    protected $fieldMark = [
        ['_id', '', 'ObjectId'],
        ['name' => '应用民名称'],
        ['title', '名称', 'array', ['cn' => '任务', 'en' => '']],
        ['description', '描述', 'array', ['cn' => '', 'en' => '']],
        ['sort', '排序', 'int', 1],
        ['type', '应用类型:0应用，1插件', 'select', '0|1']
    ];
}