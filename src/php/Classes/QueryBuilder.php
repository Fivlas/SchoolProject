<?php
class SQLQueryBuilder {
    private $table;
    private $conditions = [];
    private $conn;

    public function __construct($table, $conn) {
        $this->table = $table;
        $this->conn = $conn;
    }

    public function addCondition($column, $value, $operator = '=') {
        $this->conditions[] = [
            'column' => $column,
            'value' => $value,
            'operator' => $operator
        ];
    }

    public function executeQuery() {
        $query = $this->buildQuery();
        $result = $this->conn->query($query);

        if ($result === false) {
            die("Error executing query: " . $this->conn->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    private function buildQuery() {
        $query = "SELECT * FROM {$this->table}";

        if (!empty($this->conditions)) {
            $query .= " WHERE ";
            $conditions = [];

            foreach ($this->conditions as $condition) {
                $conditions[] = "{$condition['column']} {$condition['operator']} '{$condition['value']}'";
            }

            $query .= implode(' AND ', $conditions);
        }

        return $query;
    }
}
?>