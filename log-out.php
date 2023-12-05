<?php
session_start();

if(isset($_SESSION["data"])){
    unset($_SESSION['login-data']);
    unset($_SESSION['data-key']);
    // unset($_SESSION['login-data']);
    $_SESSION["message"] = 'your acc deleted';
}
header("location:Loginform.php");
?>
<?php
// session_start();

if (isset($_SESSION['images-file']) && file_exists($_SESSION['images-file'])) {
    unlink($_SESSION['images-file']);
    unset($_SESSION['images-file']);
    header("Location:loginform.php");
    exit();
} else {
    echo "File not found or cannot be deleted.";
}
?>