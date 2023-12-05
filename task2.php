<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    date_default_timezone_set('Asia/kolkata');
    $date = date('d-m-Y h:i:sa ');
    echo $date;
    exit;
}
?>
