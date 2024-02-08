<?
class DbManager
{
    public $login = "root";
    public $password = "";
    public $host = "localhost";
    public $databaseName = "albums_db";
    public $mysqli;
    public function __construct()
    {
        $this->mysqli = new mysqli($this->host, $this->login, $this->password, $this->databaseName);
    }
}