<<<<<<< HEAD
<?php

namespace Core\Request;

interface RequestInterface {
    public function __construct($uri, $method, $headers);

    public static function create($uri, $method, $headers);

    public function getUri();

    public function getMethod();

    public function getHeader();
=======
<?php

namespace Core\Request;

interface RequestInterface {
    public function __construct($uri, $method, $headers);

    public static function create($uri, $method, $headers);

    public function getUri();

    public function getMethod();

    public function getHeader();
>>>>>>> b38d2450bf2b80154df4a6eab2b30c7c4c992a60
}