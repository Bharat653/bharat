<?php
session_start();
// session_destroy();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = 'Store';
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    }
    if ($action == 'Store') {
        storetable($_POST);
    } else if ($action == 'delete') {  
        deletetable($_POST);
    }else if ($action == 'Update') {
        updatetable($_POST);
    }
}
 
// functions


function storetable($data)
{
    $name = $data['name'] ?? '';
    $number = $data['number'] ?? '';

    $entry = array(
        'name' => $name,
        'number' => $number,
        'date' => date('Y-m-d'),
    );

    if (!isset($_SESSION['data'])) {
        $_SESSION['data'] = [];
    }
    $_SESSION['data'][] = $entry;
}

function deletetable($data)
{
    $deleteID = $data['id'];
    echo "<pre>";
    print_r($deleteID);
    echo "</pre>";
    if (isset($_SESSION['data'][$deleteID])) {
        unset($_SESSION['data'][$deleteID]);
    }
}
if (isset($_SESSION['data'])) {
    $data = $_SESSION['data'];
}


function updatetable($data)
{
    $editID = $data['id'];
    $name = $data['name'];
    $number = $data['number'];
    print_r($editID);
    exit();
    if (isset($_SESSION['data'][$editID])) {
        $_SESSION['data'][$editID]['name'] = $name;
        $_SESSION['data'][$editID]['number'] = $number;
    }
}

// function updatetable($data)
// {
//     $editID =$data['edit_id'];
//     if(isset($_SESSION['data'][$editID])){
//         unset($_SESSION['data'][$editID]);
//     }
// }
// if (isset($_SESSION['data'])){
//     $data = $_SESSION['data'];
// }