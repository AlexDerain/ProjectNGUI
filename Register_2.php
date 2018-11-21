<!DOCTYPE html>
<html>
<body>
<div style="text-align:center">
    <script>
        var email = window.location.search.split('?')[1].split('&')[0].split('=')[1].split('%')[0];
        document.write("Greetings, " + email + ", your registration is about to finish.");
    </script>
</div>
<form action="Login.html" method="GET" style="text-align:center">
<p>The certification code has been sent to your email address, <br />
please confirm your email address by entering it below.</p>

Certification code:<br />
<input type="text" name="certification_code"><br /><br />
</form>

<center><button onclick="window.location.href='Login.html?email_address=' + email">Done</button></center>

</body>
</html>