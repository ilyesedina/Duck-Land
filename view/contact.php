<?php
include_once 'login/header.php';
include ("login/includes/DBController.php");
$edit = new DBController();
$postalcode = $edit->runQuery("SELECT * FROM company JOIN postalcode ON company.postalCodee = postalcode.PostalCodeID");
//session_regenerate_id();
?>
<?php 
define('SITE_KEY', '6Ld-MeMZAAAAAPsXCpNWDOW-FUVhQaum0LO9ZCO9');
define('SECRET_KEY', '6Ld-MeMZAAAAACVrQgLaeO69RAUud8ZYaUrHB8vz');
?>
<script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>"></script>

<?php
    $message_sent = false;
   /*  if(isset($_POST['submit'])) {
        if($_SESSION["captcha_test"] ==$_POST['captcha']){
            echo 'Matched';
        }
        else{
            echo 'Please enter a valid captcha code.';
        }
    } */
    if(isset($_POST['submit'])){ 
        function getCaptcha($SecretKey){
            $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}");
            $Return = json_decode($Response);
            return $Return;
        }
        $Return = getCaptcha($_POST['g-recaptcha-response']);
         if($Return->success == true && $Return->score > 0.5){
            
        }else{
            echo "reCAPTCHA failed!";
            return;
        } 
  
    if(isset($_POST['email']) && $_POST['email'] != ''){
        //if we have an email entered
        if($_SESSION["captcha_test"] ==$_POST['captcha']){
            echo 'Matched';
        if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
            //if the email is valid        
            //submit the form
            $userName = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
            $userEmail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $messageSubject = filter_var($_POST['subject'], FILTER_SANITIZE_SPECIAL_CHARS);
            $message = filter_var($_POST['message'], FILTER_SANITIZE_SPECIAL_CHARS);
            $captcha = filter_var($_POST['captcha'], FILTER_SANITIZE_SPECIAL_CHARS);

            $session_captcha = $_SESSION['captcha_test'];

            $to = "edin0407@easv365.dk";
            $body = "";

            $body .= "From: ".$userName. "\r\n";
            $body .= "Email: ".$userEmail. "\r\n";
            $body .= "Message: ".$message. "\r\n";

            mail($to,$messageSubject,$body);  
            
            $message_sent = true;
        }
       // if($message > 2) {
       // $message_sent = true;}
        else{
            $invalid_class_name = "form-invalid";
        }
    }
    else{
        echo 'Please enter a valid captcha code.';
    }
    }
};
?>


<br>

<?php 
    if($message_sent):
    ?>
        <div class="container">
    <form action="contact.php" method="POST" class="form">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Contact us.
                    </div>
                    <div class="card-body">
                    <h3>Thanks, we'll be in touch</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" id="name"
                                name="name" placeholder="Enter your name here" tabindex="1" required>
                            </div>
                            <div class="form-group ">
                                <input type="email" class="form-control" <?= $invalid_class_name ?? "" ?> id="email"
                                name="email" placeholder="Email" tabindex="2" required>
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject"
                                name="subject" placeholder="Subject" tabindex="3" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="message" rows="6"
                                name="message" placeholder="Enter Message..." tabindex="4" required></textarea>
                            </div>
                            <tr class="tablerow">
                                <p><img src="login/includes/captcha.php" alt="captcha image" name="captcha" ></p>
                                <input name="captcha" id="captcha" type="text"
                                    class="demo-input captcha-input">
                                 <br> </br>
                            </tr>   
                            <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" />
                            <div class="mx-auto">
                            <button type="submit" name ="submit" class="btn btn-primary text-right">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
                   

        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> About the company</div>
                <div class="card-body">

                    <p> <b>CompanyName:</b>     <?php echo $postalcode[0]["CompanyName"];?></p>
                    <p> <b>Dscription:</b>     <?php echo $postalcode[0]["dscription"];?></p>
                    <p> <b>Email: </b>   <?php echo $postalcode[0]["email"];?></p>
                    <p> <b>Phone Number: </b>   <?php echo $postalcode[0]["phoneNumber"];?></p>
                    <p> <b>Postalcodee: </b>    <?php echo $postalcode[0]["postalCodee"];?></p>
                    <p> <b>City:</b>    <?php echo $postalcode[0]["city"];?></p>

                </div>

            </div>
        </div>
    </div>
    </form>
</div>

    <?php 
    else:
        ?>


<div class="container">
    <form action="contact.php" method="POST" class="form">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Contact us.
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" id="name"
                                name="name" placeholder="Enter your name here" tabindex="1" required>
                            </div>
                            <div class="form-group ">
                                <input type="email" class="form-control" <?= $invalid_class_name ?? "" ?> id="email"
                                name="email" placeholder="Email" tabindex="2" required>
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject"
                                name="subject" placeholder="Subject" tabindex="3" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="message" rows="6"
                                name="message" placeholder="Enter Message..." tabindex="4" required></textarea>
                            </div>
                            <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" />
                          
                            <tr class="tablerow">
                                <p><img src="login/includes/captcha.php" alt="captcha image" name="captcha" ></p>
                                <input name="captcha" id="captcha"type="text" placeholder="Type captcha..."
                                    class="demo-input captcha-input">
                                 <br> </br>
                            </tr>   

                                 <div class="mx-auto">
                            <button type="submit" name ="submit" class="btn btn-primary text-right">Submit</button></div>
                            
                        </form>
                    </div>
                </div>
            </div>
        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> About the company</div>
                <div class="card-body">
                    <p> <b>CompanyName:</b>     <?php echo $postalcode[0]["CompanyName"];?></p>
                    <p> <b>Dscription:</b>     <?php echo $postalcode[0]["dscription"];?></p>
                    <p> <b>Email: </b>   <?php echo $postalcode[0]["email"];?></p>
                    <p> <b>Phone Number: </b>   <?php echo $postalcode[0]["phoneNumber"];?></p>
                    <p> <b>Postalcodee: </b>    <?php echo $postalcode[0]["postalCodee"];?></p>
                    <p> <b>City:</b>    <?php echo $postalcode[0]["city"];?></p>
                </div>

            </div>
        </div>
    </div>
    </form>
        <script>
        grecaptcha.ready(function() {
        grecaptcha.execute('<?php echo SITE_KEY; ?>', {action: 'homepage'}).then(function(token) {
            //console.log(token);
            document.getElementById('g-recaptcha-response').value=token;
        });
        });
    </script>
</div>

<?php
    endif;
    ?>

<br>


<?php
include_once 'login/footer.php';
?>

</body>

</html>

