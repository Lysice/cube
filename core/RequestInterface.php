<?php

namespace Core\Request;

interface RequestInterface {
    public function __construct($uri, $method, $headers);

    public static function create($uri, $method, $headers);

    public function getUri();

    public function getMethod();

    public function getHeader();
}