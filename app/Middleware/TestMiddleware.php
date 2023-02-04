<?php

declare(strict_types=1);

namespace App\Middleware;

use App\Middleware\Contract\MiddlewareInterface;
use DcrSwoole\Log\LogBase;
use DcrSwoole\Request\Request;
use RuntimeException;

class TestMiddleware implements MiddlewareInterface
{
    public static string $name = 'test1';

    public function handle()
    {
        return static function ($request, $next) {
            $data = Request::instance()->get;
            LogBase::info(var_export($data, true));
//            throw new RuntimeException('test middlere error');
            return $next->handle($request);
        };
    }
}
