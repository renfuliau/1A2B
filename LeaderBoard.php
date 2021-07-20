<?php
include $_SERVER['DOCUMENT_ROOT'] . '/1A2B/vconfig/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/1A2B/service/History.php';

print_r(getHistory($conn));