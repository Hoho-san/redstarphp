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

<div class="page" style="height: 55vh;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php require_once('customer-sidebar.php'); ?>
            </div>
            <div class="col-md-12">
                <div class="user-content">
                    <h3>
                        Welcome to your dashboard, <?php echo $_SESSION['customer']['cust_name']; ?>
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>