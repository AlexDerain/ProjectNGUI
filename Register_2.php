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

<?php
    $username = explode("=", $_SERVER['REQUEST_URI'])[1];
    $user = $username . ".txt";
    $fp = fopen($user, 'r');
    $email = fgets($fp);
    fclose($fp);
    $emails = explode('@', $email);

    echo "Congratulations " . $emails[0] . ", your registration is finished!<br><br>";
    echo "Enjoy your trip in BeerMe!<br><br>"
?>

<form action= <?php echo "Login.php?username=" . $username ?> method="post" style="text-align:center">
    <input type = "submit" name = 'login' value = "Login Now">
</form>
</div>

</body>
</html>