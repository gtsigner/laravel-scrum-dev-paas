<?php
/**
 * Created by PhpStorm.
 * User: godtoy
 * Date: 2018/3/7
 * Time: 14:35
 */

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

/**
 * 灵活的模板
 * Class SmartTask
 * @package App\Models
 */
class SmartTask extends Eloquent
{
    protected $collection = 'smart_stages';


}