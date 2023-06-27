<?php
class Database
{
    public $host;
    public $name;
    public $user;
    public $pass;
    public $instance;

    public function __construct($host, $name, $user, $pass)
    {
        $this->host = $host;
        $this->name = $name;
        $this->user = $user;
        $this->pass = $pass;

        $this->instance = new PDO("mysql:host=$this->host;dbname=$this->name", $this->user, $this->pass);
    }
}
?>