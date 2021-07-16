<?php
    $servername = "localhost";
    $username = "admin";
    $password = "Admin_123";
    $dbname = "game";  

    //連線資料庫
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    //判斷連線是否失敗
    if (!$conn) {
        die('連線失敗' . mysqli_connect_error());
    }

    //選擇要撈取的資料， * 表示全部。
    $sql = 'SELECT * FROM test';

    //找出 result 的語法
    $result = mysqli_query($conn, $sql);

    //新增一個 PHP 陣列，用來轉成 Json 格式
    $myarray = array();

    //判斷資料表有沒有內容，如果是空的就不執行查詢
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // echo $row['Username'];
            $myarray[] = $row;
        }
        // print_r($myarray);
        // echo "<br>"; 
        //轉成 json 語法
        echo json_encode($myarray);
    }else{
        echo '沒有資料內容';
    }