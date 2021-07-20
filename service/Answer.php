<?php
include $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';

// create db connect
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die('連線失敗' . mysqli_connect_error());
}

function getAnswer($ip, $conn)
{
    $sql = "SELECT * FROM players WHERE ip_address = '" . $ip . "'";

    //找出 result 的語法
    $result = mysqli_query($conn, $sql);

    //新增一個 PHP 陣列，用來轉成 Json 格式
    $myarray = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $myarray[] = $row;
            return $myarray[0]['answer'];
        }
    } else {
        $answer = getNewAnswer();
        $date = date('Y-m-d');
        $sql = "INSERT INTO players (ip_address, play_times, answer, created_at, edited_at) 
        VALUES (?, 1, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $ip, $answer, $date, $date);
        $stmt->execute();
        return $answer;
    }
}

function getNewAnswer()
{
    $tenNumberArray = range(0, 9);
    shuffle($tenNumberArray);
    return implode('', array_slice($tenNumberArray, 0, 4));
}

function updateNewAnswer($ip, $conn)
{
    $answer = getNewAnswer();
    $update_sql = "UPDATE players SET answer = '" . $answer . "' WHERE ip_address = '" . $ip . "'";
    if ($conn->query($update_sql) === FALSE) {
        return "Error updating record: " . $conn->error;
    }
}
