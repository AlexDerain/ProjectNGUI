<!DOCTYPE html>
<html>
<body>
<div style="text-align:center">
<script>
    var email = window.location.search.split('?')[1].split('=')[1].split('&')[0].split('%')[0];
    var beers;
    if (!window.location.search.split('=')[2]){
        beers = 5;
    }
    else{
        beers = window.location.search.split('=')[2];
    }

    document.write("Welcome " + email + "!");
    document.write("<br><br>");

    if(beers > 0){    
        document.write("Credit left: " + beers);
        beers -= 1;
    }
    else{
        document.write("Credit left: 0");
        document.write("<br>");
        document.write("Sorry, please buy credit before getting more beers.");
    }
</script>
</div>

<center><button onclick="window.location.href='Login.html?email_address=' + email + '&beer_credit=' + beers">Refresh State</button></center>

</body>
</html>