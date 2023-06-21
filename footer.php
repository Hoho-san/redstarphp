<section class="home-newsletter">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="single">
                    <?php
                    if (isset($_POST['form_subscribe'])) {

                        if (empty($_POST['email_subscribe'])) {
                            $valid = 0;
                            $error_message1 .= "Email address can not be empty.";
                        } else {
                            if (filter_var($_POST['email_subscribe'], FILTER_VALIDATE_EMAIL) === false) {
                                $valid = 0;
                                $error_message1 .= "Invalid email address.";
                            } else {
                                $statement = $pdo->prepare("SELECT * FROM tbl_subscriber WHERE subs_email=?");
                                $statement->execute(array($_POST['email_subscribe']));
                                $total = $statement->rowCount();
                                if ($total) {
                                    $valid = 0;
                                    $error_message1 .= "You have already subscribed.";
                                } else {
                                    // Sending email to the requested subscriber for email confirmation
                                    // Getting activation key to send via email. also it will be saved to database until user click on the activation link.
                                    $key = md5(uniqid(rand(), true));

                                    // Getting current date
                                    $current_date = date('Y-m-d');

                                    // Getting current date and time
                                    $current_date_time = date('Y-m-d H:i:s');

                                    // Inserting data into the database
                                    $statement = $pdo->prepare("INSERT INTO tbl_subscriber (subs_email,subs_date,subs_date_time,subs_hash) VALUES (?,?,?,?)");
                                    $statement->execute(array($_POST['email_subscribe'], $current_date, $current_date_time, $key));

                                    $success_message1 = "You have successfully subscribed";
                                }
                            }
                        }
                    }
                    if ($error_message1 != '') {
                        echo "<script>alert('" . $error_message1 . "')</script>";
                    }
                    if ($success_message1 != '') {
                        echo "<script>alert('" . $success_message1 . "')</script>";
                    }
                    ?>
                    <form action="" method="post">
                        <?php $csrf->echoInputField(); ?>
                        <h2>Subscribe to stay updated on our latest product</h2>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter a valid email address" name="email_subscribe">
                            <span class="input-group-btn">
                                <button class="btn btn-theme" type="submit" name="form_subscribe">Subscribe now</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
</section>





<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 copyright">
                <p>&copy; <?php echo date('Y'); ?> Copyright Redstar - Developed By <a href="https://github.com/Hoho-san" target="_blank" style="text-decoration: none; font-weight:bold;">Our Team</a> </p>

            </div>
        </div>
        
    </div>
</div>


<a href="#" class="scrollup">
    <i class="fa fa-angle-up"></i>
</a>



<script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="https://js.stripe.com/v2/"></script>
<script src="assets/js/megamenu.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/owl.animate.js"></script>
<script src="assets/js/jquery.bxslider.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/rating.js"></script>
<script src="assets/js/jquery.touchSwipe.min.js"></script>
<script src="assets/js/bootstrap-touch-slider.js"></script>
<script src="assets/js/select2.full.min.js"></script>
<script src="assets/js/custom.js"></script>

 <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>

</body>

</html>