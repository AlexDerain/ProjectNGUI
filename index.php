<!DOCTYPE html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
    function test_input($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    $emailErr = $passwordErr = "";
    $email = $password = "";
    $email_check = $password_check = "";
    $user = array();
    $flag1 = $flag2 = $flag3 = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      if(is_readable('Lisa.txt')){
        $user = file('Lisa.txt');
        $email_check = trim($user[0]);
        $password_check = trim($user[1]);
      }
      else{
        $emailErr = 'Please register first';
        $flag3 = false;
        goto BreakingLabel;
      }

      if (empty($_POST["password"])){
        $passwordErr = "Please enter your passoword";
        $flag1 = false;
      }
      else{
        $password = test_input($_POST["password"]);
        $flag1 = true;
        if($password != $password_check){
          $passwordErr = 'Password incorrect';
          $flag1 = false;
        }
      }
    
      if (empty($_POST["email_address"])){
        $emailErr = "Please enter your email address";
        $flag2 = false;
      }
      else{
        $email = test_input($_POST["email_address"]);
        $flag2 = true;
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)){
            $emailErr = "Invalid email address";
            $flag2 = false;
        }
        elseif($email != $email_check){
          $emailErr = 'Unregistered user';
          $flag2 = false;
        }
      }

      BreakingLabel:
      if($flag1 && $flag2 && $flag3){
        header('Location: Login.php?email_address=' . $email);
      }
    }
?>

<center><p><span class="error">* Necessary field</span></p></center>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="text-align:center"> 
   Email address: <br>
   <input type="text" name="email_address" value="<?php echo $email;?>">
   <span class="error">* <br><?php echo $emailErr;?></span>
   <br><br>
   Password: <br>
   <input type="password" name="password" value="<?php echo $password;?>">
   <span class="error">* <br><?php echo $passwordErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Login"> 
</form>
  
  <center><a href="Register_1.php" table="_blank">No account? Register now.</a></center>

</body>
</html>