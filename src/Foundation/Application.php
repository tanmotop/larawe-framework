<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2019/8/21
 * Time: 9:52 AM
 */

namespace Tanmo\Wq\Foundation;


use Illuminate\Container\Container;

class Application extends Container
{
    /**
     * Application constructor.
     */
    public function __construct()
    {
        $this->registerBaseBindings();
    }

    /**
     * Register the basic bindings into the container.
     *
     * @return void
     */
    protected function registerBaseBindings()
    {
        static::setInstance($this);

        $this->instance('app', $this);

        $this->instance(Container::class, $this);
    }
}