<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
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
<div class = "smartphone">
<img src="logo.png" class = "center">
<?php
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $emailErr = $passwordErr = $secondpasswordErr = "";
    $email = $password = $secondpassword = "";
    $flag1 = $flag2 = $flag3 = true;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (empty($_POST["email_address"])){
            $emailErr = "Please enter your email address";
            $flag1 = false;
        }
        else{
            $email = test_input($_POST["email_address"]);
            $flag2 = true;
            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){
                $emailErr = "Invalid email address";
                $flag1 = false;
            }
        }

        if (empty($_POST["password"])){
            $passwordErr = "Please enter your passoword";
            $flag2 = false;
        }
        else{
            $password = test_input($_POST["password"]);
            $flag2 = true;
        }

        if($_POST['password'] != $_POST['confirm_password']){
            $flag3 = false;
            $secondpasswordErr = 'Passwords are not the same';
        }
        else{
            $secondpassword = test_input($_POST['confirm_password']);
            $flag3 = true;
        }

        if($flag1 && $flag2 && $flag3){
            $em = $email . PHP_EOL;
            $pw = $password . PHP_EOL;
            $fp = fopen('Lisa.txt', 'wb');
            fwrite($fp, $em);
            fwrite($fp, $pw);
            fclose($fp);
            header('Location: Register_2.php');
        }
    }
?>

<center><p><span class="error">* Necessary field</span></p></center>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="text-align:center">
Email address:<br />
<input type="text" name="email_address" value="<?php echo $email;?>">
<span class="error">* <br><?php echo $emailErr;?></span><br /><br>
Password:<br />
<input type="password" name="password" value="<?php echo $password;?>">
<span class="error">* <br><?php echo $passwordErr;?></span><br /><br>
Confirm password:<br />
<input type="password" name="confirm_password" value = '<?php echo $secondpassword;?>'>
<span class="error">* <br><?php echo $secondpasswordErr;?></span><br /><br>
<input type="submit" name = 'submit' value="Register">
</form>
</div>
</body>
</html>