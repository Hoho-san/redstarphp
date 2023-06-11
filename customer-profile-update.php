<?php require_once('header.php'); ?>

<?php
// Check if the customer is logged in or not
if (!isset($_SESSION['customer'])) {
    header('location: ' . BASE_URL . 'logout.php');
    exit;
} else {
    // If customer is logged in, but admin make him inactive, then force logout this user.
    $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_id=?");
    $total = $statement->rowCount();
    if ($total) {
        header('location: ' . BASE_URL . 'logout.php');
        exit;
    }
}
?>

<?php
if (isset($_POST['form1'])) {

    $valid = 1;

    if (empty($_POST['cust_name'])) {
        $valid = 0;
    }

    if (empty($_POST['cust_phone'])) {
        $valid = 0;
    }

    if (empty($_POST['cust_province'])) {
        $valid = 0;
    }

    if (empty($_POST['cust_city'])) {
        $valid = 0;
    }

    if (empty($_POST['cust_barangay'])) {
        $valid = 0;
    }

    if (empty($_POST['cust_hnumber'])) {
        $valid = 0;
    }

    if (empty($_POST['cust_zip'])) {
        $valid = 0;
    }

    if ($valid == 1) {

        // update data into the database
        $statement = $pdo->prepare("UPDATE tbl_customer SET cust_name=?, cust_cname=?, cust_phone=?, cust_province=?, cust_city=?, cust_barangay=?, cust_hnumber=?, cust_zip=? WHERE cust_id=?");
        $statement->execute(array(
            strip_tags($_POST['cust_name']),
            strip_tags($_POST['cust_phone']),
            strip_tags($_POST['cust_province']),
            strip_tags($_POST['cust_city']),
            strip_tags($_POST['cust_barangay']),
            strip_tags($_POST['cust_hnumber']),
            strip_tags($_POST['cust_zip']),
            $_SESSION['customer']['cust_id']
        ));
        $success_message = 'Profile is updated successfully.';
        $_SESSION['customer']['cust_name'] = $_POST['cust_name'];
        $_SESSION['customer']['cust_phone'] = $_POST['cust_phone'];
        $_SESSION['customer']['cust_province'] = $_POST['cust_province'];
        $_SESSION['customer']['cust_city'] = $_POST['cust_city'];
        $_SESSION['customer']['cust_barangay'] = $_POST['cust_barangay'];
        $_SESSION['customer']['cust_hnumber'] = $_POST['cust_hnumber'];
        $_SESSION['customer']['cust_zip'] = $_POST['cust_zip'];
    }
}
?>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php require_once('customer-sidebar.php'); ?>
            </div>
            <div class="col-md-12">
                <div class="user-content">
                    <h3>
                        Update Profile
                    </h3>
                    <?php
                    if ($error_message != '') {
                        echo "<div class='error' style='padding: 10px;background:#f1f1f1;margin-bottom:20px;'>" . $error_message . "</div>";
                    }
                    if ($success_message != '') {
                        echo "<div class='success' style='padding: 10px;background:#f1f1f1;margin-bottom:20px;'>" . $success_message . "</div>";
                    }
                    ?>
                    <form action="" method="post">
                        <?php $csrf->echoInputField(); ?>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="">Full Name *</label>
                                <input type="text" class="form-control" name="cust_name" value="<?php echo $_SESSION['customer']['cust_name']; ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">email *</label>
                                <input type="text" class="form-control" name="" value="<?php echo $_SESSION['customer']['cust_email']; ?>" disabled>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Mobile Number *</label>
                                <input type="text" class="form-control" name="cust_phone" value="<?php echo $_SESSION['customer']['cust_phone']; ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Province *</label>
                                <input type="text" class="form-control" name="cust_province" value="<?php echo $_SESSION['customer']['cust_province']; ?>">
                            </div>


                            <div class="col-md-6 form-group">
                                <label for="">City *</label>
                                <input type="text" class="form-control" name="cust_city" value="<?php echo $_SESSION['customer']['cust_city']; ?>">
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="">Barangay *</label>
                                <input type="text" class="form-control" name="cust_barangay" value="<?php echo $_SESSION['customer']['cust_barangay']; ?>">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="">House Number *</label>
                                <input type="text" class="form-control" name="cust_hnumber" value="<?php echo $_SESSION['customer']['cust_hnumber']; ?>">
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="">Zip Code *</label>
                                <input type="text" class="form-control" name="cust_zip" value="<?php echo $_SESSION['customer']['cust_zip']; ?>">
                            </div>
                            <div class="col-md-12 form-group mx-auto text-center">
                                <br>
                                <input type="submit" class="btn btn-primary" value="Update" name="form1">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>