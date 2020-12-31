<<<<<<< HEAD
<?php

namespace Core\PipeLine;

class PipeLine {
    protected $classes = [];
    protected $handleMethod = 'handle';

    public function create() {
        return clone $this;
    }

    public function setHandleMethod($method) {
        $this->handleMethod = $method;
        return $this;
    }

    public function setClass($class) {
        $this->classes = $class;
        return $this;
    }

    public function run(\Closure $initial) {
        $result = array_reduce(array_reverse($this->classes), function ($res, $currClass) {
            return function ($request) use ($res, $currClass) {
                return (new $currClass)->{$this->handleMethod}($request, $res);
            };
        }, $initial);

        return $result;
    }
}
=======
<?php

namespace Core\PipeLine;

class PipeLine {
    protected $classes = [];
    protected $handleMethod = 'handle';

    public function create() {
        return clone $this;
    }

    public function setHandleMethod($method) {
        $this->handleMethod = $method;
        return $this;
    }

    public function setClass($class) {
        $this->classes = $class;
        return $this;
    }

    public function run(\Closure $initial) {
        $result = array_reduce(array_reverse($this->classes), function ($res, $currClass) {
            return function ($request) use ($res, $currClass) {
                return (new $currClass)->{$this->handleMethod}($request, $res);
            };
        }, $initial);

        return $result;
    }
}
>>>>>>> b38d2450bf2b80154df4a6eab2b30c7c4c992a60
