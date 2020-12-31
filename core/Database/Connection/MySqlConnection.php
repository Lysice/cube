<<<<<<< HEAD
<?php


namespace Core\Database\Connection;


use Core\Database\Query\MySqlGrammar;
use Core\Database\Query\QueryBuilder;

class MySqlConnection extends Connection
{
    protected static $connection;

    public function getConnection()
    {
        return self::$connection;
    }

    public function select($sql, $bindings = [], $useReadPdo = true)
    {
        $statement = $this->pdo;
        $sth = $statement->prepare($sql);
        try {
            $sth->execute($bindings);
            return $sth->fetchAll();
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
    }


// 调用不存在的方法 调用一个新的查询构造器
    public function __call($method, $parameters)
    {
        // 返回QueryBuilder类
        return $this->newBuilder()->$method(...$parameters);
    }


// 创建新的查询器
    public function newBuilder()
    {
        return  new QueryBuilder($this, new MySqlGrammar());
    }
=======
<?php


namespace Core\Database\Connection;


use Core\Database\Query\MySqlGrammar;
use Core\Database\Query\QueryBuilder;

class MySqlConnection extends Connection
{
    protected static $connection;

    public function getConnection()
    {
        return self::$connection;
    }

    public function select($sql, $bindings = [], $useReadPdo = true)
    {
        $statement = $this->pdo;
        $sth = $statement->prepare($sql);
        try {
            $sth->execute($bindings);
            return $sth->fetchAll();
        } catch (\PDOException $exception) {
            echo $exception->getMessage();
        }
    }


// 调用不存在的方法 调用一个新的查询构造器
    public function __call($method, $parameters)
    {
        // 返回QueryBuilder类
        return $this->newBuilder()->$method(...$parameters);
    }


// 创建新的查询器
    public function newBuilder()
    {
        return  new QueryBuilder($this, new MySqlGrammar());
    }
>>>>>>> b38d2450bf2b80154df4a6eab2b30c7c4c992a60
}