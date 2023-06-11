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
    // update data into the database
    $statement = $pdo->prepare("UPDATE tbl_customer SET 
        cust_s_name=?, 
        cust_s_phone=?, 
        cust_s_province=?,
        cust_s_city=?, 
        cust_s_barangay=?, 
        cust_s_hnumber=?,
        cust_s_zip=?
        WHERE cust_id=?");
    $statement->execute(array(
        strip_tags($_POST['cust_s_name']),
        strip_tags($_POST['cust_s_phone']),
        strip_tags($_POST['cust_s_province']),
        strip_tags($_POST['cust_s_city']),
        strip_tags($_POST['cust_s_barangay']),
        strip_tags($_POST['cust_s_hnumber']),
        strip_tags($_POST['cust_s_zip']),
        $_SESSION['customer']['cust_id']
    ));

    $success_message = 'Shipping Address is updated successfully.';

    $_SESSION['customer']['cust_s_name'] = strip_tags($_POST['cust_s_name']);
    $_SESSION['customer']['cust_s_phone'] = strip_tags($_POST['cust_s_phone']);
    $_SESSION['customer']['cust_s_province'] = strip_tags($_POST['cust_s_province']);
    $_SESSION['customer']['cust_s_city'] = strip_tags($_POST['cust_s_city']);
    $_SESSION['customer']['cust_s_barangay'] = strip_tags($_POST['cust_s_barangay']);
    $_SESSION['customer']['cust_s_hnumber'] = strip_tags($_POST['cust_s_hnumber']);
    $_SESSION['customer']['cust_s_zip'] = strip_tags($_POST['cust_s_zip']);
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
                            <div class="col-md-6">
                                <h3>Update Shipping Address</h3>
                                <div class="form-group">
                                    <label for="">Full Name</label>
                                    <input type="text" class="form-control" name="cust_s_name" value="<?php echo $_SESSION['customer']['cust_s_name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Mobile No.</label>
                                    <input type="text" class="form-control" name="cust_s_phone" value="<?php echo $_SESSION['customer']['cust_s_phone']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Province</label>
                                    <input type="text" class="form-control" name="cust_s_province" value="<?php echo $_SESSION['customer']['cust_s_province']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">City</label>
                                    <input type="text" class="form-control" name="cust_s_city" value="<?php echo $_SESSION['customer']['cust_s_city']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Barangay</label>
                                    <input type="text" class="form-control" name="cust_s_barangay" value="<?php echo $_SESSION['customer']['cust_s_barangay']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">House No. / Street Name </label>
                                    <input type="text" class="form-control" name="cust_s_hnumber" value="<?php echo $_SESSION['customer']['cust_s_hnumber']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Zip Code</label>
                                    <input type="text" class="form-control" name="cust_s_zip" value="<?php echo $_SESSION['customer']['cust_s_zip']; ?>">
                                </div>
                                <div class="col-md-12 form-group mx-auto text-center">
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="Update" name="form1">
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