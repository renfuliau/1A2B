<?php
header('Content-Type: application/json; charset=UTF-8'); //設定資料類型為 json，編碼 utf-8

$regex = '/^(?!\d*?(\d)\d*?\1)\d{4}$/';
$guess = $_POST['guess'];
// echo $guess;
if (! preg_match($regex, $guess)) {
    // echo '2';
    echo json_encode(array(
        'guess' => $guess,
        'boolean' => 0
    )); 
} else {
    // echo '3';
    echo json_encode(array(
        'guess' => $guess,
        'boolean' => 1
    ));
}