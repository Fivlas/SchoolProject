<?php
if (isset($_POST['username'])) {
    require_once('../Classes/db_connect.php');
    require_once('../Classes/QueryBuilder.php');
    require_once('../Classes/DataInsert.php');
    $conn = connectToDatabase();


    $username = $_POST['username'];
    $queryBuilder = new SQLQueryBuilder('users', $conn);
    $condition = "display_name = '$username'";
    $count = $queryBuilder->count($condition);

    if ($count > 0) {
        echo "Error: Username already exists.";
    } else {
        $userId = $_POST['id'];
        $updateData = ['display_name' => $username];
        $newUserName = strtolower($username);
        $newUserName = "@$newUserName";
        $updatedUserName = ['username' => $newUserName];
        $updateCondition = "id = '$userId'";        
        $queryBuilder->update($updateData, $updateCondition);
        $queryBuilder->update($updatedUserName, $updateCondition);

        echo "Username updated successfully.";
    }

    $conn->close();
}


?>