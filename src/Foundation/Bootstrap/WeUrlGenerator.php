<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2019/9/13
 * Time: 10:39 PM
 */

namespace Larawe\Foundation\Bootstrap;

use Illuminate\Contracts\Foundation\Application;
use Larawe\Routing\Redirector;
use Illuminate\Routing\Matching\MethodValidator;
use Illuminate\Routing\Matching\SchemeValidator;
use Larawe\Routing\Matching\UriValidator;
use Illuminate\Routing\Matching\HostValidator;
use Illuminate\Routing\Route;

class WqUrlGenerator
{
    /**
     * @param Application $app
     */
    public function bootstrap(Application $app)
    {
        Route::$validators = [
            new UriValidator, new MethodValidator,
            new SchemeValidator, new HostValidator,
        ];

        $this->registerFormatPathUsing($app);

        $this->rebindingRedirector($app);
    }

    /**
     * @param Application $app
     */
    public function registerFormatPathUsing($app)
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

    /**
     * 重新绑定跳转类
     *
     * @param Application $app
     */
    public function rebindingRedirector($app)
    {
        $app->singleton('redirect', function ($app) {
            $redirector = new Redirector($app['url']);

            return $redirector;
        });
    }
}