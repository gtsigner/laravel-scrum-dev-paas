<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/7
 * Time: 13:33
 */

namespace App\Models;


use Moloquent;

class Task extends Moloquent
{
    protected $collection = 'tasks';


    protected $fillable = [
        '_creator_id',
        '_project_id',
        '_stage_id',
        '_task_list_id',
        'title',
        'mark',
        'note',
        'status'
    ];
}