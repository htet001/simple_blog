<?php
// session_start();
include_once "views/top.php";
include_once "views/nav.php";
// include_once "sysgem/Mysession.php";


if (isset($_POST['submit'])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $ret = registerUser($username, $email, $password);
    $message = "";
    switch ($ret) {
        case "Register Success!!":
            $message = "Register Success!!";
            setSession("username", "$username");
            setSession("email", "$email");

            if ($username == "htetsll" && $email == "htetshinelinn14@gmail.com") {
                header("Location:admin.php");
            } else {
                header("Location:simple_blog.php");
            }

            break;


        case "Email is already taken!!":
            $message = "Email is already taken!!";
            break;
        case "Register Fail!!":
            $message = "Register Fail!!";
            break;
        case "FAIL":
            $message = "Authentication Fail";
            break;
        default:
    }
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
" . $message . "
  </div>";
}

?>

<div class="container my-4">

    <div class="col-md-8 offset-md-2 table-bordered p-5">
        <h1 class="text-danger english text-center">Register To Be A Member</h1>
        <form action="Register.php" class="form" method="POST">
            <div class="form-group">
                <label for="name english">UserName</label>
                <input type="text" class="form-control english rounded-0" name="username" id="username">
            </div>
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
                <button class="btn btn-info" type="submit" name="submit" value="submit">Register</button>
            </div>
        </form>
    </div>

    <h1>Register</h1>
</div>

<?php include_once "views/footer.php";
include_once "views/base.php";
?>