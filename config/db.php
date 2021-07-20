<?php
$servername = "localhost";
$username = "admin";
$password = "Admin_123";
$dbname = "game";

// create db connect
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die('連線失敗' . mysqli_connect_error());
}
