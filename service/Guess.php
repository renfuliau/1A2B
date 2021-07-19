<?php
function validateGuess($guess)
{
    $regex = '/^(?!\d*?(\d)\d*?\1)\d{4}$/';

    if (!preg_match($regex, $guess)) {
        return 0;
    } else {
        return 1;
    }
}

function parseGuess($guess, $answer)
{
    $guessArray = str_split($guess);
    $answerArray = str_split($answer);

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

    return $A . 'A' . $B . 'B';
}
