<<<<<<< HEAD
<?php

namespace Core\Config;

class Config {
    protected $config = [];

    // 扫描config文件夹 加入配置
    public function init()
    {
        foreach(glob(CUBE_BASE_PATH . '/config/*.php') as $file) {
            $key = str_replace('.php', '', basename($file));
            $this->config[$key] = require_once $file;
        }
    }

    public function set($key, $val)
    {
        $keys = explode('.', $key);
        $newConfig = &$this->config;
        foreach ($keys as $key) {
            $newConfig = &$newConfig[$key];
        }
        $newConfig = $val;
    }

    public function get($key) {
        $keys = explode('.', $key);
        $config = $this->config;
        foreach ($keys as $key) {
            $config = $config[$key];
        }

        return $config;
    }

=======
<?php

namespace Core\Config;

class Config {
    protected $config = [];

    // 扫描config文件夹 加入配置
    public function init()
    {
        foreach(glob(CUBE_BASE_PATH . '/config/*.php') as $file) {
            $key = str_replace('.php', '', basename($file));
            $this->config[$key] = require_once $file;
        }
    }

    public function set($key, $val)
    {
        $keys = explode('.', $key);
        $newConfig = &$this->config;
        foreach ($keys as $key) {
            $newConfig = &$newConfig[$key];
        }
        $newConfig = $val;
    }

    public function get($key) {
        $keys = explode('.', $key);
        $config = $this->config;
        foreach ($keys as $key) {
            $config = $config[$key];
        }

        return $config;
    }

>>>>>>> b38d2450bf2b80154df4a6eab2b30c7c4c992a60
}