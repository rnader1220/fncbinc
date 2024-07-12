<!DOCTYPE html>
<html lang="en">

<?php
$success = false;

?>



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>First National Collections Bureau - Complaint Form</title>
    <link rel="icon" type="image/icon" href="/images/fncb.ico">
    <meta name="description"
        content="First National Collections Bureau is a nationally licensed full service accounts receivable management firm. Helping consumers resolve debts for over 35 years." />
    <?php include 'views/styles.php' ?>

</head>

<body>
<?php include 'views/topbar.php' ?>
<?php include 'views/header.php' ?>
<?php include 'views/mobileNav.php' ?>

    <div class="container">
        <div class='section-one'>

        <div id="wufoo-s54gpmn1532qb5"> 
            Fill out my <a href="https://fncbnv.wufoo.com/forms/s54gpmn1532qb5">online form</a>. 
        </div> 
        <script type="text/javascript"> 
            var s54gpmn1532qb5; (
                function(d, t) {
                    var s = d.createElement(t), options = { 'userName':'fncbnv', 'formHash':'s54gpmn1532qb5', 'autoResize':true, 'height':'1381', 'async':true, 'host':'wufoo.com', 'header':'show', 'ssl':true }; 
                    s.src = ('https:' == d.location.protocol ?'https://':'http://') + 'secure.wufoo.com/scripts/embed/form.js'; 
                    s.onload = s.onreadystatechange = 
                        function() { 
                            var rs = this.readyState; 
                            if (rs) if (rs != 'complete') if (rs != 'loaded') return; 
                            try { 
                                s54gpmn1532qb5 = new WufooForm(); 
                                s54gpmn1532qb5.initialize(options); 
                                s54gpmn1532qb5.display(); 
                            } catch (e) { } 
                        }; 
                        var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; 
                        par.insertBefore(s, scr); 
                }
            )
            (document, 'script'); 
        </script>

    </div>
    <?php include 'views/footer.php' ?>
</body>
<?php include 'views/scripts.php' ?>
</html>