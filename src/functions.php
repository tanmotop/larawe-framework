<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2019/8/21
 * Time: 9:43 AM
 */
use PhpOption\Option;
use Illuminate\Container\Container;
use Dotenv\Environment\DotenvFactory;
use Dotenv\Environment\Adapter\PutenvAdapter;
use Dotenv\Environment\Adapter\EnvConstAdapter;
use Dotenv\Environment\Adapter\ServerConstAdapter;
use Illuminate\Contracts\View\Factory as ViewFactory;

/**
 * 应用对象
 */
if (! function_exists('app')) {
    /**
     * Get the available container instance.
     *
     * @param  string $abstract
     * @param  array $parameters
     * @return mixed|\Tanmo\Wq\Foundation\Application
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    function app($abstract = null, array $parameters = [])
    {
        if (is_null($abstract)) {
            return Container::getInstance();
        }

        return Container::getInstance()->make($abstract, $parameters);
    }
}

if (! function_exists('base_path')) {
    /**
     * Get the path to the base of the install.
     *
     * @param string $path
     * @return string
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    function base_path($path = '')
    {
        return app()->basePath().($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}

if (! function_exists('config')) {
    /**
     * Get / set the specified configuration value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param null $key
     * @param null $default
     * @return mixed|\Tanmo\Wq\Foundation\Application
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    function config($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('config');
        }

        if (is_array($key)) {
            return app('config')->set($key);
        }

        return app('config')->get($key, $default);
    }
}

if (! function_exists('storage_path')) {
    /**
     * Get the path to the storage folder.
     *
     * @param string $path
     * @return string
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    function storage_path($path = '')
    {
        return app('path.storage').($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}

if (! function_exists('resource_path')) {
    /**
     * Get the path to the resources folder.
     *
     * @param string $path
     * @return string
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    function resource_path($path = '')
    {
        return app()->resourcePath($path);
    }
}

if (! function_exists('view')) {
    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string|null  $view
     * @param  \Illuminate\Contracts\Support\Arrayable|array   $data
     * @param  array   $mergeData
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    function view($view = null, $data = [], $mergeData = [])
    {
        $factory = app(ViewFactory::class);

        if (func_num_args() === 0) {
            return $factory;
        }

        return $factory->make($view, $data, $mergeData);
    }
}

if (! function_exists('pr')) {
    function pr($val) {
        echo '<pre>';
        print_r($val);
        echo '</pre>';
    }
}

if (! function_exists('dump')) {
    function dump($val) {
        echo '<pre>';
        var_dump($val);
        echo '</pre>';
    }
}