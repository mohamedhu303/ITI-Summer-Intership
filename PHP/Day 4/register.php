<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = trim($_POST['firstName']);
    $lname = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);


    $passHash = password_hash($password, PASSWORD_DEFAULT);


    $max = 15;
    $min = 8;
    $length = strlen($password);


    if (filter_var($email, FILTER_VALIDATE_EMAIL) && ($length >= $min && $length <= $max)) {
        $file = "data.txt";
        $emailExists = false;


        if (file_exists($file)) {
            $register = fopen($file, "r");
            while (($line = fgets($register)) !== false) {
                list($savedEmail) = explode(",", $line);
                if (trim($email) == trim($savedEmail)) {
                    $emailExists = true;
                    break;
                }
            }
            fclose($register);
        }

        if ($emailExists) {
            echo "Email already exists";
        } else {

            $register = fopen($file, "a");
            fwrite($register, "$email,$passHash\n");
            fclose($register);
            echo "Successfully registered";
        }
    } else {
        echo "Invalid email or password length. Password must be between 8 and 15 characters.";
    }
}
?>
