<?php

namespace Source\Core;

use \PDO;
use \PDOException;


class Connect
{
    private const SGBD = CONF_DB_DNS;
    private const HOST = CONF_DB_HOST;
    private const USERNAME = CONF_DB_USERNAME;
    private const PASSWORD = CONF_DB_PASSWORD;
    private const DBNAME = CONF_DB_NAME;
    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];

    public static $instance;

    final private function __construct()
    {
    }

    final private function __clone()
    {
    }

    public static function getInstance(): PDO
    {
        try {
            if (empty(self::$instance)) {
                self::$instance = new PDO(
                    self::SGBD . ':' . 'host=' . self::HOST . ';' . 'dbname=' . self::DBNAME,
                    self::USERNAME,
                    self::PASSWORD,
                    self::OPTIONS
                );
            }
            return self::$instance;
        } catch (PDOException $exception) {
            die("<p class='trigger error'>{$exception->getMessage()}</p>");
        }
    }
}