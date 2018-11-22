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

    $height = $weight = $gender = $male_status = $female_status = "";
    $profile = file('Lisa.txt');
    if(count($profile) > 3){
        $height = trim($profile[3]);
        $weight = trim($profile[4]);
        $gender = trim($profile[5]);
        if($gender == "Male"){
            $male_status = "checked";
            $female_status = "unchecked";
        }
        else{
            $male_status = "unchecked";
            $female_status = "checked";
        }
    }

    function saving($new_height, $new_weight, $new_gender){
        $profile = file('Lisa.txt');
        $fp = fopen('Lisa.txt', 'w+');
        fwrite($fp, trim($profile[0]) . PHP_EOL);
        fwrite($fp, trim($profile[1]) . PHP_EOL);
        fwrite($fp, trim($profile[2]) . PHP_EOL);
        fwrite($fp, $new_height . PHP_EOL);
        fwrite($fp, $new_weight . PHP_EOL);
        fwrite($fp, $new_gender . PHP_EOL);
        fclose($fp);
        header('Location: Login.php');
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $height = test_input($_POST["height"]);
        $weight = test_input($_POST["weight"]);
        $gender = test_input($_POST["gender"]);
        saving($height, $weight, $gender);
    }
?>

<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Height:
    <input type = "text" name = "height" value = <?php echo $height;?>><br><br>
    Weight:
    <input type = "text" name = "weight" value = <?php echo $weight;?>><br><br>
    Gender:&nbsp;&nbsp;
    Male<input type = "radio" name = "gender" value = "Male" <?php echo $male_status;?>>&nbsp;&nbsp;
    Female<input type = "radio" name = "gender" value = "Female" <?php echo $female_status;?>><br><br>
    <br><br>
    <input type = "submit" name = "save" id = "save" value = "Save & Back to Beer"><br>
</form>

</div>
</body>
</html>