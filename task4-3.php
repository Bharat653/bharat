<?php
session_start();
// session_destroy();    
    if (isset($_SESSION['data'])) {
    echo '<script>var userData = ' . json_encode($_SESSION['data']) . ';</script>';
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
        <div class="row my-3">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form method="post" id="formid">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form</h4>
                        </div>
                        <div class="card-body py-3" id="form">
                            <div class="form-group">
                                <label>Enter name</label>
                                <input type="text" id="name" name="name" placeholder="Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone num</label>
                                <input type="number" id="number" name="number" placeholder="Number" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" id="done" value="Store" class="btn btn-dark btn-sm" name="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Phone no</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="output">
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            updateTable();
            $("#formid").submit(function(event) {
                event.preventDefault();
                var editID = $('[name="edit_id"]').val();
                let submition = $("#done").val();
                $.ajax({
                    type: "post",
                    url: "task4-5.php",
                    data: {
                        name: $("#name").val(),
                        number: $("#number").val(),
                        id: editID,
                        action: submition,
                    },
                    success: function(response) {
                        $('#formid')[0].reset();
                        // Refresh the table after adding data

                        updateTable();
                    }
                });
            });

            function updateTable() {
                $.ajax({
                    type: "get",
                    url: "task4-4.php",
                    success: function(response) {
                        $("#output").html(response);
                    }
                });

            }

            // function deletetable(deleteID) {


            //     console.log(deleteID);
            // }

            $(document).on("click", ".delete-btn", function() {
                var deleteId = $(this).attr('index');
                var rowToDelete = $(this).closest('tr');
                console.log("deleteId");
                $.ajax({
                    type: "post",
                    url: "task4-5.php",
                    data: {
                        id: deleteId,
                        action: 'delete',
                    },
                    success: function(response) {
                        updateTable();
                    }
                });
            });
            $(document).on("click", ".edit-btn", function() {
                var editId = $(this).attr('index');
                var userData = userData[editId];
                // console.log(userData);
                $("#name").val(userData.name);
                $("#number").val(userData.number);
                // Change the form submit button to an "Update" button
                $("#done").val('Update');
                
                // Store the user's index in a hidden field for reference during update
                $("#formid").append('<input type="hidden" name="edit_id" value="' + editId + '">');
            });
      
        });
    </script>
</body>

</html>

<!-- INSERT INTO `users` (`id`, `name`, `email`, `phone`, `gender`, `password`, `date`) VALUES (NULL, 'partap', 'partap@gmail.com', '9876543210', 'male', 'p', current_timestamp()); -->
