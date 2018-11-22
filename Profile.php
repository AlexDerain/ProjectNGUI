<!DOCTYPE html>
<html>
<body>
<div style = "text-align:center">

<?php
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $height = $weight = $gender = "";

    function saving($height, $weight, $gender){
        $fp = fopen('Lisa.txt', 'a');
        fwrite($fp, $height . PHP_EOL);
        fwrite($fp, $weight . PHP_EOL);
        fwrite($fp, $gender . PHP_EOL);
        fclose($fp);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $height = test_input($_POST["height"]);
        $weight = test_input($_POST["weight"]);
        $gender = test_input($_POST["gender"]);
        saving($height, $weight, $gender);
    }
?>

<form method = "post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Height:
    <input type = "text" name = "height" value = <?php echo $height;?>><br><br>
    Weight:
    <input type = "text" name = "weight" value = <?php echo $weight;?>><br><br>
    Gender:
    <input type = "text" name = "gender" value = <?php echo $gender;?>><br><br>
    <br><br>
    <input type = "submit" name = "save" id = "save" value = "Save">
</form>

</div>
</body>
</html>