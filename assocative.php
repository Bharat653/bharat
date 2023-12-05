<?php

$users = [
    'bhArat' => [
        'age' => '21',
        'phone' => '7657942938',
    ],
    'sahil' => [
        'age' => '22',
        'phone' => '7657987825',
    ],
    'AKSHIT' => [
        'age' => '41',
        'phone' => '9878987820',
    ],

];
$input = 'BHARAT';
$input = strtolower($input);
foreach( $users as $username => $userdata ){
    $username = strtolower($username);
if ($username== $input){
    
    echo ("username :" .$username) ;
    echo "</br>";
    echo "age : " .$userdata['age'] ;
    echo "</br>";
    echo "phone: ".$userdata['phone']; 
    echo "</br>";
    echo "</br>";
    
}
}

/////////////////////////////////
echo "<pre>";
print_r($users);
echo "</pre>";
/////////////////////////////////
// foreach( $users as $username => $userdata ){
// echo "username = $username ";
// echo "</br>";
// echo "age : " .$userdata['age'] ;
// echo "</br>";
// echo "phone: ".$userdata['phone']; 
// echo "</br>";
// echo "</br>";
// }
///////////////////////////////
// sahil data
// data name 
// data age 
// data phone
//   $a = $assoc[0];

// print_r($a);

?>