<?php
class SQLQueryBuilder {
    private $table;
    private $conditions = [];
    private $orderBy = [];
    private $limit;
    private $offset;
    private $conn;
    private $type;

    public function __construct($table, $conn) {
        $this->table = $table;
        $this->conn = $conn;
    }

    public function addCondition($column, $value, $operator = '=', $type = "AND") {
        $this->conditions[] = [
            'column' => $column,
            'value' => $value,
            'operator' => $operator
        ];

        $this->type = $type;
    }

    public function orderBy($column, $direction = 'ASC') {
        $this->orderBy[] = [
            'column' => $column,
            'direction' => strtoupper($direction)
        ];
    }

    public function setLimit($limit) {
        $this->limit = $limit;
    }

    public function setOffset($offset) {
        $this->offset = $offset;
    }

    public function executeQuery() {
        $query = $this->buildQuery();
        $result = $this->conn->query($query);

        if ($result === false) {
            die("Error executing query: " . $this->conn->error);
        }

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function limit($limit, $offset = null) {
        $this->limit = $limit;
        $this->offset = $offset;
    }

    public function count($customCondition = "") {
        $query = "SELECT COUNT(*) as total FROM {$this->table}";
    
        if (!empty($customCondition)) {
            $query .= " WHERE {$customCondition}";
        }
    
        $result = $this->conn->query($query);
    
        if ($result === false) {
            die("Error executing count query: " . $this->conn->error);
        }
    
        return $result->fetch_assoc()['total'];
    }

    public function update($data, $condition) {
        $query = "UPDATE {$this->table} SET ";

        $updates = [];
        foreach ($data as $column => $value) {
            $updates[] = "{$column} = '{$value}'";
        }

        $query .= implode(', ', $updates);

        if (!empty($condition)) {
            $query .= " WHERE {$condition}";
        }

        $result = $this->conn->query($query);

        if ($result === false) {
            die("Error executing update query: " . $this->conn->error);
        }

        return $result;
    }
    
    private function buildQuery() {
        $query = "SELECT * FROM {$this->table}";

        if (!empty($this->conditions)) {
            $query .= " WHERE ";
            $conditions = [];

            foreach ($this->conditions as $condition) {
                $conditions[] = "{$condition['column']} {$condition['operator']} '{$condition['value']}'";
            }

            $query .= implode(" $this->type ", $conditions);
        }

        if (!empty($this->orderBy)) {
            $orderBy = [];

            foreach ($this->orderBy as $order) {
                $orderBy[] = "{$order['column']} {$order['direction']}";
            }

            $query .= " ORDER BY " . implode(', ', $orderBy);
        }

        if (!is_null($this->limit)) {
            $query .= " LIMIT " . $this->limit;
        }

        if (!is_null($this->offset)) {
            $query .= " OFFSET " . $this->offset;
        }

        return $query;
    }

}
?>