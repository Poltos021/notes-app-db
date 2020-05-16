<?php

class DB
{
    static public $connection = NULL;

    static public function connect() {

        $config = include 'config/db.php';
        $db = new PDO(
            'mysql:host='. $config['host']. ';dbname=' . $config['dbname'] . ';',
            $config['user'],
            $config['pass']
        );
        self::$connection = $db;
    }

    /**
     * возвращает подключение к БД
     * @return PDO
     */
    static public function get() {
        if (!self::$connection)
        {
            self::connect();
        }

        return self::$connection;
    }
}
