<?php
// Input strings
$string1 = 'abcdef';
$string2 = '123456';

$output = '';
$i = 0;

$string1Len = strlen($string1);
$string2Len = strlen($string2);

$maxLength = max($string1Len, $string2Len);

for ($i = 1; $i <= $maxLength; $i++) {
    $output .= substr($string1, 0, $i) . substr($string2, 0, $i);

    $string1 = substr($string1, $i);
    $string2= substr($string2, $i);
}

$output .= $string1. $string2;

// Display the final output
echo $output;
?>
<!-- // $string1 = 'abcdef';
// $string2 = '123456';
// $output = '';
// $i = 0;
// $count = 1;

// $string1Len = strlen($string1);
// $string2Len = strlen($string2);
// $maxLength = max($string1Len);

// for ($i = 1; $i <= $maxLength; $i++) {
//     $output .= substr($string1, $count);
//     $output .= substr($string2, $count);

//     // $string1 = substr($string1, $i);
//     // $string2 = substr($string2, $i);
//     $string1 .= $count;
//     $count++;
// }

// $output .= $string1 . $string2;
// echo $output; -->
?>

<?php
// $string1 = "abcdef";
// $string2 = "123456";

// $output = '';
// $i = 0;
// $j = 0;

// $string1_len = strlen($string1);
// $string2_len = strlen($string2);
// $min_length = min($string1_len,$string2_len);

// for($i=1;$i <=$min_length;$i++){

//     $output .= substr ($string1 , 0 , $i);
//     $output .= substr ($string2 , 0 , $i);

//     $string1_len = substr($string1,$i);
//     $string2_len = substr($string2,$i);

// }

// $output .= $string1 . $string2;



// echo $output;
?>

<!-- // echo("a1bc23def456"); -->



<!-- Input :-
String1 : abcdef
String2  : 123456
Output Should be  : a1bc23def456 --> 

<!-- <!DOCTYPE html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                                <label>Enter alphabet</label>
                                <input type="text" id="name"  placeholder="Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Enter number</label>
                                <input type="number" id="number"  placeholder="Number" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" id="done"  class="btn btn-dark btn-sm" name="submit">
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
                    <th>Output</th>
                </tr>
            </thead>
            <tbody id="output">
            </tbody>
        </table>
    </div> -->