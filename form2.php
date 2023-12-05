<?php
session_start();
class Service
{
    public $warrning_var;
    //    public $index="";
    function storedata(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // storing in session
            $name = $_POST['name']?? null;
            $number = $_POST['number'] ?? null;
            $date = date('d-m-y');
            // $actionby = $_POST['actionby'] ?? null;
            if (!($name)|| !$number ) {
                echo "Please enter all fields";
                return;
            }
            $entry = array(
                'name' => $name,
                'number' => $number,
                'date' => $date,
                // 'actionby' => $actionby,
            );
            //  setting session
            // adding new rows
            $_SESSION['users'][] = $entry;
        }
    }
    function showdata(){
        // if will be false for first time
        if (isset($_SESSION['users'])) {
            // print_r($_SESSION['users']);
            // exit();
            $serialNo = 1;
            foreach ($_SESSION['users'] as $index => $entry) {
                echo "<tr id=" . $index . ">";
                echo "<td>" . ($serialNo++ ) . "</td>";
                echo "<td>" . $entry['name'] . '</td>';
                echo "<td>" . $entry['number'] . "</td>";
                echo "<td>" . $entry['date'] . "</td>";
                // echo "<td>" . $entry['actionby'] . "</td>";
                echo "<td><button id='edit' value='$index' class='btn btn-primary btn-sm btn-warning'>Edit</button></td>";
                echo "<td><button id='delete' value='$index' class='btn btn-primary btn-sm btn-danger'>Delete</button></td>";
                echo "</tr>";
            }
        }
    }
    function delete_row($del_index){
        unset($_SESSION['users'][$del_index]);
    }
}
$obj=new Service;
return $obj;
?>