<?php

namespace App\Models;


use Moloquent;

class Admin extends Moloquent
{
    protected $collection = 'admin';     //文档名
    protected $primaryKey = '_id';    //设置id

    protected $fillable = ['id', 'name', 'phone'];  //设置字段白名单
}
