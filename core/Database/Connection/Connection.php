<<<<<<< HEAD
<?php
namespace Core\Database\Connection;

class Connection {
    protected $pdo;
    protected $tablePrefix;
    protected $config;

    public function __construct($pdo, $config)
    {
        $this->pdo = $pdo;
        $this->tablePrefix = $config['prefix'];
        $this->config = $config;
    }


}
=======
<?php
namespace Core\Database\Connection;

class Connection {
    protected $pdo;
    protected $tablePrefix;
    protected $config;

    public function __construct($pdo, $config)
    {
        $this->pdo = $pdo;
        $this->tablePrefix = $config['prefix'];
        $this->config = $config;
    }


}
>>>>>>> b38d2450bf2b80154df4a6eab2b30c7c4c992a60
