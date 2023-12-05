<?php
if(isset($_POST["submit"])) {
    $characters = $_POST['characters'];

    $specialChars = preg_replace('/[A-Za-z\s]/', '', $characters); // Extract special 
    $alphabeticChars = preg_replace('/[^A-Za-z\s]/', '', $characters); // Extract alphabetic 

    $reversedAlphabetic = strrev($alphabeticChars);


    $reversedString = '';
    $specialIndex = 0;
    $alphabeticIndex = 0;

    for ($i = 0; $i < strlen($characters); $i++) {
        if (ctype_alpha($characters[$i]) || ctype_space($characters[$i])) {
            $reversedString .= $reversedAlphabetic[$alphabeticIndex];
            $alphabeticIndex++;
        } else {
            $reversedString .= $specialChars[$specialIndex];
            $specialIndex++;
        }
    }
    echo $reversedString;
}
?>
<html>
   
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label>Write the Alphabet and Special Character</label><br>
    <input type="text" placeholder="Enter Value" name="characters" style="padding: 10px;">
    <input type="submit" value="Reverse" name="submit" style="background-color: #4CAF50; /* Green */ border: none; color: white; padding: 15px 32px; text-align: center;  text-decoration: none; display: inline-block;font-size: 16px;">
</form>


</html>