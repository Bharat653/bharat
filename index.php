 <!-- <!--
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
// ////////////////////////////////////////////////////////////////////////
//    $x=20;
//    $y=50;
//    function addition(){
//     $GLOBALS ['z']= $GLOBALS ['x']+$GLOBALS ['y'];
//    }
//    addition();
//    echo "$z";
// 

 // //////////////////////////////////////////////////////////////////////// -->

<!-- 
 echo "hello world" ."<br>";
 echo "50"+"30"."<br>";

 $cars=array("alto","suzuki","honda","activa","mercedes","");

 for($i=0;$i<=5;$i++)

 echo $cars[$i]."<br>";


 echo $cars[1]."<br>";
 echo $cars[2]."<br>";
 echo $cars[3]."<br>";
 echo $cars[0];

 echo "<pre>"; print_r($cars);
   // collect value of input field
   $name = $_REQUEST['fname'];
   if (empty($name)) {
     echo "Name is empty";
   } else {
     echo $name;
   } } 


  <html>
    
 <form method="post" action="echo $_SERVER['PHP_SELF'];">
    Name: <input type="text" name="fname">
  <input type="submit">
  </form>
 </html>   -->
<!-- 
 <!DOCTYPE HTML>  
<html>
<head>
</head>
<body>  

<?php
// // define variables and set to empty values
// $name = $email = $gender = $comment = $website = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   $name = test_input($_POST["name"]);
//   $email = test_input($_POST["email"]);
//   $website = test_input($_POST["website"]);
//   $comment = test_input($_POST["comment"]);
//   $gender = test_input($_POST["gender"]);
// }

// function test_input($data) {
//   $data = trim($data);
//   $data = stripslashes($data);
//   $data = htmlspecialchars($data);
//   return $data;
// }
?>

<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
  Website: <input type="text" name="website">
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
// echo "<h2>Your Input:</h2>";
// echo $name;
// echo "<br>";
// echo $email;
// echo "<br>";
// echo $website;
// echo "<br>";
// echo $comment;
// echo "<br>";
// echo $gender;
?>

</body>
</html> 
 ////////////////////////////////////////////////// -->

<!-- <body>

    <div class="container-fluid">
        <div class="row my-3">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="card">
                        <div class="card-header">
                            <h4>Registration Form</h4>
                        </div>
                        <div class="card-body py-3" id="form">
                            <div class="form-group">
                                <label for="name"><b>Enter Name:</b> <span class="error">*</span></label>
                                <input type="text" id="name" name="name" class="form-control">
                                <span class="error"><?= @$nameErr ?></span>
                                <br>
                            </div>
                            <div class="form-group">
                                <label for="password"><b>Password:</b> <span class="error">*</span></label>
                                <input type="password" id="password" name="password" class="form-control">
                                <span class="error"><?= @$passwordErr ?></span>
                                <br>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" value="Register" class="btn btn-dark btn-sm" name="action">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>  -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1><B>FIRST PAGE</B></h1>
  <button><a href="Loginform.php" class="btn btn-dark btn-sm">Log in Page</a></button>
  <button><a href="Newregester.php" class="btn btn-dark btn-sm">New regestration</a></button>
</body>
</html> -->