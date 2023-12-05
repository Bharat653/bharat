<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $index = $_POST['index'] ?? '';
    if (isset($_SESSION['data'][$index])) {
        unset($_SESSION['data'][$index]); // Remove the data at the specified index
        // Optionally reindex the session array if needed
        $_SESSION['data'] = array_values($_SESSION['data']);
    }
}