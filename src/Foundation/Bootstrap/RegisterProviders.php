<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2019/8/27
 * Time: 9:01 PM
 */

namespace Larawe\Foundation\Bootstrap;


use Illuminate\Contracts\Foundation\Application;

class RegisterProviders
{
    public function bootstrap(Application $app)
    {
        $app->registerConfiguredProviders();
    }
}