<?php 
session_start();
?>
<html>
<head>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- css -->
    <!-- <link rel="stylesheet" href=" sform.css"> -->
</head>
<body>
<div class="container-fluid">
  <div class="row my-3">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form  method="post" id="formid">
            <div class="card">
                <div class="card-header">
                    <h4>Form</h4>
                </div>
                <div class="card-body py-3">
                    <div class="form-group">
                        <label> Enter name</label>
                        <input type="text" id="name" name="name" placeholder="Name" class="form-control">
                        
                    </div>
                    <div class="form-group">
                        <label> Phone num</label>
                        <input type="number"  id="number" name="number" placeholder="Number" class="form-control">
                        
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" id="done" class="btn btn-dark btn-sm" name="submit">
                </div>
            </div>
        </form>
    </div>
 
    <body>
    <div id="output">
    <table class="table">
          <tbody>
              <tr>
                  <th>Name</th>
                  <th>Phone no</th>
                  <th>Date</th>
              </tr>
              <tr>
                  <td><?=  $_SESSION["name"] ?></td>
                  <td> <?= $_SESSION["number"] ?></td>
                  <td> <?= date('Y-m-d') ?></td>
              </tr>

          </tbody>
      </table>
           
    </div>
    <script>
        $(document).ready(function () {
            $("#formid").submit(function () {
                event.preventDefault();
                $.ajax({
                    type: "post",
                    url: "task4-2.php",
                    data: {
                        name: $("#name").val(),
                        number: $("#number").val(),
                    },
                    success: function (response) {
                        $("#output").html(response);
                    }
                    
                });
            })
        })
    </script>
</body>
</html>