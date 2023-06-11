<?php require_once('header.php'); ?>

<!-- login form -->
<?php
if (isset($_POST['form1'])) {

    if (empty($_POST['cust_email']) || empty($_POST['cust_password'])) {
        $error_message = 'please enter your email address';
    } else {

        $cust_email = strip_tags($_POST['cust_email']);
        $cust_password = strip_tags($_POST['cust_password']);

        $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_email=?");
        $statement->execute(array($cust_email));
        $total = $statement->rowCount();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {

            $row_password = $row['cust_password'];
        }

        if ($total == 0) {
            $error_message .= 'Email Address does not match.<br> Please try again.';
        } else {
            //using MD5 form
            if ($row_password != md5($cust_password)) {
                $error_message .= 'Password does not match.<br> Please try again.';
            } else {
                $_SESSION['customer'] = $row;
                header("location: " . BASE_URL . "dashboard.php");
            }
        }
    }
}
?>

<div class="page-banner">
    <div class="inner">
        <h1 style="color: black">Login Page</h1>
    </div>
</div>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="user-content">
                    <form action="" method="post">
                        <?php $csrf->echoInputField(); ?>

                        <div class="row">
                            <div class="col-md-4"> </div>
                            <div class="col-md-4">
                                <?php
                                if ($error_message != '') {
                                    echo "<div class='error' style='padding: 10px;background:#f1f1f1;margin-bottom:20px;'>" . $error_message . "</div>";
                                }
                                if ($success_message != '') {
                                    echo "<div class='success' style='padding: 10px;background:#f1f1f1;margin-bottom:20px;'>" . $success_message . "</div>";
                                }
                                ?>
                                <div class="form-group">
                                    <span>Email *</span>
                                    <input type="email" class="form-control" name="cust_email" placeholder="@email.com">
                                </div>
                                <div class="form-group">
                                    <span>Password *</span>
                                    <input type="password" class="form-control" name="cust_password" placeholder="******">
                                </div>
                                <div class="form-group text-center">
                                    <br>
                                    <input type="submit" class="btn btn-success" value="Enter" name="form1">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>