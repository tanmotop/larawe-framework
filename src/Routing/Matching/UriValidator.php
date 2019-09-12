<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2019/9/11
 * Time: 4:09 PM
 */

namespace Tanmo\Wq\Routing\Matching;


use Illuminate\Http\Request;
use Illuminate\Routing\Matching\ValidatorInterface;
use Illuminate\Routing\Route;

class UriValidator implements ValidatorInterface
{

    /**
     * Validate a given rule against a route and request.
     *
     * @param  \Illuminate\Routing\Route $route
     * @param  \Illuminate\Http\Request $request
     * @return bool
     */
    public function matches(Route $route, Request $request)
    {
        $path = $request->get('r') === '/' ? '/' : '/'.$request->get('r');

        return preg_match($route->getCompiled()->getRegex(), rawurldecode($path));
    }
}