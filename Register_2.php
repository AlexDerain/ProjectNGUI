<!DOCTYPE html>
<html>
<body>
<div style="text-align:center">

<?php
    $fp = fopen('Lisa.txt', 'r');
    $email = fgets($fp);
    fclose($fp);
    $emails = explode('@', $email);

    echo "Congratulations " . $emails[0] . ", your registration is finished!<br><br>";
    echo "Enjoy your trip in BeerMe!<br><br>"
?>

</div>
<form action="Login.php" method="post" style="text-align:center">
    <input type = "submit" name = 'login' value = "Login Now">
</form>

</body>
</html>