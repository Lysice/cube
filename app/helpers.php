<<<<<<< HEAD
<?php
function hello() {
    return 'hello';
}
if (!function_exists('response')) {
    function response() {
        return App::getContainer()->get('response');
    }
}

function app($name = null) {
    if(empty($name)) {
        return App::getContainer();
    }
    return App::getContainer()->get($name);
}

function endView() {
    $time = microtime(true) - CUBE_START_TIME;
    $memory = memory_get_usage() - CUBE_START_MEMORY;
    echo "运行时间" . round($time * 1000, 2) . 'ms<br>';
    echo '消耗内存' . round($memory / 1024 / 1024, 2);
}

function config($key = null) {
    if ($key) {
        return App::getContainer()->get('config')->get($key);
    }

    return App::getContainer()->get('config');
=======
<?php
function hello() {
    return 'hello';
}
if (!function_exists('response')) {
    function response() {
        return App::getContainer()->get('response');
    }
}

function app($name = null) {
    if(empty($name)) {
        return App::getContainer();
    }
    return App::getContainer()->get($name);
}

function endView() {
    $time = microtime(true) - CUBE_START_TIME;
    $memory = memory_get_usage() - CUBE_START_MEMORY;
    echo "运行时间" . round($time * 1000, 2) . 'ms<br>';
    echo '消耗内存' . round($memory / 1024 / 1024, 2);
}

function config($key = null) {
    if ($key) {
        return App::getContainer()->get('config')->get($key);
    }

    return App::getContainer()->get('config');
>>>>>>> b38d2450bf2b80154df4a6eab2b30c7c4c992a60
}