<?php
//file db.php
class DB {
    private $host;
    private $user;
    private $password;
    private $db;
    private $conn;

    public function __construct($host, $user, $password, $db) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
    }

    public function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);
        if ($this->conn->connect_error != null) {
            throw new Exception("Connect to MySQL failed. Error:" . $this->conn->connect_error);
        }
    }

    public function query($sql) {
        $this->connect();
        
        $result = $this->conn->query($sql);

        // If executing query failed, thow Exception
        if (!$result) {
            // If insert failed, show error.
            throw new Exception("Failed to execute query. Error: " . $this->conn->error);
        }

        return $result;
    }

    //Close connection
    public function __destruct() {
        echo "Close connection";
        if ($this->conn) {
            $this->conn->close();
        }
    }
}
