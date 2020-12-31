<<<<<<< HEAD
<?php

define("CUBE_BASE_PATH", __DIR__);
define("CUBE_START_TIME", microtime(true));
define("CUBE_START_MEMORY", memory_get_usage());

class App implements Psr\Container\ContainerInterface {

    public $binding = [];
    private static $instance;
    protected $instances = [];
    private function __construct() {
        self::$instance = $this;
        $this->register();
        $this->boot();
    }

    public function get($abstract)
    {
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }

        $instance = $this->binding[$abstract]['concrete']($this);
        if ($this->binding[$abstract]['is_singleton']) {
            $this->instances[$abstract] = $instance;
        }

        return $instance;
    }

    public static function getContainer() {
        if (null == self::$instance) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function has($id)
    {
        // TODO: Implement has() method.
    }

    public function boot() {
        App::getContainer()->get('router')->group([
            'namespace' => 'App\\Controller',
            'middleware' => [
            \App\Middleware\WebMiddleware::class
            ],
        ], function ($router) {
            require_once CUBE_BASE_PATH . '/routes/web.php';
        });

        App::getContainer()->get('router')->group([
            'namespace' => 'App\Controller',
            'prefix' => 'api'
        ], function ($router) {
            require_once CUBE_BASE_PATH . '/routes/api.php';
        });

        App::getContainer()->get('config')->init();
    }

    public function register() {
        $registers = [
            'config' => \Core\Config\Config::class,
            'response' => \Core\Response\Response::class,
            'router' => \Core\Routes\RouteCollection::class,
            'pipeline' => \Core\PipeLine\PipeLine::class,
            'db' => \Core\Database\Database::class
        ];
        foreach ($registers as $name => $concrete) {
            $this->bind($name, $concrete, true);
        }
    }

    public function bind($abstract, $concrete, $is_singleton = false) {
        if (!$concrete instanceof \Closure) {
            $concrete = function ($app) use ($concrete) {
                return $app->build($concrete);
            };
        }

        $this->binding[$abstract] = compact('concrete', 'is_singleton');
    }

    private function getDependencies($parameters) {
        $dependencies = [];
        foreach ($parameters as $parameter) {
            if ($parameters->getClass()) {
                $dependencies[] = $this->get($parameters->getClass()->name);
            }
        }

        return $dependencies;
    }

    public function build($concrete) {
        $reflector = new ReflectionClass($concrete);
        $constructor = $reflector->getConstructor();
        if (is_null($constructor)) {
            return $reflector->newInstance();
        }

        $dependencies = $constructor->getParameters();
        $instances = $this->getDependencies($dependencies);
        return $reflector->newInstanceArgs($instances);
    }
}
=======
<?php

define("CUBE_BASE_PATH", __DIR__);
define("CUBE_START_TIME", microtime(true));
define("CUBE_START_MEMORY", memory_get_usage());

class App implements Psr\Container\ContainerInterface {

    public $binding = [];
    private static $instance;
    protected $instances = [];
    private function __construct() {
        self::$instance = $this;
        $this->register();
        $this->boot();
    }

    public function get($abstract)
    {
        if (isset($this->instances[$abstract])) {
            return $this->instances[$abstract];
        }

        $instance = $this->binding[$abstract]['concrete']($this);
        if ($this->binding[$abstract]['is_singleton']) {
            $this->instances[$abstract] = $instance;
        }

        return $instance;
    }

    public static function getContainer() {
        if (null == self::$instance) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    public function has($id)
    {
        // TODO: Implement has() method.
    }

    public function boot() {
        App::getContainer()->get('router')->group([
            'namespace' => 'App\\Controller',
            'middleware' => [
            \App\Middleware\WebMiddleware::class
            ],
        ], function ($router) {
            require_once CUBE_BASE_PATH . '/routes/web.php';
        });

        App::getContainer()->get('router')->group([
            'namespace' => 'App\Controller',
            'prefix' => 'api'
        ], function ($router) {
            require_once CUBE_BASE_PATH . '/routes/api.php';
        });

        App::getContainer()->get('config')->init();
    }

    public function register() {
        $registers = [
            'config' => \Core\Config\Config::class,
            'response' => \Core\Response\Response::class,
            'router' => \Core\Routes\RouteCollection::class,
            'pipeline' => \Core\PipeLine\PipeLine::class,
            'db' => \Core\Database\Database::class
        ];
        foreach ($registers as $name => $concrete) {
            $this->bind($name, $concrete, true);
        }
    }

    public function bind($abstract, $concrete, $is_singleton = false) {
        if (!$concrete instanceof \Closure) {
            $concrete = function ($app) use ($concrete) {
                return $app->build($concrete);
            };
        }

        $this->binding[$abstract] = compact('concrete', 'is_singleton');
    }

    private function getDependencies($parameters) {
        $dependencies = [];
        foreach ($parameters as $parameter) {
            if ($parameters->getClass()) {
                $dependencies[] = $this->get($parameters->getClass()->name);
            }
        }

        return $dependencies;
    }

    public function build($concrete) {
        $reflector = new ReflectionClass($concrete);
        $constructor = $reflector->getConstructor();
        if (is_null($constructor)) {
            return $reflector->newInstance();
        }

        $dependencies = $constructor->getParameters();
        $instances = $this->getDependencies($dependencies);
        return $reflector->newInstanceArgs($instances);
    }
}
>>>>>>> b38d2450bf2b80154df4a6eab2b30c7c4c992a60
