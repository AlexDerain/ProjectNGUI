<!DOCTYPE html>
<html>
<head>
<style>
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}
.smartphone {
  position: relative;
  width: 360px;
  height: 640px;
  margin: auto;
  border: 16px black solid;
  border-top-width: 60px;
  border-bottom-width: 60px;
  border-radius: 36px;
  background-color: #ffdd99;
}
</style>
</head>

<body>
<div class = "smartphone" style = "text-align:center">
<img src="logo.png" class = "center">
<?php
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = urldecode(explode("=", $_SERVER['REQUEST_URI'])[1]);
    $user = explode(".txt", $username)[0];
    $height = $weight = $gender = $male_status = $female_status = "";
    $profile = file($username);
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

    function saving($new_height, $new_weight, $new_gender, $user_file, $user_name){
        $profile = file($user_file);
        $fp = fopen($user_file, 'w+');
        fwrite($fp, trim($profile[0]) . PHP_EOL);
        fwrite($fp, trim($profile[1]) . PHP_EOL);
        fwrite($fp, trim($profile[2]) . PHP_EOL);
        fwrite($fp, $new_height . PHP_EOL);
        fwrite($fp, $new_weight . PHP_EOL);
        fwrite($fp, $new_gender . PHP_EOL);
        fclose($fp);
        header('Location: Login.php?username=' . $user_name);
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $height = test_input($_POST["height"]);
        $weight = test_input($_POST["weight"]);
        $gender = test_input($_POST["gender"]);
        saving($height, $weight, $gender, $username, $user);
    }
?>

<!-- remove height
add whether to see pictures -->

<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?username=" . $username ?>">
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