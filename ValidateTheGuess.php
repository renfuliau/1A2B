<?php
header('Content-Type: application/json; charset=UTF-8'); //設定資料類型為 json，編碼 utf-8

function shuffleFourNumber()
{
    $tenNumberArray = range(0, 9);
    shuffle($tenNumberArray);
    return $fourNumberArray = array_slice($tenNumberArray, 0, 4);
}

function parseGuess($guess, $answerArray)
{
    $guessArray = str_split($guess);
    // print_r($guessArray);

    $A = 0;
    $B = 0;

    foreach ($guessArray as $key => $value) {
        if ($value == $answerArray[$key]) {
            $A++;
            continue;
        }

        if (in_array($value, $answerArray)) {
            $B++;
        }
    }

    return array($A, $B);
}

if ($id == 1) {
    $answer = ShuffleFourNumber();
}
$guess = $_POST['guess'];
$regex = '/^(?!\d*?(\d)\d*?\1)\d{4}$/';

$id = $_POST['id'];
// echo $guess;
if (!preg_match($regex, $guess)) {
    // echo '2';
    
    echo json_encode(array(
        'guess' => $guess,
        'result' => 0
    ));
} else {
    // echo '3';
    echo json_encode(array(
        'guess' => $guess,
        'result' => 1
    ));
}
