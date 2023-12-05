<?php
session_start();
// Define variables to empty value
$nameErr = $emailErr = $NumberErr = $GenderErr = "";
$name = $email = $Number = $Gender = "";
//Input field Validation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Delete row
    if (isset($_POST['submit_delete']) && isset($_POST['delete_row'])) {
        $delete_row = $_POST['delete_row'];
        if (isset($_SESSION['dataHistory'][$delete_row])) {
            unset($_SESSION['dataHistory'][$delete_row]);
            // Reset the array keys to maintain continuity
            $_SESSION['dataHistory'] = array_values($_SESSION['dataHistory']);
        }
    }
    if (isset($_POST['clear_history'])) {
        // Clear the data history by unsetting the session variable
        unset($_SESSION['dataHistory']);
        // session_destroy();
    }
    //string Validation
    if (empty($_POST["name"])) {
        $nameErr = "Name is Required";
    } else {
        $name = inputData($_POST["name"]);
        //Check if name only cntains letters
        if (!preg_match("/^[a-zA-Z]*$/", $name)) {
            $nameErr = "Only letters and no numbers are allowed.";
        }
    }
    //number validation
    if (empty($_POST["Number"])) {
        $NumberErr = "Phone Number is required";
    } else {
        $Number = inputData($_POST["Number"]);
        // check if number contains only digits
        if (!preg_match("/^[0-9]*$/", $Number)) {
            $NumberErr = "Invalid phone number, please enter a valid one.";
        }
    }
    //Email validation
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = inputData($_POST["email"]);
        // Check for valid email format using regular expression
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }
    //Gender validation
    if (empty($_POST["Gender"])) {
        $GenderErr = "Gender is required";
    } else {
        $Gender = inputData($_POST["Gender"]);
    }
    // Not to add empty data in table.
    if (!(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["Number"]) || empty($_POST["Gender"]))) {
        if (!isset($_SESSION['dataHistory'])) {
            $_SESSION['dataHistory'] = array();
        }
        $_SESSION['dataHistory'][] = array('name' => $name, 'email' => $email, 'Number' => $Number, 'Gender' => $Gender);
    }
}
function inputData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!-- Html -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Get and post Method</title>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <style>
        /* body {
            background: #99CCFF;
        } */

        .error {
            color: red;
        }

       */

        .submit:hover {
            background: transparent;
            color: green;
            transition: 0.3s;
        }

        .submit {
            color: white;
            background-color: green;
            padding: 6px;
            border-radius: 5px;
            border: 1px solid green;
        }

        .btn:hover {
            background-color: transparent;
            color: red;
            transition: 0.3s;
        }
    </style>
</head>

<body>
        <!-- html -->
    <div class="container mt-5 p-3">
        <h1>Form Task</h1>
        <!-- <span class="error">Required Fields *</span> -->
        <br><br>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- Name: -->
            <label for="name"><b>Name: </b> <span class="error">*</span></label>
            <input type="text" id="name" name="name" class="form-control">
            <span class="error"><?= $nameErr ?></span>
            <br>
            <!-- E-mail: -->
            <label for="email"><b>E-Mail: </b><span class="error">*</span></label>
            <input type="email" id="email" name="email" class="form-control">
            <span class="error"><?= @$emailErr ?></span>
            <br>
            <!-- Phone Number -->
            <label for="email"><b>Phone Number: </b><span class="error">*</span></label>
            <input type="text" id="Number" name="Number" class="form-control">
            <span class="error"><?= @$NumberErr ?></span>
            <br>
            <!-- Gender-->
            <label for="Gender"><b>Gender: </b><span class="error">*</span></label>
            <br>
            <input type="radio" id="Male" name="Gender" value="Male">
            <label for="Male">Male </label>
            <input type="radio" id="Female" name="Gender" value="Female">
            <label for="Female">Female </label>
            <input type="radio" id="Others" name="Gender" value="Others">
            <label for="Others">Others </label>
            <br>
            <span class="error"><?= @$GenderErr ?></span>
            <br>
            <hr>
            <!-- Submit and Delete Data -->
            <input class="submit" type="submit" name="submit" value="Submit">
            <button type="submit" name="clear_history" class="btn btn-danger">Clear History</button>
        </form>
    </div>
    <!-- Output data in Tables-->
    <div class="container mt-5">
        <h1>Input Data</h1>
        <table class="table p-3 table-striped" style="width: 80%;">
            <!-- Headings -->
            <tr>
                <th>S.no</th>
                <th>Name</th>
                <th>E-Mail</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Delete</th>
            </tr>
            <!-- Data -->
            <?php
            if (isset($_SESSION['dataHistory'])) {
                $index = 1;
                foreach ($_SESSION['dataHistory'] as $id => $data) {
            ?>
                    <tr>
                        <td><?= $index++ ?></td>
                        <td><?= $data['name'] ?? null ?></td>
                        <td><?= $data['email'] ?? null ?></td>
                        <td><?= $data['Number'] ?? null ?></td>
                        <td><?= $data['Gender'] ?? null ?></td>
                        <td>
                            <a href="deleteForm.php?id=<?= $id ?>">Delete</a>
                            <a href="EditForm.php?id=<?= $id ?>">Edit normal</a>
                            <!-- with ajax -->
                            <!-- <a onclick="deleteUser('<?= $id ?>')">Delete</a>
                            <a onclick="edit('<?= $id ?>')">Edit</a> -->
                            <!-- <form method="POST">
                                <input type="hidden" name="delete_row" value="<?= $id ?>">
                                <button type="submit" name="submit_delete" class="btn btn-danger">Delete</button>
                            </form> -->
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </div>
    <script>
        function edit(id) {
            alert(id);
        }

        function deleteUser(id) {
            alert('Delete ' + id);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>