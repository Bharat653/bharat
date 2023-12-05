<!DOCTYPE html>
<html>
<body>

<?php
class Fruit {
  public $name;
  public $color;
  public $pet;

  function __construct($name, $color, $pet) {
    $this->name = $name; 
    $this->color = $color;
    $this->pet = $pet;
  }
  function get_name() {
    return $this->name;
  }
  function get_color() {
    return $this->color;
  }
  function get_pet(){
  return $this->pet;
}
}

$apple = new Fruit("Apple", "red","pitbull");
echo $apple->get_name();
echo "<br>";
echo $apple->get_color();
echo "<br>";
echo $apple->get_pet();
?>
 
</body>
</html>
<!-- // Input strings
// $string1 = 'abcdef';
// $string2 = '123456';

// $output = '';
// $i = 0;

// $string1Len = strlen($string1);
// $string2Len = strlen($string2);

// $maxLength = max($string1Len, $string2Len);

// for ($i = 1; $i <= $maxLength; $i++) {
//     $output .= substr($string1, 0, $i) . substr($string2, 0, $i);

//     $string1 = substr($string1, $i);
//     $string2= substr($string2, $i);
// }

// $output .= $string1. $string2;

// // Display the final output
// echo $output; -->
?>
