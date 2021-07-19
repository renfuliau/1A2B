<?php
include $_SERVER['DOCUMENT_ROOT'] . '/service/Answer.php';
include $_SERVER['DOCUMENT_ROOT'] . '/service/Guess.php';
include $_SERVER['DOCUMENT_ROOT'] . '/service/Response.php';

// 設定資料類型為 json，編碼 utf-8
header('Content-Type: application/json; charset=UTF-8'); 

// 驗證傳入的答案是否符合格式
$times = $_POST['times'];
$guess = $_POST['guess'];
$validate = validateGuess($guess);

// 如果格式錯誤，錯誤回應
if ($validate == 0) {
    return errorResponse(99, '請輸入不重複的4位數字');
}

// 取得 client ip
if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
    $ip = $_SERVER["HTTP_CLIENT_IP"];
} elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
} else {
    $ip = $_SERVER["REMOTE_ADDR"];
}

// 取得解答
$answer = getAnswer($ip, $conn);

// 分析結果
$parse_result = parseGuess($guess, $answer);

// 如果答對, 重設解答
if ($parse_result == '4A0B') {
    updateNewAnswer($ip, $conn);
}

// 成功回應
$response_data = [
    'times' => $times,
    'guess' => $guess,
    'parse_result' => $parse_result,
];
successResponse(0, $response_data);

