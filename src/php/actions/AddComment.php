<?php
    session_start();
    if (!isset($_SESSION["id"]) && !isset($_SESSION["username"])) {
        header('location: ../../html/login.php');
        exit();
    }

    if (isset($_POST['desc']) && isset($_POST['postId'])) {
        require_once('../Classes/db_connect.php');
        require_once('../Classes/DataInsert.php');
        $conn = connectToDatabase();
    
        $desc = $_POST['desc'];
    
        $dataInserter = new DataInserter($conn);
    
        $dataToInsert = [
            'description' => mysqli_real_escape_string($conn, $desc),
            'user_id' => $_SESSION['id'],
            'post_id' => $_POST['postId'],
        ];
    
        $dataInserter->insertData('comments', $dataToInsert);
    }

    $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
    header("Location: $referer");
    $conn->close();
    exit();
?>