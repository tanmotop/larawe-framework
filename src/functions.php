<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2019/8/21
 * Time: 9:43 AM
 */
use Illuminate\Container\Container;

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