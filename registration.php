<?php require_once('header.php'); ?>

<?php
if (isset($_POST['form1'])) {

    $valid = 1;

    if (empty($_POST['cust_name'])) {
        $valid = 0;
        $error_message .= "Name can not be empty<br>";
    }

    if (empty($_POST['cust_email'])) {
        $valid = 0;
        $error_message .= "Email can not be empty<br>";
    } else {
        if (filter_var($_POST['cust_email'], FILTER_VALIDATE_EMAIL) === false) {
            $valid = 0;
            $error_message .= "Email address must be valid<br>";
        } else {
            $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_email=?");
            $statement->execute(array($_POST['cust_email']));
            $total = $statement->rowCount();
            if ($total) {
                $valid = 0;
                $error_message .= "Email address already exists<br>";
            }
        }
    }

    if (empty($_POST['cust_phone'])) {
        $valid = 0;
        $error_message .= "Phone number can not be empty<br>";
    }



    if (empty($_POST['cust_province'])) {
        $valid = 0;
        $error_message .= "Province can not be empty<br>";
    }

    if (empty($_POST['cust_city'])) {
        $valid = 0;
        $error_message .= "City can not be empty<br>";
    }

    if (empty($_POST['cust_barangay'])) {
        $valid = 0;
        $error_message .= "Barangay can not be empty<br>";
    }

    if (empty($_POST['cust_hnumber'])) {
        $valid = 0;
        $error_message .= "House number can not be empty<br>";
    }

    if (empty($_POST['cust_zip'])) {
        $valid = 0;
        $error_message .= "Zip code can not be empty<br>";
    }

    if (empty($_POST['cust_password']) || empty($_POST['cust_re_password'])) {
        $valid = 0;
        $error_message .= "Password field can not be empty<br>";
    }

    if (!empty($_POST['cust_password']) && !empty($_POST['cust_re_password'])) {
        if ($_POST['cust_password'] != $_POST['cust_re_password']) {
            $valid = 0;
            $error_message .= "Password does not match<br>";
        }
    }

    if ($valid == 1) {

        $token = md5(time());
        $cust_datetime = date('Y-m-d h:i:s');
        $cust_timestamp = time();

        // saving into the database
        $statement = $pdo->prepare("INSERT INTO tbl_customer (
                                        cust_name,
                                        cust_email,
                                        cust_phone,
                                        cust_province,
                                        cust_city,
                                        cust_barangay,
                                        cust_hnumber,
                                        cust_zip,
                                        cust_s_name,
                                        cust_s_cname,
                                        cust_s_phone,
                                        cust_s_province,
                                        cust_s_city,
                                        cust_s_barangay,
                                        cust_s_hnumber,
                                        cust_s_zip,
                                        cust_password,
                                        cust_token,
                                        cust_datetime,
                                        cust_timestamp
                                      
                                    ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $statement->execute(array(
            strip_tags($_POST['cust_name']),
            strip_tags($_POST['cust_email']),
            strip_tags($_POST['cust_phone']),
            strip_tags($_POST['cust_province']),
            strip_tags($_POST['cust_city']),
            strip_tags($_POST['cust_barangay']),
            strip_tags($_POST['cust_hnumber']),
            strip_tags($_POST['cust_zip']),
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            '',
            md5($_POST['cust_password']),
            $token,
            $cust_datetime,
            $cust_timestamp

        ));
        //notify success message
        echo "<script type='text/javascript'>alert('Registered succecfully, please log in');</script>";
        //redirect to login page
        echo "<script type='text/javascript'>window.location.href = 'login.php';</script>";
    }
}
?>

<div class="page-banner">
    <div>
        <h1 style="color: black;">Registration Page</h1>
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
                            <div class="col-md-10">
                                <?php
                                if ($error_message != '') {
                                    echo "<div class='error' style='padding: 10px;background:#f1f1f1;margin-bottom:20px;'>" . $error_message . "</div>";
                                }
                                if ($success_message != '') {
                                    echo "<div class='success' style='padding: 10px;background:#f1f1f1;margin-bottom:20px;'>" . $success_message . "</div>";
                                }
                                ?>

                                <div class="col-md-6 form-group">
                                    <span>Full Name *</span>
                                    <input type="text" class="form-control" name="cust_name" value="<?php if (isset($_POST['cust_name'])) {
                                                                                                        echo $_POST['cust_name'];
                                                                                                    } ?>">
                                </div>

                                <div class="col-md-6 form-group">
                                    <span>Email *</span>
                                    <input type="email" class="form-control" name="cust_email" value="<?php if (isset($_POST['cust_email'])) {
                                                                                                            echo $_POST['cust_email'];
                                                                                                        } ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <span>Mobile No. *</span>
                                    <input type="text" class="form-control" name="cust_phone" value="<?php if (isset($_POST['cust_phone'])) {
                                                                                                            echo $_POST['cust_phone'];
                                                                                                        } ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <span>Province *</span>
                                    <input type="text" class="form-control" name="cust_province" value="<?php if (isset($_POST['cust_province'])) {
                                                                                                            echo $_POST['cust_province'];
                                                                                                        } ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <span for="">City *</span>
                                    <input type="text" class="form-control" name="cust_city" value="<?php if (isset($_POST['cust_city'])) {
                                                                                                        echo $_POST['cust_city'];
                                                                                                    } ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <span>Barangay *</span>
                                    <input type="text" class="form-control" name="cust_barangay" value="<?php if (isset($_POST['cust_barangay'])) {
                                                                                                            echo $_POST['cust_barangay'];
                                                                                                        } ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <span for="">House No./ Street Name *</span>
                                    <input type="text" class="form-control" name="cust_hnumber" value="<?php if (isset($_POST['cust_hnumber'])) {
                                                                                                            echo $_POST['cust_hnumber'];
                                                                                                        } ?>">
                                </div>

                                <div class="col-md-6 form-group">
                                    <span>Zip Code*</span>
                                    <input type="text" class="form-control" name="cust_zip" value="<?php if (isset($_POST['cust_zip'])) {
                                                                                                        echo $_POST['cust_zip'];
                                                                                                    } ?>">
                                </div>
                                <div class="col-md-6 form-group">
                                    <span>Password *</span>
                                    <input type="password" class="form-control" name="cust_password">
                                </div>
                                <div class="col-md-6 form-group">
                                    <span>Retype Password *</span>
                                    <input type="password" class="form-control" name="cust_re_password">
                                </div>
                                <div class="col-md-12 form-group mx-auto text-center">
                                    <br>
                                    <input type="submit" class="btn btn-danger" value="Register" name="form1">
                                </div>
                            </div>
                            <br>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>