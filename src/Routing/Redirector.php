<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2019/9/14
 * Time: 10:24 PM
 */

namespace Larawe\Routing;

use Illuminate\Routing\Redirector as IlluminateRedirector;
use Illuminate\Support\Str;

class Redirector extends IlluminateRedirector
{
    /**
     * 为了避免生成的URI中出现两个(?) 而重写的函数
     * @param string $path
     * @param int $status
     * @param array $headers
     * @param null $secure
     * @return \Illuminate\Http\RedirectResponse
     */
    public function to($path, $status = 302, $headers = [], $secure = null)
    {
        if (substr_count($path, '?') > 1) {
            $path = Str::replaceLast('?', '&', $path);
        }
        return parent::to($path, $status, $headers, $secure);
    }
}