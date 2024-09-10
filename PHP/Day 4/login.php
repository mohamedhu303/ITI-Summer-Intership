<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    
    $file = "data.txt";
    $loginSuccess = false;

    if (file_exists($file)) {
        $login = fopen($file, "r");
        while (($line = fgets($login)) !== false) {
            list($saveEmail, $savePassword) = explode(",", $line);

            $saveEmail = trim($saveEmail);
            $savePassword = trim($savePassword);

            if ($email == $saveEmail && password_verify($password, $savePassword)) {
                $loginSuccess = true;
                break;
            }
        }
        fclose($login);
    }

    if ($loginSuccess) {
        header("Location: Home.html");
        exit();
    } else {
        echo "Invalid Email or Password";
    }
}


session_start(); 
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.html"); 
    exit();
}



session_start();
$_SESSION = array();
session_destroy();
header("Location: login.html");
exit();
?>


