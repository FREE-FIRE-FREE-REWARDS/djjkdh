<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'db_user');
define('DB_PASS', 'db_pass');
define('DB_NAME', 'db_name');
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
date_default_timezone_set("Asia/Kolkata");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
