<?php
session_start();

if (!isset($_GET['author']) && !isset($_GET['id']) && !isset($_SESSION['id']) && !isset($_SESSION['isAdmin'])) {
    exit();
}

if (($_GET['author'] == $_SESSION['id']) || $_SESSION['isAdmin'] == 1) {
    require_once('../Classes/db_connect.php');
    require_once('../Classes/QueryBuilder.php');
    require_once('../Classes/DeleteRows.php');
    
    $conn = connectToDatabase();
    $deleteRows = new DeleteRows($conn);

    $commentId = $_GET['id'];
    echo $commentId;
    $deleteRows->deleteRow('comments', "id=$commentId");
    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
    header("Location: $referer");
    $conn->close();
    exit();
}

?>