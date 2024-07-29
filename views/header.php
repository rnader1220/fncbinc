<?php
    $server_link = 'https://payfncb.cssimpact.com:8443/pay/FNCB/login';
    //$server_link =  '/server-maintenance.php';
?>
<header>
    <div class="mobile ">
        <div>
<a href="#" class="mobile-menu" onclick="$('#mobileNav').toggle();"><i class="fa-regular fa-bars"></i></a>
</div>
        <div class="mobile-nav" id="mobileNav" style='display:none'>
                <a href="/">Home</a><br>
                <!-- div class="col-6 menu-item"><a href="/remove-number">Remove Number</a></div -->
                <a href="/contact.php">Contact</a><br>
                <a href="/dispute2.php">Dispute</a><br>
                <a href="/custcare2.php">Customer Care</a><br>
                <a href="/complaint2.php">Complaint</a><br>
                <a href="/resources.php">Resources</a><br>
                <!-- need to point to actual login portal-->
                <a target='_blank' href="<?=$server_link ?>" aria-label="Make Payment - new tab">Login</a><br>
                <a target='_blank' href="<?=$server_link ?>" style='font-weight:bold; font-size:1.25em' aria-label="Make Payment - new tab">Make Payment</a>
        </div>
    </div>
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    Call with questions or to pay by phone: <a href="tel:800-824-6191">(800)
                        824-6191</a>&nbsp;&nbsp;|&nbsp;&nbsp;TTY/TTD service: Dial 711&nbsp;&nbsp;|&nbsp;&nbsp;Se habla
                    español
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-4 col-sm-2 col-md-2 col-lg-2 desktop">
                <a href="/" class="logo" title="First National Collections Bureau, Inc. FNCBNV">First National
                    Collections
                    Bureau, Inc. FNCBNV</a>
            </div>
            <div class="col-4 col-sm-10 col-md-10 col-lg-10 desktop ">
                <ul>
                    <li><a href="/">Home</a></li>
                    <!-- li><a href="/remove-number.php">Remove Number</a></li -->
                    <li><a href="/contact.php">Contact</a></li>

                    <li><a href="/dispute2.php">Dispute</a></li>
                    <li><a href="/custcare2.php">Customer Care</a></li>
                    <li><a href="/complaint2.php">Complaint</a></li>
                    <li><a href="/resources.php">Resources</a></li>


                    <!-- need to point to actual login portal-->
                    <li><a target='_blank' href="<?=$server_link ?>" aria-label="Make Payment - new tab">Review Your Account</a></li>

                    <!-- need to point to actual login portal-->
                    <li><a target='_blank' href="<?=$server_link ?>" class="button normal" aria-label="Make Payment - new tab">Make Payment</a></li>
                </ul>
            </div>

        </div>
    </div>

</header>