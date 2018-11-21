<!DOCTYPE html>
<html>
<body>

  <form action="Login.html" method="GET" style="text-align:center">
    Email address:<br>
    <input type="text" name="email_address">
    <br>
    Password:<br>
    <input type="password">
    <br><br>
    <input type="submit" value="Login">
  </form> 

    <?php
    $content = "some text here";
    $fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/myText.txt","wb");
    fwrite($fp,$content);
    fclose($fp);
    ?>

  
  <center><a href="Register_1.html" table="_blank">No account? Register now.</a></center>


</body>
</html>