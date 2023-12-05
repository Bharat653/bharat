<?php
session_start();
if (!isset($_SESSION['data-key']) && empty($_SESSION['data-key'])) {
    header('location:loginform.php');
}
// session_destroy();
if (isset($_FILES['image'])) {
    // echo"<pre>";
    // print_r($_FILES);
    // echo"</pre>";

    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];

    if (move_uploaded_file($file_tmp, "upload-images/" . $file_name)) {
        $_SESSION['images-file'] = "upload-images/" . $file_name;
        // echo"<pre>";
        // print_r($_SESSION['images-file']);
        // echo"</pre>";
        //     echo "successfully uploaded";
        // }else{
        //     echo "there are some error thats why we cant upload the image ";
    }
}
?>
<!DOCTYPE html>

<head>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <form method="post" id="formid" enctype="multipart/form-data">
            <div class="row my-3">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form method="post" id="formid">
                        <div class="card">
                            <div class="card-header">
                                <h4 style="color: black;">WELCOME</h4>
                            </div>
                            <div class="card-body py-3" id="form">
                                <div class="form-group">
                                    <?php if (isset($_SESSION['data-key'])) { ?>
                                        <!-- echo"<pre>";
                              print_r( $_SESSION['login_data']); -->
                                        <h3><?= $_SESSION['login-data']['name'] ?? ''; ?></h3>
                                        <p>name : <?= $_SESSION['login-data']['name'] ?? ''; ?></p>
                                        <p>phone number : <?= $_SESSION['login-data']['number'] ?? ''; ?></p>
                                        <p>gender : <?= $_SESSION['login-data']['gender'] ?? ''; ?></p>
                                        <img src="<?= $_SESSION['images-file'] ?? null; ?>" style="max-width: 100%; height: auto;">
                                        <!-- <a href="Loginform.php" class="btn btn-dark btn-sm">Log OUT</a> -->
                                        <!-- <h5>click on the button to go to the Login page</h5> -->
                                    <?php } else { ?>
                                        <p>Welcome in our world </p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <a href="Log-out.php" class="btn btn-dark btn-sm">Log OUT</a>

                                    <!-- <a href="delete.php" class="btn btn-dark btn-sm">Delete-data</a> -->
                                </div>
                                <!-- <form class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form> -->
                            </div>
                            <div class="card-footer">
                                <input type="file" name="image" /><br>
                                <input type="submit" />
                                </br>
                                <!-- <a href="delete-image.php" class="btn btn-dark btn-sm">Image delete</a> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>