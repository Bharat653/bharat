<?php
session_start();

if (isset($_GET['index'])) {
    $index = $_GET['index'];
    
    if (isset($_POST['submit'])) {
        $newName = $_POST['name'];
        $newNumber = $_POST['number'];
        
        if (isset($_SESSION['data']) && isset($_SESSION['data'][$index])) {
            $_SESSION['data'][$index]['name'] = $newName;
            $_SESSION['data'][$index]['number'] = $newNumber;
        }

        header("Location: index.php"); // Redirect back to the main page
    }
} else {
    // Handle an invalid index or other errors here
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>
    <?php
    // if (isset($_GET['index'])) {
    //     $index = $_GET['index'];
    //     $data = isset($_SESSION['data'][$index]) ? $_SESSION['data'][$index] : null;
        
    //     if ($data) {
    //         echo '<form method="post">';
    //         echo '<label for="name">Name:</label>';
    //         echo '<input type="text" name="name" id="name" value="' . $data['name'] . '" required>';
    //         echo '<br>';
    //         echo '<label for="number">Number:</label>';
    //         echo '<input type="text" name="number" id="number" value="' . $data['number'] . '" required>';
    //         echo '<br>';
    //         echo '<button type="submit" name="submit">Save Changes</button>';
    //         echo '</form>';
    //     } else {
    //         echo 'Data not found.';
    //     }
    // }
    ?>
</body>
</html>
