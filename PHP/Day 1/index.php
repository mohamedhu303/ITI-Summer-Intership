<!-- Lap 1
———-
1- Install xamp (Apache - php - MySQLi ).
2- test that php is working.
3- create a php page with registration form.
4- submit form and print all values using php. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="./submit.php" method="POST">
        <div class="name">
            <div class="fname">
                <label for="fname">First Name</label><br>
                <input type="text" id="fname" name="fname" required><br>
            </div>
            
            <div class="lname">
                <label for="lname">Last Name</label><br>
                <input type="text" id="lname" name="lname" required><br>
            </div>
        </div>

        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="gender">Gender</label><br>
        <input type="radio" name="gender" id="male" value="Male">
        <label for="male">Male</label><br>
        <input type="radio" name="gender" id="female" value="Female">
        <label for="female">Female</label><br>
        
        <br>
        <label for="phone">Phone</label><br>
        <input type="tel" id="phone" name="phone" required><br>

        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" required><br>


        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>