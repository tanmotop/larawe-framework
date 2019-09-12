<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2019/8/26
 * Time: 4:05 PM
 */

namespace Tanmo\Wq\Foundation\Bootstrap;


use Illuminate\Contracts\Foundation\Application;

class BootProviders
{
    public function bootstrap(Application $app)
    {
        $app->boot();
    }
}