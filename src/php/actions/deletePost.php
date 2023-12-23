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

    $postId = $_GET['id'];
    $deleteRows->deleteRow('posts', "id=$postId");
    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
    echo $referer;
    if (strpos($referer, 'post.php') != false) {
        header("Location: ../../html/index.php");
    } else {
        header("Location: $referer");
    }
    $conn->close();
    exit();
}

?>