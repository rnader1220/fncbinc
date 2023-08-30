<!DOCTYPE html>
<html lang="en">

<?php
$success = false;

if($_POST) {
    $message = '';
    $valid=true;
    if(!$_POST['fname'] || trim($_POST['fname']) == '') {
        $message.= "First Name Required<br/>";
        $valid=false;
    }
    if(!$_POST['lname'] || trim($_POST['lname']) == '') {
        $message.= "Last Name Required<br/>";
        $valid=false;
    }
    if(!$_POST['addr1'] || trim($_POST['addr1']) == '') {
        $message.= "Address Line 1 Required<br/>";
        $valid=false;
    }
    if(!$_POST['city'] || trim($_POST['city']) == '') {
        $message.= "Address City Required<br/>";
        $valid=false;
    }
    if(!$_POST['state'] || trim($_POST['state']) == '') {
        $message.= "Address State Required<br/>";
        $valid=false;
    }
    if(!$_POST['zipcode'] || trim($_POST['zipcode']) == '') {
        $message.= "Address Zip Code Required<br/>";
        $valid=false;
    }
    if(!$_POST['phone'] || trim($_POST['phone']) == '') {
        $message.= "Phone Number Required<br/>";
        $valid=false;
    }
    if(!$_POST['email'] || trim($_POST['email']) == '') {
        $message.= "Email Address Required<br/>";
        $valid=false;
    }
    if(!$_POST['refnumber'] || trim($_POST['refnumber']) == '') {
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
    <center><h2>Complaint Contact Form</h2></center>
    <br><br>    
    <?=$message ?></div>

<?php if ($success) { ?>
<?php } else { ?>
        <div class='section-two'>
            <form method='POST'>
                <div class="row">

                    <div class="col-6" id="fname_div">
                        <div class="form-group">
                            <label for="fname" class="control-label">First Name</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="fname" name="fname"
                                    <?php if($_POST['fname']) {echo "value='{$_POST['fname']}'";} ?> 
                                >
                            </div>
                        </div>
                    </div>

                    <div class="col-6" id="lname_div">
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
                    <div class="col-12" id="addr1_div">
                        <div class="form-group">
                            <label for="addr1" class="control-label">Address</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="addr1" name="addr1"
                                    <?php if($_POST['addr1']) {echo "value='{$_POST['addr1']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-12" id="addr2_div">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" type="text" id="addr2" name="addr2"
                                    <?php if($_POST['addr2']) {echo "value='{$_POST['addr2']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-6" id="city_div">
                        <div class="form-group">
                            <label for="city" class="control-label">City</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="city" name="city"
                                    <?php if($_POST['city']) {echo "value='{$_POST['city']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-2" id="state_div">
                        <div class="form-group">
                            <label for="state" class="control-label">ST</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="state" name="state"
                                    <?php if($_POST['state']) {echo "value='{$_POST['state']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-4" id="zipcode_div">
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
                    <div class="col-4" id="phone_div">
                        <div class="form-group">
                            <label for="phone" class="control-label">Phone Number</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="phone" name="phone"
                                    <?php if($_POST['phone']) {echo "value='{$_POST['phone']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-4" id="email_div">
                        <div class="form-group">
                            <label for="email" class="control-label">Email Address</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="email" name="email"
                                    <?php if($_POST['email']) {echo "value='{$_POST['email']}'";} ?>
                                    >
                            </div>
                        </div>
                    </div>

                    <div class="col-4" id="refnumber_div">
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
                    <div class="col-12" id="detail_div">
                        <div class="form-group">
                            <label for="detail" class="control-label">Description of Complaint</label>
                            <textarea class="form-control" id="detail" name="detail"><?php if($_POST['detail']) {echo "{$_POST['detail']}";} ?></textarea>
                        </div>
                     </div>
                </div>
                
                <div class="row">
                    <div class="offset-2 col-8 pt-3">
                    <p>By providing your phone number, you consent to receive text messages from us at the number provided. Consent to receive marketing text messages is not required as a condition of purchasing any goods or services. Consent for friendly bill reminder notifications may be sent. Message frequency varies. Message and data rates may apply. Reply STOP to unsubscribe at any time.</p>
                    </div>
                </div>

                <div class="row">

                    <div class="col-12 pt-3" id="submit_div">
                    <button type="submit" class="btn btn-primary float-end">Submit</button>

                    </div>
                </div>
            </form>
        </div>
<?php } ?>

    </div>
    <?php include 'views/footer.php' ?>
</body>
<?php include 'views/scripts.php' ?>
</html>