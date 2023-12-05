<?php
session_start();
// session_destroy();
/*
1/11/23.
append new form data using creds and multiple sessions.
*/
?>
<html>

<head>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- css -->
    <link rel="stylesheet" href="sform.css">
</head>

<body>
    <div class="container-fluid">
        <span class="bg-danger text-center" id="warning_id"></span>
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
                            <input type="submit" id="done" class="btn btn-dark btn-sm" name="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="m-2">
        <table class="table mt-3 ">
            <thead class="text-white bg-secondary">
                <th>No.</th>
                <th>Name</th>
                <th>Number</th>
                <th>Date</th>
                <!-- <th>Action by</th> -->
                <th>Edit</th>
                <th>Delete</th>
            </thead>
            <tbody id="list">
            </tbody>
        </table>
    </div>
    <script>
        // show
        function list() {
            $.ajax({
                // url to send data
                url: "form3.php",
                type: "post",
                data: {
                    action: 'show_data',
                },
                success: function(res) {
                    $('#list').html(res);
                }
            });
        }
        // to call for first time
        list();
        // show
        // store function will excecute on submit
        function store() {
            $.ajax({
                url: "form3.php",
                type: "post",
                data: {
                    name: $("#name").val(),
                    number: $("#number").val(),
                    // actionby: $("#actionby").val(),
                    action: 'store_data',
                },
                // calling list to show data after new data.
                success: function(res) {
                    if (res) {
                        $('#warning_id').text(res);
                    } else {
                        list();
                    }
                }
            });
        }
        //
        function delete_row(del_val) {
            $.ajax({
                url: "form3.php",
                type: "POST",
                data: {
                    action: 'delete_row',
                    del_index: del_val,
                },
                success: function(res) {
                    list();
                }
            })
        }
        // submit
        $(document).ready(function() {
            $("#formid").submit(function(event) {
                event.preventDefault();
                store();
            })
        })
        // edit
        $(document).on("click", "#edit", function() {
            // console.log('clicked');
            let val = $(this).val();
            console.log(val);
        });
        // delete
        $(document).on("click", "#delete", function() {
            let del_val = $(this).val();
            // delete_row();
            console.log(del_val);
            delete_row(del_val);
        });
    </script>
</body>

</html>
<!--action -->
<!-- <label for="actionby">Action by</label>
<input class="form-control" name="actionby" type="text" id="actionby"> -->
<!-- submit -->