<?php
function shuffleFourNumber()
{
    $tenNumberArray = range(0,9);
    shuffle($tenNumberArray);
    return $fourNumberArray = array_slice($tenNumberArray, 0, 4);
}

// $answerArray = shuffleFourNumber();
// $answer = implode('', $answerArray);
$answer = 4231;
$answerArray = str_split($answer);
// echo 'Answer: ' . $answer;

$guess = 1234;
$guessArray = str_split($guess);
// print_r($guessArray);

$bulls = 0;
$cows = 0;

foreach ($guessArray as $key => $value) {
    if ($value == $answerArray[$key]) {
        $bulls++;
        continue;
    }
        
    if (in_array($value, $answerArray)) {
        $cows++;
    }
}

echo 'You guess: ' . $guess;
echo '<br>';
echo $bulls . 'A' . $cows . 'B';