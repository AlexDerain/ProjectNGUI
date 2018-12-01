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

<div class = "smartphone" style="text-align:center">
<img src="logo.png" class = "center">
<form action = "Profile.php">
    <input type="submit" value="Profile Settings"/>
</form>

<?php 
    $fp = fopen('Lisa.txt', 'r');
    $email = fgets($fp);
    fclose($fp);
    $emails = explode("@", $email);
    echo "Welcome " . $emails[0] . "!<br><br>"; 

    $beer = 10;
    $user = file('Lisa.txt');
    if(count($user) > 2){
        $beer = (int)trim($user[2]);
    }

    echo "You have " . $beer . " credits left.<br>";
    if($beer == 0){
        echo "Sorry, but you have no credit left.<br>";
    }
    else{
        echo '<br>';
        $fp = fopen('Lisa.txt', 'w+');
        fwrite($fp, trim($user[0]) . PHP_EOL);
        fwrite($fp, trim($user[1]) . PHP_EOL);
        fwrite($fp, (string)$beer . PHP_EOL);
        if(count($user) > 3){
            fwrite($fp, trim($user[3]) . PHP_EOL);
            fwrite($fp, trim($user[4]) . PHP_EOL);
            fwrite($fp, trim($user[5]) . PHP_EOL);
        }
        fclose($fp);
    }

    function refresh(){
        header("Refresh:0");
    }

    if(array_key_exists('refresh', $_POST)){
        $beer--;
        $fp = fopen('Lisa.txt', 'w+');
        fwrite($fp, trim($user[0]) . PHP_EOL);
        fwrite($fp, trim($user[1]) . PHP_EOL);
        fwrite($fp, (string)$beer . PHP_EOL);
        if(count($user) > 3){
            fwrite($fp, trim($user[3]) . PHP_EOL);
            fwrite($fp, trim($user[4]) . PHP_EOL);
            fwrite($fp, trim($user[5]) . PHP_EOL);
        }
        fclose($fp);
        refresh();
    }
?>

<form method = "post">
    <input type = "hidden" name = "email_address" value = <?php echo $emails[0];?>>
    <input type = "hidden" name = "beer" value = <?php echo $beer ?>>
    <input type = "submit" name = "refresh" id = "refresh" value = "Refresh" /><br>
</form>

</div>

</body>
</html>