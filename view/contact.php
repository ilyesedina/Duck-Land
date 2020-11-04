<?php
include_once 'login/header.php';
?>


<?php
    $message_sent = false;
    if(isset($_POST['email']) && $_POST['email'] != ''){
        //if we have an email entered
        if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
            //if the email is valid        
            //submit the form
            $userName = $_POST['name'];
            $userEmail = $_POST['email'];
            $messageSubject = $_POST['subject'];
            $message = $_POST['message'];

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
                </div>
            </div>
        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                <div class="card-body">
                    <p>Siøvej 3</p>
                    <p>6810 Esbjerg</p>
                    <p>Denmark</p>
                    <p>Email : info@duckland.com</p>
                    <p>Tel. +33 12 56 11 51 84</p>

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
                            <div class="form-group">
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
                            <div class="mx-auto">
                            <button type="submit" class="btn btn-primary text-right">Submit</button></div>
                        </form>
                    </div>
                </div>
            </div>
        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Address</div>
                <div class="card-body">
                    <p>Siøvej 3</p>
                    <p>6810 Esbjerg</p>
                    <p>Denmark</p>
                    <p>Email : info@duckland.com</p>
                    <p>Tel. +33 12 56 11 51 84</p>

                </div>

            </div>
        </div>
    </div>
    </form>
</div>

<?php
    endif;
    ?>

<br>



<!-- JS -->
<script src="//code.jquery.com/jquery-3.2.1.slim.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" type="text/javascript"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>
