<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "user_crud";

// Create connection
$dns = new mysqli($hostname, $username, $password);

// Check connection
if ($dns->connect_error) {
    die("Error failed: " . $dns->connect_error);
}

// 2- Create db
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($dns->query($sql) === true) {
    echo "Database created successfully.<br>";
} else {
    echo "Database failed to create: " . $dns->error . "<br>";
}

// Select the database
$dns->select_db($dbname);

// 3- Create table user
$sql = "CREATE TABLE IF NOT EXISTS users (
        id INT NOT NULL AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255),
        PRIMARY KEY (id)
)";
if ($dns->query($sql) === true) {
    echo "Table created successfully.<br>";
} else {
    echo "Table failed to create: " . $dns->error . "<br>";
}


//4- Print All users in a page and add link after every row to edit,view and delete this row
if ($dns->connect_error) {
    die("Connection failed: " . $dns->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypt password

    $sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";
    
    if ($dns->query($sql) === TRUE) {
        echo "New user registered successfully.";
        header("Location: ./all_users.php");
    } else {
        echo "Error: " . $sql . "<br>" . $dns->error;
    }
}

if ($dns->connect_error) {
    die("Connection failed: " . $dns->connect_error);
}

$sql = "SELECT id, firstname, lastname, email FROM users";
$result = $dns->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table'>";
    echo "<thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr></thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["firstname"] . " " . $row["lastname"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>
            <a href='edit.php?id=".$row['id']."' class='btn btn-warning'>Edit</a>
            <a href='view.php?id=".$row['id']."' class='btn btn-info'>View</a>
            <a href='delete.php?id=".$row['id']."' class='btn btn-danger'>Delete</a>
            </td>";
        echo "</tr>";
    }
    echo "</tbody></table>";
} else {
    echo "0 results";
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_crud";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create user
if (isset($_POST['create'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO users (name, email, phone) VALUES ('$name', '$email', '$phone')";
    if ($conn->query($sql) === TRUE) {
        echo "User created successfully";
    } else {
        echo "Error creating user: " . $conn->error;
    }
}

// Read all users
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete.php?id=" . $row['id'] . "'>Delete</a> | <a href='view.php?id=" . $row['id'] . "'>View</a></td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

// Update user
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully";
    } else {
        echo "Error updating user: " . $conn->error;
    }
}

// Delete user
if (isset($_GET['delete'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}


// Close connection
$dns->close();
    
?>