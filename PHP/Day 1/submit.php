<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit</title>
    <link rel="stylesheet" href="style.css">
    <style>

    </style>
</head>
<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $email = htmlspecialchars($_POST['email']);
    $gender = htmlspecialchars($_POST['gender']);
    $phone = htmlspecialchars($_POST['phone']);
    $password = htmlspecialchars($_POST['password']);
    
    // Hashing Password
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    echo "<h3>First name: <span>$fname</span></h3><br><br>";
    echo "<h3>Last name : <span>$lname</span></h3><br><br>";
    echo "<h3>Gender: <span>$gender</span></h3><br><br>";
    echo "<h3>Email: <span>$email</span></h3><br><br>";
    echo "<h3>Phone: <span>$phone</span></h3><br><br>";
    echo "<h3>Password: <span>$hashedPassword</span></h3><br><br>";
}
else{
    echo "<h1>NO DATA SUBMITTED</h1>";
}
?>
    <a href="./index.php"><button type="button" >Back</button></a>
</body> 
</html>