<?php
/**
 * Created by PhpStorm.
 * User: KeithDesktop
 * Date: 9/25/2017
 * Time: 10:00 PM
 */

namespace prodikl\Zapi;


class DatabaseConfig {
    public $host;
    public $port;
    public $database;
    public $username;
    public $password;
    public $driver;
    public $charset;
    public $collation;

    public static function empty(){
        return new static('', '', '', '', '');
    }

    public function __construct(
        string $host,
        int $port,
        string $database,
        string $username,
        string $password,
        string $driver = "mysql",
        string $charset = "utf8",
        string $collation = "utf8_unicode_ci"
    ) {
        $this->host = $host;
        $this->port = $port;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
        $this->driver = $driver;
        $this->charset = $charset;
        $this->collation = $collation;
    }
}