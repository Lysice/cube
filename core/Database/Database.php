<<<<<<< HEAD
<?php

namespace Core\Database;

use Core\Database\Connection\MySqlConnection;

class Database {
    protected $connections = [];

    protected function getDefaultConnection()
    {
        return config('database.default');
    }

    public function setDefaultConnection($name)
    {
        \App::getContainer()->get('config')->set('database.default', $name);
    }

    public function connection($name = null)
    {
        if (isset($this->connections[$name])) {
            return $this->connections[$name];
        }

        if (is_null($name)) {
            $name = $this->getDefaultConnection();
        }

        // 获取配置
        $config = config('database.connections.' . $name);
        $connectionClass = null;
        $drivers = [
            'mysql' => MySqlConnection::class
        ];

        $connectionClass = isset($drivers[$config['driver']]) ? $drivers[$config['driver']] : '';
        $dsn = sprintf('%s:host=%s;dbname=%s', $config['driver'], $config['host'], $config['dbname']);
        try {
            $pdo = new \PDO($dsn, $config['username'], $config['password'], $config['options']);
        } catch (\Exception $exception) {
            die($exception->getMessage());
        }

        return $this->connections[$name] = new $connectionClass($pdo, $config);
    }


    public function __call($method, $parameters)
    {
        return $this->connection()->$method(...$parameters);
    }
}
=======
<?php

namespace Core\Database;

use Core\Database\Connection\MySqlConnection;

class Database {
    protected $connections = [];

    protected function getDefaultConnection()
    {
        return config('database.default');
    }

    public function setDefaultConnection($name)
    {
        \App::getContainer()->get('config')->set('database.default', $name);
    }

    public function connection($name = null)
    {
        if (isset($this->connections[$name])) {
            return $this->connections[$name];
        }

        if (is_null($name)) {
            $name = $this->getDefaultConnection();
        }

        // 获取配置
        $config = config('database.connections.' . $name);
        $connectionClass = null;
        $drivers = [
            'mysql' => MySqlConnection::class
        ];

        $connectionClass = isset($drivers[$config['driver']]) ? $drivers[$config['driver']] : '';
        $dsn = sprintf('%s:host=%s;dbname=%s', $config['driver'], $config['host'], $config['dbname']);
        try {
            $pdo = new \PDO($dsn, $config['username'], $config['password'], $config['options']);
        } catch (\Exception $exception) {
            die($exception->getMessage());
        }

        return $this->connections[$name] = new $connectionClass($pdo, $config);
    }

    public function __call($method, $parameters)
    {
        return $this->connection()->$method(...$parameters);
    }
}
>>>>>>> b38d2450bf2b80154df4a6eab2b30c7c4c992a60
