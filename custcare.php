<?php
 
require_once('./src/PHPMailer.php');
require_once('./src/Exception.php');

error_reporting(E_ALL);
ini_set('display_errors', True);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$success = false;

if($_POST) {
    $message = '';
    $valid=true;
    if(!isset($_POST['fname'])) {
        $message.= "First Name Required<br/>";
        $valid=false;
    }
    if(!isset($_POST['lname'])) {
        $message.= "Last Name Required<br/>";
        $valid=false;
    }
    if(!isset($_POST['addr1'])) {
        $message.= "Address Line 1 Required<br/>";
        $valid=false;
    }
    if(!isset($_POST['city'])) {
        $message.= "Address City Required<br/>";
        $valid=false;
    }
    if(!isset($_POST['state'])) {
        $message.= "Address State Required<br/>";
        $valid=false;
    }
    if(!isset($_POST['zipcode'])) {
        $message.= "Address Zip Code Required<br/>";
        $valid=false;
    }
    if(!isset($_POST['phone'])) {
        $message.= "Phone Number Required<br/>";
        $valid=false;
    }
    if(!isset($_POST['email'])) {
        $message.= "Email Address Required<br/>";
        $valid=false;
    }
    if(!isset($_POST['refnumber'])) {
        $message.= "Reference Number Required<br/>";
        $valid=false;
    }
    if(!isset($_POST['topic'])) {
        $message.= "Customer Care Topic Required<br/>";
        $valid=false;
    }
    if(!isset($_POST['lastfour']) && !isset($_POST['dateofbirth'])) {
        $message.= "Either Last Four of SSN or Date of Birth required<br/>";
        $valid=false;
    }

    if(!$valid) {
        $message.= "Please Add Required Fields";
        $success = false;
    } else {

        $to = "correspondence@fncbinc.com"; // this is your Email address
        //$to = 'rnader@dyn-it.com'; // Test Email Address
        $from = $_POST['email']; // this is the sender's Email address
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $subject = "Customer Care Form submission";
        $textmessage = "Customer Care Form Data: \n\n" .
        "First Name: {$_POST['fname']} \n".
        "Last Name: {$_POST['lname']} \n\n".
        "Address: \n" . 
        "{$_POST['addr1']} \n".
        (strlen(ltrim($_POST['addr2'])) > 1 ?"{$_POST['addr2']} \n":"").
        "{$_POST['city']}, {$_POST['state']}  {$_POST['zipcode']} \n\n".
        "Phone Number: {$_POST['phone']} \n".
        "Email Address: {$_POST['email']} \n".
        "Reference Number: {$_POST['refnumber']} \n".
        (isset($_POST['lastfour'])?"Last Four of SSN: {$_POST['lastfour']} \n":"") .
        (isset($_POST['dateofbirth'])?"Date Of Birth: {$_POST['dateofbirth']}  \n":"") .
        "Contact topic: {$_POST['topic']} \n\n".
        (isset($_POST['detail'])?
        "Message Details:\n{$_POST['detail']}":"") . "\n\n";
    
        $headers = "From:" . $from;

        /* new method  */
            $pemail = new PHPMailer();
            $pemail->SetFrom($from, "{$first_name} {$last_name}"); //Name is optional
            $pemail->Subject   = $subject;
            $pemail->Body      = $textmessage;
            $pemail->AddAddress( $to );
            if(isset($_SESSION['documents'])) {
                foreach ($_SESSION['documents'] as $index => $document) {
                    $pemail->AddAttachment( $document['pathname'] , $document['filename']);
                    $message.= "Document Attached: " . $document['filename'] . "<br/>";
                }
            }

            $pemail->Send();

            if(isset($_SESSION['documents'])) {
                foreach ($_SESSION['documents'] as $index => $document) {
                    unlink($document['pathname']);
                }
            }




        

        $message .= "Your Reqhest has been Received<br/>";
        $success = true;
        session_destroy();
    }
} else {
    $message = "Please call us toll free at <a href='tel:800-824-6191'>(800) 824-6191</a> or submit the following information. " . 
    "All information provided serves as express written consent to contact you in order to resolve this matter.".
    "<br><br>By submitting the form below, you certify that you are being truthful and that all information provided is accurate.";
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="frame-ancestors none">
    <title>First National Collections Bureau - Customer Care Form</title>
    <link rel="icon" type="image/icon" href="/images/fncb.ico">
    <meta name="description"
        content="First National Collections Bureau is a nationally licensed full service accounts receivable management firm. Helping consumers resolve debts for over 35 years." />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css?v=1">
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <style>
        #doc_uploader .input-group div, 
        #doc_uploader .input-group a {
            padding-top: 18px;  
        }
    </style>

</head>

<body>
    <div class="top-bar"  data-include="topbar"></div>
    <header  data-include="header"></header>
    <div class="mobile-nav " id="mobileNav" data-include="mobileNav"></div>

    <div class="container">
    <div class='section-one'>
    <center><h2>Message Contact Form</h2></center>
    <br><br>    
    <?=$message ?>

</div>

