<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2019/9/13
 * Time: 10:39 PM
 */

namespace Tanmo\Wq\Foundation\Bootstrap;

use Illuminate\Contracts\Foundation\Application;

class WqUrlGenerator
{
    public function bootstrap(Application $app)
    {
        $app['url']->formatPathUsing(function ($path) use ($app) {
            return '?' . http_build_query([
                    'c' => 'site',
                    'a' => 'entry',
                    'm' => $app['config']->get('app.module_name'),
                    'do' => 'index',
                    'r' => ltrim($path, '/')
                ]);
        });
    }
}