<?php
/**
 * Created by PhpStorm.
 * User: surest
 * Date: 2019/3/10
 * Time: 17:49
 */

namespace surest\csql;


class Cpdo
{
    public $database = 'test';

    private $username = 'root';

    private $password = '';

    private $table;

    private $dns;

    private $host = '127.0.0.1';

    private $prot = '3306';

    private $query;

    public $link;

    public function __construct()
    {
        $this->loadParam();
        $this->link = new \PDO($this->dns, $this->username, $this->password);
    }



    public function loadParam()
    {

        $this->dns = "mysql:host={$this->host};dbname={$this->database}";

        return $this->dns;

    }


    public function setConfig()
    {
        $config = config('database.mysql');

        return $config;
    }

    public function getConfig()
    {
        return $this->config;
    }
}
