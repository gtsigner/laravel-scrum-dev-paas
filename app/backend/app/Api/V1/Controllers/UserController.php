<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/6
 * Time: 17:45
 */

namespace App\Api\V1\Controllers;


class UserController extends BaseController
{

    public function index()
    {
        return ['hello'];
    }
}