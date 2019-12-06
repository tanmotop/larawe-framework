<?php


namespace Larawe\Foundation\Console;


class MiddlewareMakeCommand extends \Illuminate\Routing\Console\MiddlewareMakeCommand
{
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Middleware';
    }
}