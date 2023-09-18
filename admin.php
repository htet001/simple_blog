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
    $subject = $_POST["subject"];
    $file = $_FILES['file']; // array type


    $imglink = mt_rand(time(), time()) . "_" . $_FILES["file"]["name"] . mt_rand(time(), time());
    move_uploaded_file($_FILES['file']['tmp_name'], 'assests/uploads/' . $imglink);

    // echo "Post Title is " . $posttitle ."<br>";
    // echo "Post Type is " . $posttype ."<br>";
    // echo "Post Writer is " . $postwriter ."<br>";
    // echo "Post Content is " . $postcontent ."<br>";

    $bol = insertPost($posttitle, $posttype, $postwriter, $postcontent, $imglink, $subject);

    if ($bol) {
        echo "<div class='container my-5'> <div class='alert alert-warning alert-dismissible fade show' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
              </button>
    Post Successfully Inserted 
    </div></div>";
    } else {
        echo "<div class='container my-5'> <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
    Post Successfully Fail
    </div></div>";
    }
}

?>
<div class="container" my-4>
    <div class="row">
        <?php include_once "views/siderbar.php"; ?>
        <section class="col-md-9">
            <form method="POST" action="admin.php" enctype="multipart/form-data" class="mb-5 table-bordered p-5">
                <h3 class="text-center text-danger english mb-3">Post Insert Form</h3>
                <div class="form-group">
                    <label for="posttitle" class="english mb-3">Post Title</label>
                    <input type="text" class="form-control english" id="posttitle" name="posttitle">
                </div>
                <div class="form-group">
                    <label for="posttype" class="english mb-3">Post Type</label>
                    <select class="form-control mb-3" id="posttype" name="posttype">
                        <option value="1">Free Post</option>
                        <option value="2">Paid Post</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="posttype" class="english mb-3">Subjects</label>
                    <select class="form-control mb-3" id="subject" name="subject">

                        <?php
                        $subjects = getAllSubject();
                        foreach ($subjects as $subject) {
                            echo "<option value='" . $subject["id"] . "'>" . $subject["name"] . "</option>";
                        }
                        ?>

                    </select>
                </div>

                <div class="form-group">
                    <label for="postwriter" class="english mb-3">Post Writer</label>
                    <input type="text" class="form-control english" id="postwriter" name="postwriter">
                </div>

                <div class="form-group">
                    <label class="custom-file">
                        <input type="file" class="custom-file-input mb-3" name="file" multiple>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </label>
                </div>

                <div class="form-group">
                    <label for="postcontent" class="english mb-3">Content</label>
                    <textarea type="text" class="form-control" id="postcontent" rows="12" name="postcontent"></textarea>
                </div>
                <div class="row no-gutters justify-content-end">
                    <button class="btn btn-outline-primary mb-3">Cancel</button>
                    <button type="submit" name="submit" class="btn btn-primary">Post</button>
                </div>
            </form>
        </section>
    </div>
</div>
<?php include_once "views/footer.php";
include_once "views/base.php";
?>