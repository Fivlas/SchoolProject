<?php
    session_start();
    if (!isset($_SESSION["id"]) && !isset($_SESSION["username"])) {
        header('location: ../../html/login.php');
        exit();
    }
    require_once('../Classes/db_connect.php');
    require_once('../Classes/DataInsert.php');
    $conn = connectToDatabase();

    if (isset($_POST['desc']) && isset($_POST['title'])) {
        $desc = $_POST['desc'];
        $title = $_POST['title'];
        $tag = $_POST['tag'];
    
        $tag = str_replace("#", "", $tag);
        $dataInserter = new DataInserter($conn);
    
        if (isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] == UPLOAD_ERR_OK) {
            $uploadDir = "../uploads/";
    
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
    
            $trimSpaces = str_replace(' ', '', basename($_FILES["avatar"]["name"]));
            $uploadFile = $uploadDir . uniqid() . '_' . $trimSpaces;
    
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $uploadFile)) {
    
                $fileName = basename($uploadFile);
                $fileName = $conn->real_escape_string($fileName);
    
            }
        }

        if (empty($fileName)) {
            $fileName = NULL;
        }

        $dataToInsert = [
            'title' => $title,
            'description' => mysqli_real_escape_string($conn, $desc),
            'tag' => $tag,
            'user_id' => $_SESSION['id'],
            'img' => $fileName,
        ];
    
        $dataInserter->insertData('posts', $dataToInsert);
        header('location: ../../html/index.php');
        $conn->close();
    }
?>