<?php if ($success) { ?>
<?php } else { ?>
        <div class='section-two'>
            <div class = 'row'>
                <div class = 'col-lg-12'>
            <form method='POST'>
                <div class="row">

                    <div class="col-lg-6" id="fname_div">
                        <div class="form-group">
                            <label for="fname" class="control-label">First Name</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="fname" name="fname"
                                    <?php if(isset($_POST['fname'])) {echo "value='{$_POST['fname']}'";} ?> 
                                >
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" id="lname_div">
                        <div class="form-group">
                            <label for="lname" class="control-label">Last Name</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="lname" name="lname"
                                    <?php if(isset($_POST['lname'])) {echo "value='{$_POST['lname']}'";} ?>
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
                                    <?php if(isset($_POST['addr1'])) {echo "value='{$_POST['addr1']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" id="addr2_div">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" type="text" id="addr2" name="addr2"
                                    <?php if(isset($_POST['addr2'])) {echo "value='{$_POST['addr2']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6" id="city_div">
                        <div class="form-group">
                            <label for="city" class="control-label">City</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="city" name="city"
                                    <?php if(isset($_POST['city'])) {echo "value='{$_POST['city']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2" id="state_div">
                        <div class="form-group">
                            <label for="state" class="control-label">ST</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="state" name="state"
                                    <?php if(isset($_POST['state'])) {echo "value='{$_POST['state']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" id="zipcode_div">
                        <div class="form-group">
                            <label for="zipcode" class="control-label">Zip Code</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="zipcode" name="zipcode"
                                    <?php if(isset($_POST['zipcode'])) {echo "value='{$_POST['zipcode']}'";} ?>
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
                                    <?php if(isset($_POST['phone'])) {echo "value='{$_POST['phone']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" id="email_div">
                        <div class="form-group">
                            <label for="email" class="control-label">Email Address</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="email" name="email"
                                    <?php if(isset($_POST['email'])) {echo "value='{$_POST['email']}'";} ?>
                                    >
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4" id="refnumber_div">
                        <div class="form-group">
                            <label for="refnumber" class="control-label">Reference Number</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="refnumber" name="refnumber"
                                    <?php if(isset($_POST['refnumber'])) {echo "value='{$_POST['refnumber']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="offset-lg-1 col-lg-10 justify-content-center" style='color:#002854;'>
                    <strong><em><span style='font-size:1.25em;'>
                        To be considered, please include one of the following:
                    </span></em></strong>
                    </div>
                </div>
                <div class="row border rounded" >
                <div class="offset-lg-1 col-lg-4" id="lastfour_div">
                        <div class="form-group">
                            <label for="lastfour" class="control-label">Last Four Digits of SSN</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="lastfour" name="lastfour"
                                    <?php if(isset($_POST['lastfour'])) {echo "value='{$_POST['lastfour']}'";} ?>
                                >
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 justify-content-center">
                    <strong><em>
                        <span style='font-size:1.25em; color:#002854'>-- OR --</span>
                    </em></strong>
                    </div>
                    <div class="col-lg-4" id="dateofbirth_div">
                        <div class="form-group">
                            <label for="dateofbirth" class="control-label">Date Of Birth</label>
                            <div class="input-group">
                                <input class="form-control" type="date" id="dateofbirth" name="dateofbirth"
                                    <?php if(isset($_POST['dateofbirth'])) {echo "value='{$_POST['dateofbirth']}'";} ?>
                                    >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12" id="topic_div">
                        <div class="form-group">
                            <label for="topic" class="control-label">Customer Care Message Topic</label>
                            <select class="form-control" name="topic" id="sel_topic">
                                <option selected disabled value=''>-- select one --</option>
                                <option <?php if(isset($_POST['topic'])) { if($_POST['topic'] == 'Payment Schedule Change') echo 'checked';} ?> value="Payment Schedule Change">I have a payment plan scheduled and need to make a change to the date, amount, or payment method.</option>
                                <option <?php if(isset($_POST['topic'])) { if($_POST['topic'] == 'Payment Options Request') echo 'checked';} ?> value="Payment Options Request">I want to see what my payment options are.</option>
                                <option <?php if(isset($_POST['topic'])) { if($_POST['topic'] == 'Portal Access Issue') echo 'checked';} ?> value="Portal Access Issue">I can’t see this account on the portal.</option>
                                <option <?php if(isset($_POST['topic'])) { if($_POST['topic'] == 'Contact Request') echo 'checked';} ?> value="Contact Request"> I want someone to call me to discuss this account.</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-lg-12" id="detail_div">
                        <div class="form-group">
                            <label for="detail" class="control-label">Message Detail</label>
                            <textarea class="form-control" id="detail" name="detail"><?php if(isset($_POST['detail'])) {echo "{$_POST['detail']}";} ?></textarea>
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
            <div class = 'col-lg-12'>
            <span class="file-name">Upload files before submitting form!</span>
            <form id='doc_uploader' enctype="multipart/form-data">
                <div class="upload-wrapper">
                <label for="file-upload">Browse</label>
        
                <input type="file" id="upload_document" name="uploadedFile">
                </div>
            </form>
            </div>
        </div>
    </div>
    <script>

    </script>


  <?php } ?>

    </div>

    <div class="footer" data-include="footer"></div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/js/plugins/piexif.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/js/plugins/sortable.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/js/fileinput.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.2.2/themes/fas/theme.min.js"></script>

    <script>
        function toggler(divId) {
            $("#" + divId).toggle();
        }
        $(function () {
            var includes = $('[data-include]')
            $.each(includes, function () {
            var file = 'views/' + $(this).data('include') + '.html'
            $(this).load(file)


            $("#upload_document").fileinput({
                bsVersion: "5.x",
                theme: "fas",
                maxFileCount: 4,
                uploadUrl: '/dispute_upload.php'
            });

        })
})
    </script>
</body>

</html>