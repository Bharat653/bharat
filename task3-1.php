<?php

if(isset($_POST["submit"]))
{
    $characters=$_POST['characters'];
    echo strrev($characters);
}
?>








 <html>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
<label> Write the Alphabet and Special Character</label></br>
    <input type="text"  placeholder="type" name="characters">
    <input type="submit" value="Reverse" name="submit" placeholder="number" >

    </form>
</html>  