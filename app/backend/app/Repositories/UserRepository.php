<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/6
 * Time: 16:42
 */

namespace App\Repositories;


use App\Models\User;

class UserRepository
{
    /**
     * @var User 注入UserModel
     */
    protected $user;


    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUser()
    {

    }

}