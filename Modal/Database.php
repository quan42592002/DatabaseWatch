<?php

class Database
{
    public $conn = NULL;
    private $hostname = '127.0.0.1';
    private $dbName = 'db_dongho';
    private $user = 'root';
    private $port = 3306;
    private $password = '123456';

    // Hàm kết nối CSDL
    public function connect()
    {
        $this->conn = new mysqli($this->hostname, $this->user, $this->password, $this->dbName,$this->port);

        if ($this->conn->connect_error) {
            printf($this->conn->connect_error);
            exit();
        }
        $this->conn->set_charset("utf8");
    }
    // Hàm đóng kết nối CSDL
    public function closeDatabase()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
