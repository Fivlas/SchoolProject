<?php
session_start();

require_once('../Classes/db_connect.php');
require_once('../Classes/QueryBuilder.php');
$conn = connectToDatabase();

if (isset($_POST['login']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }

    $uname = validate($_POST['login']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header('location: ../../html/login.php?error=Nazwa użytkownika jest wymagane');
        exit();
    } else if (empty($pass)) {
        header('location: ../../html/login.php?error=Hasło jest wymagane');
        exit();
    } else {
        if (strpos($uname, "@") === false) {
            $uname = "@".$uname;
        }

        $uname = strtolower($uname);

        $queryBuilder = new SQLQueryBuilder('users', $conn);
        $queryBuilder->addCondition('username', $uname);

        $data = $queryBuilder->executeQuery();
        $conn->close();
        if (count($data) == 1) {
            foreach ($data as $row) {
                $idDb = $row['id'];
                $usernameDb = $row['username'];
                $passwordDb = $row['password'];
                $isAdmin = $row['isAdmin'];
            }

            if ($usernameDb === $uname && password_verify($pass, $passwordDb)) {
                echo "Logged in!";
                $_SESSION['username'] = $usernameDb;
                $_SESSION['id'] = $idDb;
                $_SESSION['isAdmin'] = $isAdmin;

                header('location: ../../html/index.php');
                exit();
            } else {
                header('location: ../../html/login.php?error=Zła nazwa lub hasło');
                exit();
            }
        } else {
            header('location: ../../html/login.php?error=Zła nazwa lub hasło');
            exit();
        }
    }
} else {
    header('location: ../../html/login.php?error=Wpisz hasło i nazwę użytkownika');
    exit();
}
?>