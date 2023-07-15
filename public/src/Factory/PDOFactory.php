<?php

namespace App\Factory;

use App\Interfaces\Database;

class PDOFactory implements Database
{
    private $host;
    private $dbName;
    private $userName;
    private $password;

    public function __construct(string $host = "bwyvapukwzfpb3lz1d3x-mysql.services.clever-cloud.com", string $dbName = "bwyvapukwzfpb3lz1d3x", string $userName = "unlzmcspyvnf7pjs", string $password = "FFlvJSHjaWYJ2NwQaCto")
    {
        $this->host = $host;
        $this->dbName = $dbName;
        $this->userName = $userName;
        $this->password = $password;
    }

    public function getMySqlPDO(): \PDO
    {
        return new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbName, $this->userName, $this->password);
    }
}
