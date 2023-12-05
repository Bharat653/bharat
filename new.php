<?php 
    // $x=20;
    // $y=30;
    // $y=$x+$y;
    // echo $y;
//      $x=2;
//      for($i=1;$i<=10;$i++)
// {
//     $product= $x*$i;
//     echo "$x*$i=$product"  ;
//     echo "<br>";
// }
// $abc=1;
//  if(isset($abc)){
//     echo "true";
//  }
//  else{
//     echo "abc is not exist";
//  }

if(isset($_POST["submit"]))
   {
    $x=$_POST['x'];

    // define('GAR' ,1);
    // define('abc' ,1);
    // echo abc;
    // echo GAR;
    for ($i=1;$i<=10;$i++)
    {
      echo "$x*$i=$product"  ;
      echo "</br>";
    }
}
   
?> 
<html>
<form   method="post">
    <input type="number" name="x" placeholder="number" >
    <input type="submit" value="get table" name="submit" placeholder="number" >
    </form>
</html>








function deleteRow(index) {
    $.ajax({
        type: "post",
        url: "task4-6.php", 
        data: { index: index },
        success: function (response) {
            listView();
        }
    });
}

function editRow(index) {
    // Implement the logic to edit the row here, e.g., populate the form fields for editing.
}
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $number = $_POST['number'] ?? '';

    $entry = array(
        'name' => $name,
        'number' => $number,
        'date' => date('Y-m-d'),
    );

    if (!isset($_SESSION['data'])) {
        $_SESSION['data'] = [];
    }

    if (isset($_POST['action']) && $_POST['action'] === 'edit') {
        $index = $_POST['editIndex'];
        if (isset($_SESSION['data'][$index])) {
            $_SESSION['data'][$index] = $entry;
        }
    } else {
        $_SESSION['data'][] = $entry;
    }
}

if (isset($_SESSION['data'])) {
    $data = $_SESSION['data'];
}
?>



<!DOCTYPE html>
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
                <div class="card-body py-3">
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
            <?php
            if (!empty($data)) {
                foreach ($data as $index => $user) {
                    echo '<tr>';
                    echo '<td>' . ($index + 1) . '</td>';
                    echo '<td class="name-cell">' . $user['name'] . '</td>';
                    echo '<td class="number-cell">' . $user['number'] . '</td>';
                    echo '<td>' . $user['date'] . '</td>';
                    echo '<td><button class="btn btn-warning btn-sm edit-btn">Edit</button></td>';
                    echo '</tr>';
                    echo '<td>
                    <button class="btn btn-success btn-sm save-btn" style="display: none;">Save</button>
                </td>';
                }
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function () {
        $("#formid").submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: "post",
                url: "task4-5.php",
                data: {
                    name: $("#name").val(),
                    number: $("#number").val(),
                },
                success: function (response) {
                    $('#formid')[0].reset();
                    // Refresh the table after adding data
                    updateTable();
                }
            });
        });

        // Edit functionality
        $(document).on("click", ".edit-btn", function () {
            var row = $(this).closest("tr");
            var nameCell = row.find(".name-cell");
            var numberCell = row.find(".number-cell");

            var name = nameCell.text();
            var number = numberCell.text();

            nameCell.html('<input type="text" class="form-control" value="' + name + '">');
            numberCell.html('<input type="number" class="form-control" value="' + number + '"]');
            row.find(".edit-btn").hide();
            row.find(".save-btn").show();
        });

        // Save functionality
        $(document).on("click", ".save-btn", function () {
            var row = $(this).closest("tr");
            var nameCell = row.find(".name-cell");
            var numberCell = row.find(".number-cell");
            var name = nameCell.find("input").val();
            var number = numberCell.find("input").val();
            var editIndex = row.index();

            $.ajax({
                type: "post",
                url: "task4-4.php",
                data: {
                    name: name,
                    number: number,
                    action: "edit",
                    editIndex: editIndex,
                },
                success: function (response) {
                    // Refresh the table after saving the edited data
                    updateTable();
                }
            });
        });
    });
</script>
</body>
</html>


<!-- $(document).on("click", ".edit-btn", function() {
    var editId = $(this).attr('index');
    var userData = userData[editId];
    $("#name").val(userData.name);
    $("#number").val(userData.number);
    // Change the form submit button to an "Update" button
    $("#done").val('Update');
    // Store the user's index in a hidden field for reference during update
    $("#formid").append('<input type="hidden" name="edit_id" value="' + editId + '">');
}); -->



<!-- 

$(document).on("click", ".delete-btn", function() {
    var deleteID = $(this).data("id");
    var rowToDelete = $(this).closest('tr'); // Find the closest <tr> element
    rowToDelete.remove(); // Remove the row from the table

    // You can also send an AJAX request to the server here to delete the corresponding data using 'deleteID'
    // $.ajax({
    //     type: 'POST',
    //     url: 'delete.php', // Replace with your server-side script
    //     data: { id: deleteID },
    //     success: function(response) {
    //         // Handle the server response here
    //     }
    // });
});
   echo "<td><button class='btn btn-warning btn-sm edit-btn' index='".$index."' type = 'button' id= 'edit' data-id=".($serialnumber++).">Edit</button>  <button class='btn btn-danger btn-sm delete-btn' index='".$index."' type = 'button' id='delete' data-id=".($serialnumber++).">  Delete </button></td>";

} -->
