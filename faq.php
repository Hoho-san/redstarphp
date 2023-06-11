<?php require_once('header.php'); ?>

<div class="page-banner" style="background: white;">
    <div class="inner">
        <h1 style="color: black">FAQ</h1>
    </div>
</div>

<div class="page" style="height: 55vh;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="faqAccordion">
                    <?php
                    $statement = $pdo->prepare("SELECT * FROM tbl_faq");
                    $statement->execute();
                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                    ?>
                        <div class="panel panel-default">
                            <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question<?php echo $row['faq_id']; ?>">
                                <h4 class="panel-title">
                                    Q: <?php echo $row['faq_title']; ?>
                                </h4>
                            </div>
                            <div id="question<?php echo $row['faq_id']; ?>" class="panel-collapse collapse" style="height: 0px;">
                                <div class="panel-body">
                                    <h5><span class="label label-primary">Answer</span></h5>
                                    <p>
                                        <?php echo $row['faq_content']; ?>
                                    </p>
                                </div>
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