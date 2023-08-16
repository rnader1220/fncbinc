<!DOCTYPE html>
<html lang="en">
<?php
header("Content-Type: text/html; charset=utf-8"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Content-Security-Policy: frame-ancestors none");
header("Strict-Transport-Security: max-age=31536000"); 
header("X-Content-Type-Options: nosniff"); 
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>First National Collections Bureau - Contact Us</title>
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
        <div class='row'>
            <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                <div class='section-two'>
                    <br><br>
                    <p>
                        <b>First National Collection Bureau, Inc.</b>
                    </p>
                    <p>
                        <b>Phone: </b><a href="tel:800-824-6191">(800) 824-6191</a>
                    </p>
                    <p>
                        <b>Hours of Operation:</b><br>
                        Monday through Friday<br>
                        6:00 am to 5:00 pm PST (hours may vary)<br>
                    </p>
                    <p>
                        <b>Address:</b><br>
                        50 West Liberty Street<br>Suite 250<br>
                        Reno, NV 89501
                    </p>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-8 col-lg-8" title="First National Collections Bureau, Inc. FNCBNV">
                <iframe style="width:100%; height:450px; border:1px solid #24346c; border-radius:12px;"
                    allowfullscreen="" loading="lazy"
                    src="https://www.google.com/maps/embed/v1/place?q=50+West+Liberty+Street+Suite+250+Reno,+NV+89501&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
            </div>



        </div>
    </div>


    <?php include 'views/footer.php' ?>
</body>
<?php include 'views/scripts.php' ?>

</html>