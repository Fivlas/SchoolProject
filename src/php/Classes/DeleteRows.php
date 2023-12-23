<?php

class DeleteRows {
    private $db;

    public function __construct($conn) {
        $this->db = $conn;
    }

    public function deleteRow($tableName, $condition) {
        $query = "DELETE FROM $tableName WHERE $condition";
        $result = $this->db->query($query);

        if ($result) {
            echo "Row(s) deleted successfully.";
        } else {
            echo "Error deleting row(s): " . $this->db->error;
        }
    }
}

?>