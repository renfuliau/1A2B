<?php
include $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

// create db connect
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die('連線失敗' . mysqli_connect_error());
}

function getHistory($conn)
{
    $sql = "SELECT play_times FROM history ORDER BY `play_times` ASC LIMIT 10";
    $result = mysqli_query($conn, $sql);
    
    $myarray = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $myarray[] = $row;
        }
        return json_encode($myarray);
    } else {
        return '尚無紀錄';
    }
}

function addHistory($times, $conn)
{
    $date = date('Y-m-d');
    $sql = "INSERT INTO history ( play_times,  created_at) 
        VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $times, $date);
    $stmt->execute();
}
