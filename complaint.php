<?php
$success = false;

if($_POST) {
    $message = '';
    $valid=true;
    if(!$_POST['fname']) {
        $message.= "First Name Required<br/>";
        $valid=false;
    }
    if(!$_POST['lname']) {
        $message.= "Last Name Required<br/>";
        $valid=false;
    }
    if(!$_POST['addr1']) {
        $message.= "Address Line 1 Required<br/>";
        $valid=false;
    }
    if(!$_POST['city']) {
        $message.= "Address City Required<br/>";
        $valid=false;
    }
    if(!$_POST['state']) {
        $message.= "Address State Required<br/>";
        $valid=false;
    }
    if(!$_POST['zipcode']) {
        $message.= "Address Zip Code Required<br/>";
        $valid=false;
    }
    if(!$_POST['phone']) {
        $message.= "Phone Number Required<br/>";
        $valid=false;
    }
    if(!$_POST['email']) {
        $message.= "Email Address Required<br/>";
        $valid=false;
    }
    if(!$_POST['refnumber']) {
        $message.= "Reference Number Required<br/>";
        $valid=false;
    }


    if(!$valid) {
        $message.= "Please Add Required Fields";
        $success = false;
    } else {
        $to = "correspondence@fncbinc.com"; // this is your Email address
        $from = $_POST['email']; // this is the sender's Email address
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $subject = "Complaint Form submission";
        $message = "Complaint Form Data: \n\n" .
        "First Name: {$_POST['fname']} \n".
        "Last Name: {$_POST['lname']} \n\n".
        "Address: \n" . 
        "{$_POST['addr1']} \n".
        (strlen(ltrim($_POST['addr2'])) > 1 ?"{$_POST['addr2']} \n":"").
        "{$_POST['city']}, {$_POST['state']}  {$_POST['zipcode']} \n\n".
        "Phone Number: {$_POST['phone']} \n".
        "Email Address: {$_POST['email']} \n".
        "Reference Number: {$_POST['refnumber']} \n\n".
        (isset($_POST['detail'])?
        "Message Details:\n{$_POST['detail']}":"") . "\n\n";
    
        $headers = "From:" . $from;

        mail($to,$subject,$message,$headers);

        $message = "Your Complaint has been Recieved";
        $success = true;
    }
} else {
    $message = "If you would like to submit a complaint on the debt that we have contacted you about, ". 
    "please call us toll free at <a href='tel:800-824-6191'>(800) 824-6191</a> or submit the following information. " . 
    "All information provided serves as express written consent to contact you in order to resolve this matter." . 
    "<br><br>By submitting the form below, you certify that you are being truthful and that all information provided is accurate.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="frame-ancestors none">
    <title>First National Collections Bureau - Complaint Form</title>
    <link rel="icon" type="image/icon" href="/images/fncb.ico">
    <meta name="description"
        content="First National Collections Bureau is a nationally licensed full service accounts receivable management firm. Helping consumers resolve debts for over 35 years." />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css?v=1">

</head>

<body>
    <div class="top-bar"  data-include="topbar"></div>
    <header  data-include="header"></header>
    <div class="mobile-nav " id="mobileNav" data-include="mobileNav"></div>

    <div class="container">
    <div class='section-one'>
    <center><h2>Complaint Contact Form</h2></center>
    <br><br>    
    <?=$message ?></div>

<?php if ($success) { ?>
<?php } else { ?>
        <div class='section-two'>
            <form method='POST'>
                <div class="row">

                    <div class="col-lg-6" id="fname_div">
                        <div class="form-group">
                            <label for="fname" class="control-label">First Name</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="fname" name="fname"
                                    <?php if($_POST['fname']) {echo "value='{$_POST['fname']}'";} ?> 
                                >
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" id="lname_div">
                        <div class="form-group">
                            <label for="lname" class="control-label">Last Name</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="lname" name="lname"
                                    <?php if($_POST['lname']) {echo "value='{$_POST['lname']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" id="addr1_div">
                        <div class="form-group">
                            <label for="addr1" class="control-label">Address</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="addr1" name="addr1"
                                    <?php if($_POST['addr1']) {echo "value='{$_POST['addr1']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" id="addr2_div">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" type="text" id="addr2" name="addr2"
                                    <?php if($_POST['addr2']) {echo "value='{$_POST['addr2']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" id="city_div">
                        <div class="form-group">
                            <label for="city" class="control-label">City</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="city" name="city"
                                    <?php if($_POST['city']) {echo "value='{$_POST['city']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2" id="state_div">
                        <div class="form-group">
                            <label for="state" class="control-label">ST</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="state" name="state"
                                    <?php if($_POST['state']) {echo "value='{$_POST['state']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" id="zipcode_div">
                        <div class="form-group">
                            <label for="zipcode" class="control-label">Zip Code</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="zipcode" name="zipcode"
                                    <?php if($_POST['zipcode']) {echo "value='{$_POST['zipcode']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4" id="phone_div">
                        <div class="form-group">
                            <label for="phone" class="control-label">Phone Number</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="phone" name="phone"
                                    <?php if($_POST['phone']) {echo "value='{$_POST['phone']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" id="email_div">
                        <div class="form-group">
                            <label for="email" class="control-label">Email Address</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="email" name="email"
                                    <?php if($_POST['email']) {echo "value='{$_POST['email']}'";} ?>
                                    >
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4" id="refnumber_div">
                        <div class="form-group">
                            <label for="refnumber" class="control-label">Reference Number</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="refnumber" name="refnumber"
                                    <?php if($_POST['refnumber']) {echo "value='{$_POST['refnumber']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12" id="detail_div">
                        <div class="form-group">
                            <label for="detail" class="control-label">Description of Complaint</label>
                            <textarea class="form-control" id="detail" name="detail"><?php if($_POST['detail']) {echo "{$_POST['detail']}";} ?></textarea>
                        </div>
                     </div>
                </div>
                <div class="row">

                    <div class="col-lg-12 pt-3" id="submit_div">
                    <button type="submit" class="btn btn-primary float-end">Submit</button>

                    </div>
                </div>
            </form>
        </div>
<?php } ?>

    </div>

    <div class="footer" data-include="footer"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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