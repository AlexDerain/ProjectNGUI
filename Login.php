<!DOCTYPE html>
<html>
<body>
<div style="text-align:center">

<form action = "Profile.php">
    <input type="submit" value="Profile Settings"/>
</form>

<?php 
    $fp = fopen('Lisa.txt', 'r');
    $email = fgets($fp);
    fclose($fp);
    $emails = explode("@", $email);
    echo "Welcome " . $emails[0] . "!<br><br>"; 

    $beers = 0;
    if(isset($_GET["beer"])){
        $beers = $_GET["beer"];
    }
    else{
        $beers = 6;
    }

    echo "You have " . $beers . " credits left.<br>";
    if($beers == 0){
        echo "Sorry, but you have no credit left.<br>";
    }
    else{
        echo '<br>';
        $beers --;
    }

    function refresh(){
    }

    if(array_key_exists('refresh', $_GET)){
        refresh();
    }
?>

<form method = "get">
    <input type = "hidden" name = "email_address" value = <?php echo $emails[0];?>>
    <input type = "hidden" name = "beer" value = <?php echo $beers ?>>
    <input type = "submit" name = "refresh" id = "refresh" value = "Refresh" /><br>
</form>

</div>

</body>
</html>