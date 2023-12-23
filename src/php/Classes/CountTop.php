<?php

function getTopElementsWithHighestCount($conn, $tableName, $columnName)
{
    try {
        $query = "
            SELECT {$columnName}, COUNT(*) as count
            FROM {$tableName}
            WHERE {$columnName} IS NOT NULL
            GROUP BY {$columnName}
            ORDER BY count DESC
            LIMIT 5
        ";

        $query = "
            SELECT TRIM({$columnName}) as tag, COUNT(*) as count 
            FROM {$tableName}
            WHERE {$columnName} IS NOT NULL AND TRIM({$columnName}) <> '' 
            GROUP BY TRIM({$columnName}) ORDER BY count DESC 
            LIMIT 5;
        ";

        $result = $conn->query($query);

        if ($result === false) {
            throw new Exception('Query failed: ' . $conn->error);
        }

        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $rows;
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

?>