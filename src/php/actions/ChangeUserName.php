<?php
session_start();
if (!isset($_SESSION["id"]) && !isset($_SESSION["username"])) {
    header('location: ../../html/login.php');
    exit();
}
require_once('../Classes/db_connect.php');
require_once('../Classes/QueryBuilder.php');
require_once('../Classes/DataInsert.php');
$conn = connectToDatabase();

$id = $_SESSION["id"];

    if (isset($_POST['username'])) {
        if (!empty($_POST['username'])) {
            $username = $_POST['username'];
            $queryBuilder = new SQLQueryBuilder('users', $conn);
            $condition = "display_name = '$username'";
            $count = $queryBuilder->count($condition);

            if ($count > 0) {
                header('location: ../../html/profil.php?error=podany użytkownik już istnieje');
                exit();
            } else {
                $updateData = ['display_name' => $username];
                $newUserName = strtolower($username);
                $newUserName = "@$newUserName";
                $updatedUserName = ['username' => $newUserName];
                $updateCondition = "id = $id";        
                $queryBuilder->update($updateData, $updateCondition);
                $queryBuilder->update($updatedUserName, $updateCondition);

                $_SESSION['username'] = $newUserName;
            }
        }
    }

    if (isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == UPLOAD_ERR_OK) {
        $uploadDir = "../uploads/";

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $uploadFile = $uploadDir . uniqid() . '_' . basename($_FILES["avatar"]["name"]);

        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $uploadFile)) {

            $fileName = basename($uploadFile);
            $fileName = $conn->real_escape_string($fileName);

            $queryBuilder = new SQLQueryBuilder('users', $conn);
            $updateData = ['avatar' => $fileName];
            $updateCondition = "id = $id";        
            $queryBuilder->update($updateData, $updateCondition);
            $conn->close();
        } else {
            header("Location: ../../html/profil.php?error=Problem z dodaniem zdjęcia");
            exit();
        }
    }
    
    header("Location: ../../html/profil.php");
    
    $conn->close();
    exit();


?>