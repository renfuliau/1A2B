<?php

// 設定資料類型為 json，編碼 utf-8
header('Content-Type: application/json; charset=UTF-8'); 

if ($_SERVER['REQUEST_METHOD'] == "POST") { //如果是 POST 請求
    $guess = $_POST["guess"]; //取得 guess POST 值
    if ($guess != null) { //如果 guess 有填寫
        //回傳 guess  json 資料
        echo json_encode(array(
            'guess' => $guess
        ));
    } else {
        //回傳 errorMsg json 資料
        echo json_encode(array(
            'errorMsg' => '資料未輸入完全！'
        ));
    }
} else {
    //回傳 errorMsg json 資料
    echo json_encode(array(
        'errorMsg' => '請求無效，只允許 POST 方式訪問！'
    ));
}