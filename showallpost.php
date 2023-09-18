<?php
include_once "views/top.php";

include_once "views/header.php";


if (checkSession("username")) {
    if (getSession("username")  != "htetsll") {
        header("Location:simple_blog.php");
    }
} else {
    header("Location:simple_blog.php");
}
if (isset($_POST['submit'])) {
    $posttitle = $_POST["posttitle"];
    $posttype = $_POST["posttype"];
    $postwriter = $_POST["postwriter"];
    $postcontent = $_POST["postcontent"];

    $imglink = move_uploaded_file($_FILES['files']['tmp_name'], 'assests/uploads/' . $_FILES['files']['name']);
    // echo "Post Title is " . $posttitle ."<br>";
    // echo "Post Type is " . $posttype ."<br>";
    // echo "Post Writer is " . $postwriter ."<br>";
    // echo "Post Content is " . $postcontent ."<br>";

    $bol = insertPost($posttitle, $posttype, $postwriter, $postcontent, $imglink, $subject);
    if ($bol) {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
Post Successfully Inserted
  </div>";
    } else {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
Post Inserted Fail
  </div>";
    }
}

?>
<div class="container" my-4>
    <div class="row">
        <?php include_once "views/siderbar.php"; ?>
        <section class="col-md-9">

            <?php
            $result = getAllPost(1, 2);
            foreach ($result as $post) {
                echo '<div class="card my-4">
                      <div class="card-block">
                      <h5>' . $post["title"] . '</h5>
                      <p>' . substr($post["content"], 0, 100) . '</p>
                      <a href="postedit.php?pid=' . $post["id"] . '" class="btn btn-info "">Edit</a>
                      </div>
                </div>';
            }

            ?>
        </section>
    </div>
</div>
<?php include_once "views/footer.php";
include_once "views/base.php";
?>