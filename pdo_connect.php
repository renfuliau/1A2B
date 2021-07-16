<?php

$dsn = "mysql:host=localhost;dbname=game";
$user = "admin";
$passwd = "Admin_123";

$pdo = new PDO($dsn, $user, $passwd);

$test =  $pdo->query("SELECT * FROM test");

$rows = $test->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($rows);
// print_r($rows);

// foreach($rows as $row) {

//     printf("{$row['id']} {$row['name']} {$row['times']}{$row['date']}\n");
// }