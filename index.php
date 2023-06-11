<?php require_once('header.php'); ?>

<div id="bootstrap-touch-slider" class="carousel bs-slider fade control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="false">

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        $i = 0;
        $statement = $pdo->prepare("SELECT * FROM tbl_slider");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
        ?>
            <li data-target="#bootstrap-touch-slider" data-slide-to="<?php echo $i; ?>" <?php if ($i == 0) {
                                                                                            echo 'class="active"';
                                                                                        } ?>></li>
        <?php
            $i++;
        }
        ?>
    </ol>

    <!-- Wrapper For Slides -->
    <div class="carousel-inner" role="listbox">
        <?php
        $i = 0;
        $statement = $pdo->prepare("SELECT * FROM tbl_slider");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
        ?>
            <div class="item <?php if ($i == 0) {
                                    echo 'active';
                                } ?>" style="background-image:url(assets/uploads/<?php echo $row['photo']; ?>);">
                <div class="bs-slider-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="slide-text <?php if ($row['position'] == 'Left') {
                                                    echo 'slide_style_left';
                                                } elseif ($row['position'] == 'Center') {
                                                    echo 'slide_style_center';
                                                } elseif ($row['position'] == 'Right') {
                                                    echo 'slide_style_right';
                                                } ?>">
                            <h1 data-animation="animated <?php if ($row['position'] == 'Left') {
                                                                echo 'zoomInLeft';
                                                            } elseif ($row['position'] == 'Center') {
                                                                echo 'flipInX';
                                                            } elseif ($row['position'] == 'Right') {
                                                                echo 'zoomInRight';
                                                            } ?>"><?php echo $row['heading']; ?></h1>
                            <p data-animation="animated <?php if ($row['position'] == 'Left') {
                                                            echo 'fadeInLeft';
                                                        } elseif ($row['position'] == 'Center') {
                                                            echo 'fadeInDown';
                                                        } elseif ($row['position'] == 'Right') {
                                                            echo 'fadeInRight';
                                                        } ?>"><?php echo nl2br($row['content']); ?></p>

                        </div>
                    </div>
                </div>
            </div>
        <?php
            $i++;
        }
        ?>
    </div>

    <!-- Slider Left Control -->
    <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
        <span class="fa fa-angle-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <!-- Slider Right Control -->
    <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
        <span class="fa fa-angle-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



<div class="service bg-gray">
    <div class="container">
        <div class="row">
            <?php
            $statement = $pdo->prepare("SELECT * FROM tbl_service");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row) {
            ?>
                <div class="col-md-4">
                    <div class="item">
                        <div class="photo"><img src="assets/uploads/<?php echo $row['photo']; ?>" width="150px" alt="<?php echo $row['title']; ?>"></div>
                        <h3><?php echo $row['title']; ?></h3>
                        <p>
                            <?php echo nl2br($row['content']); ?>
                        </p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>


<!-- Featured Product Start here -->


<div class="product pt_70 pb_70" id="#products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="headline">
                    <h2>Red Star Ebike</h2>
                    <h3>Our list on Top Featured Products</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="product-carousel">
                    <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_featured=?");
                    $statement->execute(array(1));
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                    ?>
                        <div class="item">
                            <div class="thumb">
                                <div class="photo" style="background-image:url(assets/uploads/<?php echo $row['p_featured_photo']; ?>);"></div>
                                <div class="overlay"></div>
                            </div>
                            <div class="text">
                                <h3><a href="product.php?id=<?php echo $row['p_id']; ?>"><?php echo $row['p_name']; ?></a></h3>
                                <h4>
                                    Php <?php echo $row['p_current_price']; ?>

                                </h4>
                                <?php if ($row['p_qty'] == 0) : ?>
                                    <div class="out-of-stock">
                                        <div class="inner">
                                            Out Of Stock
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <p><a href="product.php?id=<?php echo $row['p_id']; ?>" style="border-radius: 1rem;"><i class="fa fa-shopping-cart"></i> Add to Cart</a></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>