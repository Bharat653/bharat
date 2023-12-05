<?php
session_start();

if (isset($_SESSION['images-file']) && file_exists($_SESSION['images-file'])) {
    unlink($_SESSION['images-file']);
    unset($_SESSION['images-file']);
    header("Location:welcome.php");
    exit();
} else {
    echo "File not found or cannot be deleted.";
}
?>
