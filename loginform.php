<?php
session_start();
$isdataExists = false;
$_SESSION['message'] = '';

if (isset($_SESSION['data-key'])) {
    header('location:welcome.php');
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"] ?? null;
    $password = $_POST["password"] ?? null;

    if (!empty($name) && !empty($password)) {
        if (isset($_SESSION['login-data'])) {
            header("Location: welcome.php");
            exit();
        } else {
            if (isset($_SESSION['data'])) {
                foreach ($_SESSION['data'] as $key => $data) {
                    if ($data['name'] == $name && $data['password'] == $password) {
                        $_SESSION['login-data'] = $data;
                        $_SESSION['data-key'] = $key;
                        $isdataExists = true;
                        header("Location: welcome.php");
                        exit();
                    }
                }
            }
        }
    } else {
        $_SESSION['message'] = "Enter name and password";
        // header("Location: loginform.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <?php
    // $nameErr = $passwordErr = "";
    // $name = $password = "";

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     if (empty($_POST["name"])) {
    //       $nameErr = "Name is required";
    //     } else {
    //       $name = ($_POST["name"]);
    //     }

    //     if (empty($_POST["password"])) {
    //       $passwordErr = "password is required";
    //     } else {
    //       $password = ($_POST["password"]);
    //     }
    // }
    ?>

    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="formid">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form</h4>
                        </div>
                        <div class="card-body py-3" id="form">
                            <div class="form-group">
                                <label for="name"><b>Enter Name:</b> <span class="error">*</span></label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password"><b>Password:</b> <span class="error">*</span></label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                            <?php
                            if (!empty($_SESSION['message'])) {
                            ?>
                                <div class="alert alert-danger mt-2"><?= $_SESSION['message'] ?></div>
                            <?php
                            }
                            ?>
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Launch demo modal
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-dark btn-sm" name="submit" value="Log in" />
                            <a href="Newregester.php" class="btn btn-dark btn-sm">New Registration</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>