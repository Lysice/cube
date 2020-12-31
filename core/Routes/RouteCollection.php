<<<<<<< HEAD
<?php

namespace Core\Routes;

use Core\Request\RequestInterface;

class RouteCollection {
    protected $routes = [];
    protected $route_index = 0;

    public function getRoutes() {
        return $this->routes;
    }

    public $currGroup = [];

    public function group($attributes = [], \Closure  $callback) {
        $this->currGroup[] = $attributes;
        call_user_func($callback, $this);
        array_pop($this->currGroup);
    }

    protected function addSlash(&$uri) {
        return $uri[0] == '/' ? : $uri = '/' . $uri;
    }

    public function addRoute($method, $uri, $uses) {
        $prefix = ''; // 前缀
        $middleware = []; //中间件
        $namespace = '';
        $this->addSlash($uri);
        foreach ($this->currGroup as $group) {
            $prefix .= $group['prefix'] ?? false;
            if ($prefix) {
                $this->addSlash($prefix);
            }
            $middleware = $group['middleware'] ?? [];
            $namespace = $group['namespace'] ?? '';
        }

        $method = strtoupper($method);
        $uri = $prefix . $uri;
        $this->route_index = $method . $uri;
        $this->routes[$this->route_index] = [
            'method' => $method,
            'uri' => $uri,
            'action' => [
                'uses' => $uses,
                'middleware' => $middleware,
                'namespace' => $namespace
            ]
        ];
    }

    public function get($uri, $uses) {
        $this->addRoute('get', $uri, $uses);
        return $this;
    }

    public function post($uri, $uses) {
        $this->addRoute('post', $uri, $uses);
        return $this;
    }

    public function put($uri, $uses) {}
    public function delete($uri, $uses) {}
    public function middleware($class) {
        $this->routes[$this->route_index]['action']['middleware'][] = $class;
        return $this;
    }
    public function getCurrRoute() {
        $routes = $this->getRoutes();
        $route_index = $this->route_index;
        if (isset($routes[$route_index])) {
            return $routes[$route_index];
        }

        $route_index .= '/';
        if (isset($routes[$route_index])) {
            return $routes[$route_index];
        }
        return false;
    }

    public function dispatch(RequestInterface $request) {
        $method = $request->getMethod();
        $uri = $request->getUri();
        $this->route_index = $method . $uri;
        $route = $this->getCurrRoute();
        if (!$route) {
            return 404;
        }

        $routerDispatch = $route['action']['uses'];

        $middleware = $route['action']['middleware'] ?? [];
        return \App::getContainer()->get('pipeline')->create()->setClass(
            $middleware
        )->run($routerDispatch)($request);
    }
}
=======
<?php

namespace Core\Routes;

use Core\Request\RequestInterface;

class RouteCollection {
    protected $routes = [];
    protected $route_index = 0;

    public function getRoutes() {
        return $this->routes;
    }

    public $currGroup = [];

    public function group($attributes = [], \Closure  $callback) {
        $this->currGroup[] = $attributes;
        call_user_func($callback, $this);
        array_pop($this->currGroup);
    }

    protected function addSlash(&$uri) {
        return $uri[0] == '/' ? : $uri = '/' . $uri;
    }

    public function addRoute($method, $uri, $uses) {
        $prefix = ''; // 前缀
        $middleware = []; //中间件
        $namespace = '';
        $this->addSlash($uri);
        foreach ($this->currGroup as $group) {
            $prefix .= $group['prefix'] ?? false;
            if ($prefix) {
                $this->addSlash($prefix);
            }
            $middleware = $group['middleware'] ?? [];
            $namespace = $group['namespace'] ?? '';
        }

        $method = strtoupper($method);
        $uri = $prefix . $uri;
        $this->route_index = $method . $uri;
        $this->routes[$this->route_index] = [
            'method' => $method,
            'uri' => $uri,
            'action' => [
                'uses' => $uses,
                'middleware' => $middleware,
                'namespace' => $namespace
            ]
        ];
    }

    public function get($uri, $uses) {
        $this->addRoute('get', $uri, $uses);
        return $this;
    }

    public function post($uri, $uses) {
        $this->addRoute('post', $uri, $uses);
        return $this;
    }

    public function put($uri, $uses) {}
    public function delete($uri, $uses) {}
    public function middleware($class) {
        $this->routes[$this->route_index]['action']['middleware'][] = $class;
        return $this;
    }
    public function getCurrRoute() {
        $routes = $this->getRoutes();
        $route_index = $this->route_index;
        if (isset($routes[$route_index])) {
            return $routes[$route_index];
        }

        $route_index .= '/';
        if (isset($routes[$route_index])) {
            return $routes[$route_index];
        }
        return false;
    }

    public function dispatch(RequestInterface $request) {
        $method = $request->getMethod();
        $uri = $request->getUri();
        $this->route_index = $method . $uri;
        $route = $this->getCurrRoute();
        if (!$route) {
            return 404;
        }

        $routerDispatch = $route['action']['uses'];

        $middleware = $route['action']['middleware'] ?? [];
        return \App::getContainer()->get('pipeline')->create()->setClass(
            $middleware
        )->run($routerDispatch)($request);
    }
}
>>>>>>> b38d2450bf2b80154df4a6eab2b30c7c4c992a60
