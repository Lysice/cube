<<<<<<< HEAD
<?php

namespace Core\Request;

class Request implements RequestInterface {

    protected $uri = '';
    protected $method = '';
    protected $headers = [];

    public function __construct($uri, $method, $headers)
    {
        $this->uri = $uri;
        $this->method = $method;
        $this->headers = $headers;
    }

    public static function create($uri, $method, $headers)
    {
        return new static($uri, $method, $headers);
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getHeader()
    {
        // TODO: Implement getHeader() method.
    }
=======
<?php

namespace Core\Request;

class Request implements RequestInterface {

    protected $uri = '';
    protected $method = '';
    protected $headers = [];

    public function __construct($uri, $method, $headers)
    {
        $this->uri = $uri;
        $this->method = $method;
        $this->headers = $headers;
    }

    public static function create($uri, $method, $headers)
    {
        return new static($uri, $method, $headers);
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getHeader()
    {
        // TODO: Implement getHeader() method.
    }
>>>>>>> b38d2450bf2b80154df4a6eab2b30c7c4c992a60
}