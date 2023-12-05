<?php
class DataInserter
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insertData($tableName, $data)
    {
        if (empty($tableName) || !is_array($data) || empty($data)) {
            die("Invalid input parameters");
        }

        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        
        $query = "INSERT INTO $tableName ($columns) VALUES ($placeholders)";
        
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array_values($data));
            return true;
        } catch (PDOException $e) {
            die("Insert failed: " . $e->getMessage());
        }
    }
}
?>