<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="frame-ancestors none">
    <meta http-equiv="Cache-Control" content="no-cache">
    <title>First National Collections Bureau - Remove Number</title>
    <link rel="icon" type="image/icon" href="/images/fncb.ico">
    <meta name="description" content="First National Collections Bureau is a nationally licensed full service accounts receivable management firm. Helping consumers resolve debts for over 35 years." />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    <link rel="stylesheet" href="/css/app.css?v=9">
    
</head>
<body>
    <div class="top-bar"  data-include="topbar"></div>
    <header  data-include="header"></header>
    <div class="mobile-nav " id="mobileNav" data-include="mobileNav"></div>

    <div class="container">
        <div class='section-two'>
            <iframe style='width:100%; height:600px'  width='100%' height='600' src="https:///www.fncbnv.com"></iframe>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="company-logos ">
                        <div class="row gx-0">
                            <div class="col-3 col-sm-3 col-md3 col-lg-3 d-flex">
                                <!-- div class="company d-flex align-items-center"><a href="#" class="bbb">BBB Acredited Business</a></div -->
                            </div>
                            <div class="col-3 col-sm-3 col-md3 col-lg-3">
                                <div class="company d-flex align-items-center"><a href="#" class="aca">ACA International</a></div>
                            </div>
                            <div class="col-3 col-sm-3 col-md3 col-lg-3">
                                <div class="company d-flex align-items-center"><a target='_blank' href="https://rmaintl.org/consumers/" class="rmai">RMAi Certified</a></div>
                            </div>
                            <div class="col-3 col-sm-3 col-md3 col-lg-3">
                                <!-- div class="company d-flex align-items-center"><a href="#" class="nmls">NMLS Consumer Access</a></div -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="info">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 fncb centered">
                                <p>This communication is from a debt collector. This is an attempt to collect a debt and any information obtained will be used for that purpose.</p>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-3 fncb">
                                <a href="#" class="logo" title="First National Collections Bureau, Inc. FNCBNV">First National Collections Bureau, Inc. FNCBNV</a>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-5 fncb">
                            </div>
                            
                            <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                                <b>First National Collection Bureau, Inc.</b><br>
                                50 West Liberty Street <br>
                                Suite 250<br>
                                Reno, NV 89501<br>
                                <a href="tel:800-824-6191">(800) 824-6191</a><br>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 fncb centered">
                                <p>© Copyright 2021 First National Collections Bureau, Inc. All rights reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-links">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <ul>
                            <li><a href="/">Home</a></li>
                            <!-- need payment portal url-->
                            <li><a target='_blank' href="https://payfncb.cssimpact.com:8443/pay/FNCB/login">Payment Portal</a></li>
                            <!-- li><a href="/remove-number.html">Remove Number</a></li -->
                            <li><a href="/contact.html">Contact</a></li>
                            
                            <li><a href="/legal-privacy.html">Privacy Policy</a></li>
                            <li><a href="/legal-terms.html">Terms and Conditions</a></li>
                            <li><a href="/legal-disclosure.html">State Disclosures</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2">
                        <ul class="socials">
                            <li><!-- a target='_blank' href="https://www.linkedin.com/company/fncb-financial-services-llc-" target="_blank"><i class="icon linkedin"></i></a --></li>
                            <li><!-- a target='_blank' href="https://www.facebook.com/BNCB/" target="_blank"><i class="icon facebook"></i></a --></li>
                            <li><!-- a target='_blank' href="https://twitter.com/fncbinc" target="_blank"><i class="icon twitter"></i></a --></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function toggler(divId) {
            $("#" + divId).toggle();
        }
        $(function () {
            var includes = $('[data-include]')
            $.each(includes, function () {
            var file = 'views/' + $(this).data('include') + '.html'
            $(this).load(file)
        })
})
    </script>
</body>
</html>
