<?php
session_start();
$user = null;
$id = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (isset($_SESSION['dataHistory'])) {
        if(isset($_SESSION['dataHistory'][$id])){
            $user = $_SESSION['dataHistory'][$id];
        }
    }
}
if(!empty($user)){
    echo "<pre>";
    print_r($user);
}else{
    die('User not found');
}
// update
if(isset($_POST['update'])){
    $id = $_POST['id'] ?? null;
    if (isset($_SESSION['dataHistory'])) {
        if(isset($_SESSION['dataHistory'][$id])){
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'Number' => $_POST['Number'],
                'Gender' => 'Male',
            ];
            $_SESSION['dataHistory'][$id] = $data;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?=$id?>">
        Name : <input type="text" name="name" value="<?=$user['name'] ?? null ?>">
        Email : <input type="text" name="email" value="<?=$user['email'] ?? null ?>">
        Phone : <input type="text" name="Number" value="<?=$user['Number'] ?? null ?>">
        <button type="submit" name="update" > Update </button>
        <button><a href="Formtask.php?id=<?= $id ?>">Back to Form Page</a></button>
    </form>
</body>
</html>