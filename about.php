<!DOCTYPE html>
<html lang="en">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>First National Collections Bureau - Home Us</title>
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
        <div class='section-one'>Content Goes Here</div>
    </div>

    <div class="footer" data-include="footer"></div>
    
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
