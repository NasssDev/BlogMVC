<?php

namespace App\Factory;

use App\Interfaces\Database;

class PDOFactory implements Database
{
    private $host;
    private $dbName;
    private $userName;
    private $password;

    public function __construct(string $host = "surus.db.elephantsql.com", string $dbName = "tbapbwul", string $userName = "tbapbwul", string $password = "E8sDwaqH6ne_DNFaltXnGP2WxW9Wn7Nl")
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->userName = $userName;
        $this->password = $password;
    }

    public function getMySqlPDO(): \PDO
    {
        return new \PDO("pgsql:host=" . $this->host . ";dbname=" . $this->dbName, $this->userName, $this->password);
    }
}
