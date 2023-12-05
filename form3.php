<?php
$service = include_once "form2.php";
if ($_POST['action']) {
    $action = $_POST['action'] ?? null;
    switch ($action) {
        // getting submitted data
        case 'store_data':
            $service->storedata();
            break;
        case 'show_data':
            $service->showdata();
            break;
        case 'users_edit':
            # code...
            break;
        case 'users_update':
            # code...
            break;
        case 'delete_row':
            $service->delete_row($_POST['del_index']);
            # code...
            break;
        default:
            # code...
            break;
    }
}
?>