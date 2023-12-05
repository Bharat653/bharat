<?php
session_start();
$serialnumber = 1;
if (isset($_SESSION['data'])) {
    krsort($_SESSION['data']);
    foreach ($_SESSION['data'] as $index => $user) {
        echo '<tr  id="row">';
        echo '<td>' . ($serialnumber) . '</td>'; 
        echo '<td >' . $user['name'] . '</td>';
        echo '<td >' . $user['number'] . '</td>';
        echo '<td>' . $user['date'] . '</td>';
        echo "<td><button class='btn btn-warning btn-sm edit-btn ' index='".$index."'>Edit</button>  <button class='btn btn-danger btn-sm delete-btn' index='".$index."' type = 'button' id='delete' data-id=".($serialnumber++).">  Delete </button></td>";
        echo '</tr>';   
        

    }
  }  
?>


