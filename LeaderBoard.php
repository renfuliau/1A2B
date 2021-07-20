<?php
include $_SERVER['DOCUMENT_ROOT'] . '/config/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/service/History.php';

print_r(getHistory($conn));