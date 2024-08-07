<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "@Vmn_6887!7886";
    private $dbname = "solekulture_commerce"; 
    private $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function close() {
        if ($this->conn) {
            $this->conn->close();
        }
    }

    public function query($sql) {
        $result = $this->conn->query($sql);
        if ($this->conn->error) {
            die("Query failed: " . $this->conn->error);
        }
        return $result;
    }

    public function prepare($sql) {
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: " . $this->conn->error);
        }
        return $stmt;
    }

    public function execute($stmt, $params) {
        $types = str_repeat("s", count($params));
        $stmt->bind_param($types, ...$params);

        if (!$stmt->execute()) {
            die("Execute failed: " . $stmt->error);
        }

        return $stmt->get_result();
    }

    public function fetchAll($sql, $params = []) {
        $stmt = $this->prepare($sql);
        if ($params) {
            $result = $this->execute($stmt, $params);
        } else {
            $stmt->execute();
            $result = $stmt->get_result();
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchOne($sql, $params = []) {
        $stmt = $this->prepare($sql);
        if ($params) {
            $result = $this->execute($stmt, $params);
        } else {
            $stmt->execute();
            $result = $stmt->get_result();
        }
        return $result->fetch_assoc();
    }

    public function insert($sql, $params) {
        $stmt = $this->prepare($sql);
        $this->execute($stmt, $params);
        return $this->conn->insert_id;
    }

    public function update($sql, $params) {
        $stmt = $this->prepare($sql);
        $this->execute($stmt, $params);
        return $stmt->affected_rows;
    }

    public function delete($sql, $params) {
        $stmt = $this->prepare($sql);
        $this->execute($stmt, $params);
        return $stmt->affected_rows;
    }

    public function escapeString($str) {
        return $this->conn->real_escape_string($str);
    }

    public function beginTransaction() {
        $this->conn->begin_transaction();
    }

    public function commit() {
        $this->conn->commit();
    }

    public function rollback() {
        $this->conn->rollback();
    }
}
?>
