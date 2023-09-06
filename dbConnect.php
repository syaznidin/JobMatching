<?php
if (!defined('db_user')) {
    define('db_user', 'root');
}
if (!defined('db_password')) {
    define('db_password', '');
}
if (!defined('db_host')) {
    define('db_host', 'localhost');
}
if (!defined('db_name')) {
    define('db_name', 'jrdb');
}

// function dbConnect() {
    $conn = mysqli_connect(db_host, db_user, db_password, db_name);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        return null;
    }
    return $conn;
// }
?>
