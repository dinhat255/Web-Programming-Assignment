<?php
class DB
{
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $port;
    public $con;

    public function __construct()
    {
        // Sử dụng config constants thay vì hardcoded
        $this->host = DB_HOST;
        $this->username = DB_USER;
        $this->password = DB_PASS;
        $this->dbname = DB_NAME;
        $this->port = DB_PORT;

        try {
            $this->con = new PDO(
                "mysql:host={$this->host};port={$this->port};dbname={$this->dbname};charset=utf8mb4",
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Query helper with prepared statements
    public function query($sql, $params = [])
    {
        $stmt = $this->con->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    // Fetch single row
    public function single($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch();
    }

    // Fetch all rows
    public function all($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll();
    }
}

