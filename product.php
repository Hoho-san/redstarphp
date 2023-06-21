<?php require_once('header.php'); ?>

<?php
if (!isset($_REQUEST['id'])) {
    header('location: index.php');
    exit;
} else {
    // Check the id is valid or not
    $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
    $statement->execute(array($_REQUEST['id']));
    $total = $statement->rowCount();
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    if ($total == 0) {
        header('location: index.php');
        exit;
    }
}

foreach ($result as $row) {
    $p_name = $row['p_name'];
    $p_current_price = $row['p_current_price'];
    $p_qty = $row['p_qty'];
    $p_featured_photo = $row['p_featured_photo'];
    $p_description = $row['p_description'];
}

if (isset($_POST['form_add_to_cart'])) {

    // getting the currect stock of this product
    $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_id=?");
    $statement->execute(array($_REQUEST['id']));
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $row) {
        $current_p_qty = $row['p_qty'];
    }
    if ($_POST['p_qty'] > $current_p_qty) :
        $temp_msg = 'Sorry! There are only ' . $current_p_qty . ' item(s) in stock';
?>
        <script type="text/javascript">
            alert('<?php echo $temp_msg; ?>');
        </script>
<?php
    else :
        if (isset($_SESSION['cart_p_id'])) {
            $arr_cart_p_id = array();
            $arr_cart_p_qty = array();
            $arr_cart_p_current_price = array();

            $i = 0;
            foreach ($_SESSION['cart_p_id'] as $key => $value) {
                $i++;
                $arr_cart_p_id[$i] = $value;
            }
            $i = 0;

            for ($i = 1; $i <= count($arr_cart_p_id); $i++) {
                if ($arr_cart_p_id[$i] == $_REQUEST['id']) {
                    $added = 1;
                    break;
                }
            }
            if ($added == 1) {
                $error_message1 = 'This product is already added to the shopping cart.';
            } else {

                $i = 0;
                foreach ($_SESSION['cart_p_id'] as $key => $res) {
                    $i++;
                }
                $new_key = $i + 1;

                $_SESSION['cart_p_id'][$new_key] = $_REQUEST['id'];
                $_SESSION['cart_p_qty'][$new_key] = $_POST['p_qty'];
                $_SESSION['cart_p_current_price'][$new_key] = $_POST['p_current_price'];
                $_SESSION['cart_p_name'][$new_key] = $_POST['p_name'];
                $_SESSION['cart_p_featured_photo'][$new_key] = $_POST['p_featured_photo'];

                echo "<script>alert('Product Added Successfully'); </script>";
            }
        } else {
            $_SESSION['cart_p_id'][1] = $_REQUEST['id'];
            $_SESSION['cart_p_qty'][1] = $_POST['p_qty'];
            $_SESSION['cart_p_current_price'][1] = $_POST['p_current_price'];
            $_SESSION['cart_p_name'][1] = $_POST['p_name'];
            $_SESSION['cart_p_featured_photo'][1] = $_POST['p_featured_photo'];

            $success_message1 = 'Product is added to the cart successfully!';
        }
    endif;
}
?>

<?php
if ($success_message1 != '') {
    echo "<script>alert('" . $success_message1 . "')</script>";
    header('location: product.php?id=' . $_REQUEST['id']);
}
?>


<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product">
                    <div class="row">
                        <div class="col-md-5">
                            <ul class="prod-slider">
                                <li style="background-image: url(assets/uploads/<?php echo $p_featured_photo; ?>);">
                                    <a class="popup" href="assets/uploads/<?php echo $p_featured_photo; ?>"></a>
                                </li>
                                <?php
                                $statement = $pdo->prepare("SELECT * FROM tbl_product_photo WHERE p_id=?");
                                $statement->execute(array($_REQUEST['id']));
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $row) {
                                ?>
                                    <li style="background-image: url(assets/uploads/product_photos/<?php echo $row['photo']; ?>);">
                                        <a class="popup" href="assets/uploads/product_photos/<?php echo $row['photo']; ?>"></a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <div id="prod-pager">

                                <a data-slide-index="0" href="">
                                    <div class="prod-pager-thumb" style="background-image: url(assets/uploads/<?php echo $p_featured_photo; ?>"></div>
                                </a>
                                <?php
                                $i = 1;
                                $statement = $pdo->prepare("SELECT * FROM tbl_product_photo WHERE p_id=?");
                                $statement->execute(array($_REQUEST['id']));
                                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                                foreach ($result as $row) {
                                ?>
                                    <a data-slide-index="<?php echo $i; ?>" href="">
                                        <div class="prod-pager-thumb" style="background-image: url(assets/uploads/product_photos/<?php echo $row['photo']; ?>"></div>
                                    </a>
                                <?php
                                    $i++;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-7" style="margin: auto; width: 50%; border:3px solid black; padding: 10px;">
                            <div class="p-title">
                                <h2 style="font-size:30px; padding: 20px 0 20px"><?php echo $p_name; ?></h2>


                            </div>

                            <form action="" method="post">
                                <div class="p-price">
                                    <span style="font-size:20px;">Product Price : </span>

                                    <span>
                                        Php <?php echo $p_current_price; ?>
                                    </span>
                                </div>
                                <input type="hidden" name="p_current_price" value="<?php echo $p_current_price; ?>">
                                <input type="hidden" name="p_name" value="<?php echo $p_name; ?>">
                                <input type="hidden" name="p_featured_photo" value="<?php echo $p_featured_photo; ?>">
                                <div class="p-quantity">
                                    Quantity <br>
                                    <input type="number" class="input-text qty" step="1" min="1" max="" name="p_qty" value="1" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric">
                                </div>
                                <div class="btn-cart btn-cart1">
                                    <input style="border-radius: 1rem;" type="submit" value="Add to Cart" name="form_add_to_cart">
                                </div>
                            </form>
                            <div class="col-md-12">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Product Description</a></li>

                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="description" style="margin-top: -30px;">
                                        <p>
                                            <?php
                                            if ($p_description == '') {
                                                echo "No description";
                                            } else {
                                                echo $p_description;
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>
</div>



<?php require_once('footer.php'); ?>