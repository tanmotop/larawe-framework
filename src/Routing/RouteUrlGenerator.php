<?php


namespace Larawe\Routing;

use Illuminate\Routing\RouteUrlGenerator as LaravelRouteUrlGenerator;
use Illuminate\Support\Arr;

class RouteUrlGenerator extends LaravelRouteUrlGenerator
{
    protected function getRouteQueryString(array $parameters)
    {
        // First we will get all of the string parameters that are remaining after we
        // have replaced the route wildcards. We'll then build a query string from
        // these string parameters then use it as a starting point for the rest.
        if (count($parameters) === 0) {
            return '';
        }

        $query = Arr::query(
            $keyed = $this->getStringParameters($parameters)
        );

        // Lastly, if there are still parameters remaining, we will fetch the numeric
        // parameters that are in the array and add them to the query string or we
        // will make the initial query string if it wasn't started with strings.
        if (count($keyed) < count($parameters)) {
            $query .= '&'.implode(
                    '&', $this->getNumericParameters($parameters)
                );
        }

        return '&'.trim($query, '&');
    }
}