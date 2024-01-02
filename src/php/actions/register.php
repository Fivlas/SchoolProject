<?php
session_start();


if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordAgain'])) {
    require_once('../Classes/db_connect.php');
    require_once('../Classes/QueryBuilder.php');
    require_once('../Classes/DataInsert.php');
    $conn = connectToDatabase();


    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordAgain = $_POST['passwordAgain'];

    if (isset($_POST['isAdult'])) {
        $isAdult = 1;
    } else {
        $isAdult = 0;
    }
    
    $queryBuilder = new SQLQueryBuilder('users', $conn);
    
    $buildedUsersname = str_replace(' ', '', "@".strtolower($username));

    echo $buildedUsersname;
    $condition = "username = '$buildedUsersname'";
    $count = $queryBuilder->count($condition);
    if ($password !== $passwordAgain) {
        header("Location: ../../html/login.php?registerError=Hasła się nie zgadzają");
    }
    if ($count > 0) {
        header("Location: ../../html/login.php?registerError=Podany użytkownik już istnieje");
    } else {
        $dataInserter = new DataInserter($conn);
        $dataToInsert = [
            'username' => $buildedUsersname,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'display_name' => $username,
            'avatar' => NULL,
            'isAdult' => $isAdult,
        ];
        $dataInserter->insertData('users', $dataToInsert);

        $queryBuilder = new SQLQueryBuilder("users", $conn);
        $queryBuilder->addCondition('username', $buildedUsersname);
        $data = $queryBuilder->executeQuery();

        if (!empty($data)) {
            foreach ($data as $key => $row) {
                $id = $row['id'];
                $isAdmin = $row['isAdmin'];
            }
            $_SESSION['username'] = $buildedUsersname;
            $_SESSION['id'] = $id;
            $_SESSION['isAdmin'] = $isAdmin;
            $_SESSION['isAdult'] = $isAdult;

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

                    $queryBuilder = new SQLQueryBuilder('users', $conn);
                    $updateData = ['avatar' => $fileName];
                    $updateCondition = "id = $id";        
                    $queryBuilder->update($updateData, $updateCondition);
                    $conn->close();
                } else {
                    header("Location: ../../html/login.php?registerError=Problem z dodaniem zdjęcia");
                }
            } else {
                header("Location: ../../html/login.php?registerError=Wybierz dobre zdjęcie");
            }

            header('location: ../../html/index.php');
        } else {
            header("Location: ../../html/login.php?registerError=Problem z dodaniem do bazy danych");
        }

    }

    $conn->close();
}


?>