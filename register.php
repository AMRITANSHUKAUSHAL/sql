<?php
include 'index.php';

// Insert data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO student (username, email, password) VALUES ('$username', '$email', '$password')";
    mysqli_query($con, $sql);
}

// Fetch data
$result = mysqli_query($con, "SELECT * FROM student");
?>

<h2>Student Registration Form</h2>
<form method="post">
    Username: <input type="text" name="username"><br><br>
    Email: <input type="text" name="email"><br><br>
    Password: <input type="text" name="password"><br><br>
    <input type="submit" value="Register">
</form>

<h2>Student Table</h2>
<table border="1" cellpadding="10">
    <tr>
        <th>ID</th><th>Username</th><th>Email</th><th>Password</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['username'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['password'] ?></td>
        </tr>
    <?php } ?>
</table>
