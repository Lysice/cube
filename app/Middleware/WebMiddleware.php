<<<<<<< HEAD
<?php

namespace App\Middleware;

/**
 * Class WebMiddleware
 * @package App\Middleware
 */
class WebMiddleware {
    public function handle($request, \Closure $next) {
        echo 'web 中间件';
        return $next($request);
    }
}
=======
<?php

namespace App\Middleware;

/**
 * Class WebMiddleware
 * @package App\Middleware
 */
class WebMiddleware {
    public function handle($request, \Closure $next) {
        echo 'web 中间件';
        return $next($request);
    }
}
>>>>>>> b38d2450bf2b80154df4a6eab2b30c7c4c992a60
