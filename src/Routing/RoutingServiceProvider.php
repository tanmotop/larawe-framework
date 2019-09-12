<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2019/8/26
 * Time: 3:27 PM
 */

namespace Tanmo\Wq\Routing;


use Illuminate\Routing\Router;
use Illuminate\Routing\RoutingServiceProvider as ServiceProvider;
use Illuminate\Routing\UrlGenerator;

class RoutingServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->registerRouter();
        $this->registerUrlGenerator();
    }

    /**
     * Register the router instance.
     *
     * @return void
     */
    protected function registerRouter()
    {
        $this->app->singleton('router', function ($app) {
            return new Router($app['events'], $app);
        });
    }

    protected function registerUrlGenerator()
    {
        $this->app->singleton('url', function ($app) {
            $routes = $app['router']->getRoutes();

            $app->instance('routes', $routes);

            $url = new UrlGenerator(
                $routes, $app->rebinding(
                'request', $this->requestRebinder()
            )
            );


            $app->rebinding('routes', function ($app, $routes) {
                $app['url']->setRoutes($routes);
            });

            return $url;
        });
    }

    /**
     * Get the URL generator request rebinder.
     *
     * @return \Closure
     */
    protected function requestRebinder()
    {
        return function ($app, $request) {
            $app['url']->setRequest($request);
        };
    }
}