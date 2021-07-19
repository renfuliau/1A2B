<?php
function errorResponse($errorCode, $errotMessage)
{
    echo json_encode(array(
        'errorCode' => $errorCode,
        'errotMessage' => $errotMessage
    ));
}

function successResponse($errorCode, $data)
{
    echo json_encode(array(
        'errorCode' => $errorCode,
        'data' => $data
    ));
}