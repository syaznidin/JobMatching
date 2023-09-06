<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

// Include your database connection file
include "dbConnect.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the input
    $user_id = $_SESSION["user_id"];
    $current_password = $_POST["current_password"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if the current password matches the one in the database
    // You should replace 'users' with the actual table name storing user information
    $query = "SELECT password FROM user WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row["password"];

        if ($current_password === $stored_password) {
            // Current password is correct, now update the password in the database
            $update_query = "UPDATE user SET password = '$new_password' WHERE user_id = '$user_id'";
            mysqli_query($conn, $update_query);

            // Redirect to a success page or display a success message
            header("Location: Account.php");
            exit();
        } else {
            $error_message = "Incorrect current password";
        }
    } else {
        $error_message = "User not found";
    }
}

// Your HTML form for changing password
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class='wrapper'>
    <h2>Change Password</h2>
    <?php
    if (isset($error_message)) {
        echo "<p style='color: red;'>$error_message</p>";
    }
    ?>
    <form method="post" action="">
        <label for="current_password">Current Password:</label>
        <input type="password" id="current_password" name="current_password" class="form-control" required><br>
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" class="form-control" required><br>
        <label for="confirm_password">Confirm New Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" class="form-control" required><br>
        <input type="submit" value="Change Password">
        <a href='Account.php'>Cancel</a>
    </form>
</div>
</body>
</html>
