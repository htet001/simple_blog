<?php

include_once "views/top.php";
?>

<div class="container my-4">
    <div class="row">
        <?php include_once "views/siderbar.php"; ?>
        <section class="col-md-9">
            <div class="row">

                <?php
                $result = "";
                if (checkSession("username")) {
                    $result = getFilterPost($_GET["sid"], 2);
                } else {
                    $result = getFilterPost($_GET["sid"], 1);
                }

                foreach ($result as $post) {
                    $pid = $post["id"];
                    echo '<div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5>' . substr($post["title"], 0, 30) . '</h5>
                                <p>' . substr($post["content"], 0, 150) . '</p>
                                <a href="details.php?pid=' . $pid . '" class="btn btn-info btn-sm float-right">Details</a>
                            </div>
                        </div>                   
                    </div>';
                }
                ?>


            </div>
        </section>
    </div>
    <h1>LogIn</h1>
</div>

<?php include_once "views/footer.php";
include_once "views/base.php";
?>