<?php
include_once "views/top.php";



if (isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $ret = loginUser($email, $password);
    $message = "";
    switch ($ret) {
        case "Login Success!!":
            $message = "Login Success!!";

            if (getSession("username") === "htetsll" && getSession("email") === "htetshinelinn14@gmail.com") {
                header("Location:admin.php");
            } else {
                header("Location:simple_blog.php");
            }
            break;

        case "Login Fail!!":
            $message = "Login Fail!!";
            break;
        case "Auth Fail!!":
            $message = "Auth Fail!!";
            break;
        default:
            break;
    }
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
" . $message . "
  </div>";
}


?>

<div class="container my-4">

    <div class="col-md-8 offset-md-2 table-bordered p-5">
        <h1 class="text-danger english text-center">Login To See Special Posts</h1>
        <form action="login.php" class="form" method="post">
            <div class="form-group">
                <label for="email english">Email</label>
                <input type="text" class="form-control english rounded-0" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="password english">Password</label>
                <input type="password" class="form-control english rounded-0" name="password" id="password">
            </div>
            <p></p>
            <div class="row  justy-content-center">
                <button class="btn btn-info" type="submit" name="submit" value="submit">Login</button>
            </div>
        </form>
    </div>

    <h1>Login</h1>
</div>

<?php include_once "views/footer.php";
include_once "views/base.php";
?>