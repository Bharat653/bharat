
<?php
if ($_SERVER['REQUEST_METHOD']== 'POST'){
    require  'connection.php';
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
    <form action="index.php" method="post">
        <div class="container-fluid">
            <div class="row my-3">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form method="post" id="formid">
                        <div class="card">
                            <div class="card-header">
                                <h4>Login form</h4>
                            </div>
                            <div class="card-body py-3" id="form">
                                <div class="form-group">
                                    <label>Enter name</label>
                                    <input type="text" id="name" name="name" placeholder="Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Enter the password</label>
                                    <input type="password" id="password" name="password" placeholder="password" class="form-control">
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" id="done" value="Log in" class="btn btn-dark btn-sm" name="submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
</body>