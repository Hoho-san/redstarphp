<!-- This is main configuration File -->
<?php
ob_start();
session_start();
include("admin/inc/config.php");
include("admin/inc/functions.php");
include("admin/inc/CSRF_Protect.php");
$csrf = new CSRF_Protect();
$error_message = '';
$success_message = '';
$error_message1 = '';
$success_message1 = '';

// Checking the order table and removing the pending transaction that are 24 hours+ old. Very important
$current_date_time = date('Y-m-d H:i:s');
$statement = $pdo->prepare("SELECT * FROM tbl_payment WHERE payment_status=?");
$statement->execute(array('Pending'));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $ts1 = strtotime($row['payment_date']);
    $ts2 = strtotime($current_date_time);
    $diff = $ts2 - $ts1;
    $time = $diff / (3600);
    if ($time > 24) {

        // Return back the stock amount
        $statement1 = $pdo->prepare("SELECT * FROM tbl_order WHERE payment_id=?");
        $statement1->execute(array($row['payment_id']));
        $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result1 as $row1) {
            $statement2 = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
            $statement2->execute(array($row1['product_id']));
            $result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result2 as $row2) {
                $p_qty = $row2['p_qty'];
            }
            $final = $p_qty + $row1['quantity'];

            $statement = $pdo->prepare("UPDATE tbl_product SET p_qty=? WHERE p_id=?");
            $statement->execute(array($final, $row1['product_id']));
        }

        // Deleting data from table
        $statement1 = $pdo->prepare("DELETE FROM tbl_order WHERE payment_id=?");
        $statement1->execute(array($row['payment_id']));

        $statement1 = $pdo->prepare("DELETE FROM tbl_payment WHERE id=?");
        $statement1->execute(array($row['id']));
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <!-- Favicon -->
    <link rel="icon" href="assets/img/redstarLogo.svg">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/spacing.css">
    <link rel="stylesheet" href="assets/css/bootstrap-touch-slider.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/tree-menu.css">
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->

    <?php


    $cur_page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);



    if ($cur_page == 'about.php') {
    ?>
        <title>About - Redstar</title>

    <?php
    }
    if ($cur_page == 'faq.php') {
    ?>
        <title>FAQ - Redstar</title>

    <?php
    }
    if ($cur_page == 'contact.php') {
    ?>
        <title>Contact - Redstar</title>

    <?php
    }

    if ($cur_page == 'dashboard.php') {
    ?>
        <title>Dashboard - Red Star</title>
        <meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
        <meta name="description" content="<?php echo $meta_description_home; ?>">
    <?php
    }
    if ($cur_page == 'customer-profile-update.php') {
    ?>
        <title>Update Profile - Red Star</title>
        <meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
        <meta name="description" content="<?php echo $meta_description_home; ?>">
    <?php
    }
    if ($cur_page == 'customer-billing-shipping-update.php') {
    ?>
        <title>Update Billing and Shipping Info - Red Star</title>
        <meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
        <meta name="description" content="<?php echo $meta_description_home; ?>">
    <?php
    }
    if ($cur_page == 'customer-password-update.php') {
    ?>
        <title>Update Password - Red Star</title>
        <meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
        <meta name="description" content="<?php echo $meta_description_home; ?>">
    <?php
    }
    if ($cur_page == 'customer-order.php') {
    ?>
        <title>Orders - Red Star</title>
        <meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
        <meta name="description" content="<?php echo $meta_description_home; ?>">
    <?php
    } else {
    ?>
        <title>Red Star</title>
        <meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
        <meta name="description" content="<?php echo $meta_description_home; ?>">
    <?php
    }
    ?>

    <?php if ($cur_page == 'product.php') : ?>
        <meta property="og:title" content="<?php echo $og_title; ?>">
        <meta property="og:type" content="website">
        <meta property="og:url" content="<?php echo BASE_URL . $og_slug; ?>">
        <meta property="og:description" content="<?php echo $og_description; ?>">
        <meta property="og:image" content="assets/uploads/<?php echo $og_photo; ?>">
    <?php endif; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>


</head>

<body>
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="left">
                        <ul>
                            <li><i class="fa-solid fa-phone"></i> 0946 324 9117</li>
                            <li><i class="fa-solid fa-envelope"></i> redstar@email.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="right">
                        <ul>
                            <?php
                            $statement = $pdo->prepare("SELECT * FROM tbl_social");
                            $statement->execute();
                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($result as $row) {
                            ?>
                                <?php if ($row['social_url'] != '') : ?>
                                    <li><a href="<?php echo $row['social_url']; ?>" target="_blank"><i class="<?php echo $row['social_icon']; ?>"></i></a></li>
                                <?php endif; ?>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="header">
        <div class="container">
            <div class="row inner">
                <div class="col-md-4 logo">
                    <a href="index.php"><img src="assets/img/redstarLogo.svg" alt="logo image"></a>
                </div>

                <div class="col-md-5 right">
                    <ul>

                        <?php
                        if (isset($_SESSION['customer'])) {
                        ?>
                            <li><i class="fa fa-user"></i> <?php echo $_SESSION['customer']['cust_name']; ?></li>
                            <li><a href="dashboard.php"><i class="fa fa-home"></i> Account Settings</a></li>
                        <?php
                        } else {
                        ?>
                            <li><a href="login.php"><i class="fa fa-sign-in"></i> Login</a></li>
                            <li><a href="registration.php"><i class="fa fa-user-plus"></i> Register</a></li>
                        <?php
                        }
                        ?>

                        <li>
                            <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i> Cart
                                (
                                <?php
                                if (isset($_SESSION['cart_p_id'])) {
                                    $table_total_price = 0;
                                    $i = 0;
                                    foreach ($_SESSION['cart_p_qty'] as $key => $value) {
                                        $i++;
                                        $arr_cart_p_qty[$i] = $value;
                                    }
                                    $i = 0;
                                    foreach ($_SESSION['cart_p_current_price'] as $key => $value) {
                                        $i++;
                                        $arr_cart_p_current_price[$i] = $value;
                                    }
                                    for ($i = 1; $i <= count($arr_cart_p_qty); $i++) {
                                        $row_total_price = $arr_cart_p_current_price[$i] * $arr_cart_p_qty[$i];
                                        $table_total_price = $table_total_price + $row_total_price;
                                    }
                                    echo $table_total_price;
                                } else {
                                    echo '0.00';
                                }
                                ?> )</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 search-area">
                    <form class="navbar-form navbar-left" role="search" action="search-result.php" method="get">
                        <?php $csrf->echoInputField(); ?>
                        <div class="form-group">
                            <input type="text" class="form-control search-top" placeholder="Search here" name="search_text">
                        </div>
                        <button type="submit" class="btn btn-danger fa-solid fa-magnifying-glass"></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="nav">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pl_0 pr_0">
                    <div class="menu-container">
                        <div class="menu">
                            <ul>
                                <li><a class="fa-solid fa-house" href="index.php"> Home</a></li>
                                <li><a class="fa-regular fa-building" href="about.php"> About Us</a></li>
                                <li><a class="fa-solid fa-question" href="faq.php"> FAQ</a></li>
                                <li><a class="fa-regular fa-phone" href="contact.php"> Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>