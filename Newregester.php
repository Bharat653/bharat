<?php
session_start();
// if(isset($_SESSION['data'] )){
//     header('location:Newregester.php');
// }
// session_destroy();   

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the necessary fields are set and not empty
    if (
        isset($_POST['name']) && !empty($_POST['name']) &&
        isset($_POST['password']) && !empty($_POST['password']) &&
        isset($_POST['Number']) && !empty($_POST['Number']) &&
        isset($_POST['gender']) && !empty($_POST['gender'])
    ) {

        // Retrieve form data
        $name = $_POST['name'];
        $Number = $_POST['Number'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];

        // Output form data (for testing purposes)
        // echo "Name: " . $name . "<br>";
        // echo "Number: " . $Number . "<br>";
        // echo "Password: " . $password . "<br>";
        // echo "Gender: " . $gender . "<br>";

        // Check if $_SESSION['data'] is set
        if (!isset($_SESSION['data'])) {
            $_SESSION['data'] = array();
        }

        // Check for duplicate entry in the session (case-insensitive)
        $duplicateEntry = false;
        foreach ($_SESSION['data'] as $entry) {
            if (
                strtolower($entry['name']) === strtolower($name) &&
                strtolower($entry['number']) === strtolower($Number) &&
                strtolower($entry['password']) === strtolower($password) &&
                strtolower($entry['gender']) === strtolower($gender)
            ) {
                $duplicateEntry = true;
                break;
            }
        }

        // If it's not a duplicate entry, add it to the session array
        if (!$duplicateEntry) {
            $_SESSION['data'][] = [
                'name' => $name,
                'number' => $Number,
                'password' => $password,
                'gender' => $gender,
            ];
        } else {
            echo "Duplicate entry found. Data not added to session.";
        }
    } else {
        $_SESSION['message1'] = "Name, Number, Password, and Gender are required";
        // echo "Name, Number, Password, and Gender are required.<br>";
    }
}

?>
<!-- HTML -->
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
        <h1 style="text-align: center;">Create a new Registration</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="row my-3">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form method="post" id="formid">
                        <div class="card">   
                            <div class="card-body py-3" id="form">
                            <?php
                                if (!empty($_SESSION['message1'])) {
                                ?>
                                    <div class="alert alert-danger mt-2"><?= $_SESSION['message1'] ?></div>
                                <?php
                                // Clear the session message after displaying it
                                unset($_SESSION['message1']);
                                }
                                ?>
                                <div class="form-group">
                                    <label for="name"><b>Name: </b> <span class="error">*</span></label>
                                    <input type="text" id="name" name="name" class="form-control">
                                    <br>
                                </div>
                                <div class="form-group">
                                    <label for="password"><b>Password: </b><span class="error">*</span></label>
                                    <input type="password" id="password" name="password" class="form-control">
                                    <br>
                                </div>
                                <div class="form-group">
                                    <label for="Number"><b>Phone Number: </b><span class="error">*</span></label>
                                    <input type="text" id="Number" name="Number" class="form-control">
                                    <br>
                                </div>
                                <div class="form-group">
                                    <label for="gender"><b>Gender: </b><span class="error">*</span></label>
                                    <br>
                                    <input type="radio" id="Male" name="gender" value="Male">
                                    <label for="Male">Male</label>
                                    <input type="radio" id="Female" name="gender" value="Female">
                                    <label for="Female">Female</label>
                                    <input type="radio" id="Others" name="gender" value="Others">
                                    <label for="Others">Others</label>
                                    <br>
                                    <br>
                                    <hr>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" class="btn btn-dark btn-sm" name="submit" value="Register">
                                <a href="loginform.php" class="btn btn-dark btn-sm">Log IN</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>


    </html>