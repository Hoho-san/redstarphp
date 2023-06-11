<?php require_once('header.php'); ?>



<?php
if (!isset($_SESSION['cart_p_id'])) {
    header('location: cart.php');
    exit;
}
?>

<div class="page-banner">
    <div class="overlay"></div>
    <div class="page-banner-inner">
        <h1>Checkout</h1>
    </div>
</div>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex text-center">

                <?php if (!isset($_SESSION['customer'])) : ?>
                    <div>
                        <a href="login.php" class="btn btn-md btn-danger ">Please login to checkout</a>
                    </div>
                <?php else : ?>

                    <h3 class="special">Order Details</h3>
                    <div class="cart">
                        <table class="table table-responsive table-hover table-bordered text-center">
                            <tr>
                                <th>No.</th>
                                <th>Ebike</th>
                                <th>Ebike Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            <?php
                            $table_total_price = 0;

                            $i = 0;
                            foreach ($_SESSION['cart_p_id'] as $key => $value) {
                                $i++;
                                $arr_cart_p_id[$i] = $value;
                            }
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

                            $i = 0;
                            foreach ($_SESSION['cart_p_name'] as $key => $value) {
                                $i++;
                                $arr_cart_p_name[$i] = $value;
                            }

                            $i = 0;
                            foreach ($_SESSION['cart_p_featured_photo'] as $key => $value) {
                                $i++;
                                $arr_cart_p_featured_photo[$i] = $value;
                            }
                            ?>
                            <?php for ($i = 1; $i <= count($arr_cart_p_id); $i++) : ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td>
                                        <img src="assets/uploads/<?php echo $arr_cart_p_featured_photo[$i]; ?>" alt="">
                                    </td>
                                    <td><?php echo $arr_cart_p_name[$i]; ?></td>
                                    <td><?php echo $arr_cart_p_current_price[$i]; ?></td>
                                    <td><?php echo $arr_cart_p_qty[$i]; ?></td>
                                    <td class="text-right">
                                        <?php
                                        $row_total_price = $arr_cart_p_current_price[$i] * $arr_cart_p_qty[$i];
                                        $table_total_price = $table_total_price + $row_total_price;
                                        ?>
                                        <?php echo $row_total_price; ?>
                                    </td>
                                </tr>
                            <?php endfor; ?>
                            <tr>
                                <th colspan="5" class="total-text">Sub Total</th>
                                <th class="total-amount"><?php echo $table_total_price; ?></th>
                            </tr>
                            <tr>
                                <td colspan="5" class="total-text">Shipping Cost</td>
                                <td class="total-amount">FREE!!!</td>
                            </tr>
                            <tr>
                                <th colspan="5" class="total-text">Total</th>
                                <th class="total-amount">
                                    <?php
                                    $final_total = $table_total_price;
                                    ?>
                                    <?php echo $final_total; ?>
                                </th>
                            </tr>
                        </table>
                    </div>



                    <div class="shipping-address">
                        <div class="row">

                            <div class="col-md-6">
                                <h3 class="special">Shipping Address</h3>
                                <table class="table table-responsive table-bordered table-hover table-striped bill-address">
                                    <tr>
                                        <td>Full Name</td>
                                        <td><?php echo $_SESSION['customer']['cust_s_name']; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Number</td>
                                        <td><?php echo $_SESSION['customer']['cust_s_phone']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Province</td>
                                        <td><?php echo $_SESSION['customer']['cust_s_province']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>City</td>
                                        <td><?php echo $_SESSION['customer']['cust_s_city']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Barangay</td>
                                        <td><?php echo $_SESSION['customer']['cust_s_barangay']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>House no. / Street Name</td>
                                        <td><?php echo $_SESSION['customer']['cust_s_hnumber']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Zip Code</td>
                                        <td><?php echo $_SESSION['customer']['cust_s_zip']; ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>



                    <div class="cart-buttons">
                        <ul>
                            <li><a style="border-radius: 1rem;" href="cart.php" class="btn btn-primary"> <i class="fa fa-shopping-cart"></i> Cart</a></li>
                        </ul>
                    </div>

                    <div class="clear"></div>
                    <h3 class="special">Payment Section</h3>
                    <div class="row">

                        <?php
                        $checkout_access = 1;
                        if (
                            ($_SESSION['customer']['cust_s_name'] == '') ||
                            ($_SESSION['customer']['cust_s_phone'] == '') ||
                            ($_SESSION['customer']['cust_s_province'] == '') ||
                            ($_SESSION['customer']['cust_s_city'] == '') ||
                            ($_SESSION['customer']['cust_s_barangay'] == '') ||
                            ($_SESSION['customer']['cust_s_hnumber'] == '') ||
                            ($_SESSION['customer']['cust_s_zip'] == '')
                        ) {
                            $checkout_access = 0;
                        }
                        ?>
                        <?php if ($checkout_access == 0) : ?>
                            <div class="col-md-12">
                                <div style="color:red;font-size:22px;margin-bottom:50px;">
                                    You must have to fill up all the shipping information from your dashboard panel in order to checkout the order. Please fill up the information going to <a href="customer-billing-shipping-update.php" style="color:red;text-decoration:underline;">this link</a>.
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="col-md-12">
                                <div class="row" style="display:flex; align-items:center;">
                                    <div class="col-md-12 form-group">
                                        <label for="" style="font-size: larger;">Proceed Checkout *</label>
                                        <form action="payment/cod/init.php" method="post">
                                            <input type="hidden" name="amount" value="<?php echo $final_total; ?>">
                                            <br>
                                            <div class="col-md-12 form-group">
                                                <input type="submit" class="btn btn-primary" value="Place Order" name="form1" style="font-size: larger;">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>