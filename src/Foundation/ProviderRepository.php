<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2019/9/12
 * Time: 5:27 PM
 */

namespace Larawe\Foundation;

use Illuminate\Contracts\Foundation\Application as ApplicationContract;

class ProviderRepository
{
    /**
     * @var ApplicationContract
     */
    protected $app;

    /**
     * ProviderRepository constructor.
     * @param ApplicationContract $app
     */
    public function __construct(ApplicationContract $app)
    {
        $this->app = $app;
    }

    /**
     * @param array $providers
     */
    public function load(array $providers)
    {
        foreach ($providers as $provider) {
            $this->app->register($provider);
        }
    }
}