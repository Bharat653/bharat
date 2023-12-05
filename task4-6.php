<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['index'])) {
    $index = $_POST['index'];
    
    if (isset($_SESSION['data'][$index])) {
        unset($_SESSION['data'][$index]);
    }
}
?>
