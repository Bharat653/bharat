<?php
session_start();

if(isset($_SESSION["data"])){
    unset($_SESSION["data-key"]);
    unset($_SESSION["data-key"]);
    $_SESSION["message"]= "you naccount delted";
}
header("location:loginform.php");
?>

