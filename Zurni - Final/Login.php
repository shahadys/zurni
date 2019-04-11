<!--Required php code for login process.-->
<?php
$conn = new mysqli('localhost', 'root', '', 'Zurni');

if($conn === false){
		die("ERROR: Could not connect. " . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);
$sql = "SELECT * FROM donator WHERE username = '$username' and password = '$password'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
}
?>
<!--Required php code for login process.-->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Bootstrap Required Links-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!--Bootstrap Required Links-->
</head>

<body>

    <!--From here the nav code starts.-->
    <nav id="navbar" class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="Index.php">Zurni</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="Index.php">Home</a></li>
                <li><a href="PatientList.php">Patient List</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
            </ul>
            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    $_SESSION['loggedin'] = true;
                    echo "<ul class=\"nav navbar-nav navbar-right\">
                    <li><a href=\"Logout.php\" style=\"color:white;\"><span class=\"glyphicon glyphicon-log-in\"></span>Logout</a></li>
                    </ul>";
                } else {
                    echo "<ul class=\"nav navbar-nav navbar-right\">
                    <li><a href=\"SignUp.php\" style=\"color:white;\"><span class=\"glyphicon glyphicon-user\"></span> Sign Up</a></li>
                    <li><a href=\"Login.php\" style=\"color:white;\"><span class=\"glyphicon glyphicon-log-in\"></span> Login</a></li>
                    </ul>";
                }
            ?>
        </div>
    </nav>
    <!--Until here the nav code ends.-->

    <!--From here the content code starts.-->

    <div class="well wrapper" style="margin-left:auto; margin-right:auto; width:500px; margin-bottom:300px;">
        <h3>Login</h3>
        <h6>Please fill in your information</h6>
        <form id="loginform" method="post" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Username: </label>
            <input type="text" id="username" placeholder="Enter username" name="username" class="form-control">
            <label for="pwd">Password: </label>
            <input id="pwd" name="password" placeholder="Enter password" type="password" name="password" class="form-control">
            <p id="sp">Don't have an account? <a href="SignUp.php">Sign Up</a></p>
            <button id="submit" class="btn btn-success btn-block">Sign In</button>
            <?php if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($count == 1) {
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $_POST['username']; // store username
    $_SESSION['password'] = $_POST['password']; // store password

    header('location: index.php');
} else {
    echo $error = "Invalid Username or Password Please Try Again";
}
}
?>
        </form>
    </div>

    <!--Until here the content code ends.-->

    <!--From here the footer/contact us code starts.-->
    <footer>
        <table>
            <tr>
                <td class="col">
                    <h4>Contact Us</h4>
                    <p>
                        <b>Phone:</b> 011 888 4444<br>
                        <b>Address:</b> Takhasussi xxx<br>
                        <b>Email:</b> xxx@zurni.com
                    </p>
                </td>
                <td class="col">
                    <h4>Follow Us</h4>
                    <img src="Media/58e9196deb97430e819064f6.png"> Zurni_tweet<br>
                    <img src="Media/social-instagram-new-circle-512.png"> Zurni_ig<br>
                    <img src="Media/facebook_circle-512.png"> Zurni_fb
                </td>
                <td class="col">
                    <h4>Mailing List</h4>
                    <p>Sign up for our mailing list to receive updates about any upcoming events!</p>
                    <form method="post" action="">
                        <input type="text" placeholder="  Your email address...">
                        <input type="submit">
                    </form>
                    <!--Add javascript function that updates the email table and alerts the user with bootstrap alert for successful subscription in action attribute of this form!-->
                </td>
                <td class="col">
                    <h4>Services</h4>
                    <li><a href="AboutUs.html">Home</a></li>
                    <li><a href="AboutUs.html#donate">Donation</a></li>
                    <li><a href="AboutUs.html#visit">Visitation</a></li>
                    <li><a href="AboutUs.html#spon">Sponsors</a></li>
                    <li><a href="AboutUs.html#about">About Us</a></li>
                </td>
                <td class="col">
                    <h4>Location</h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14494.92687186604!2d46.7013209!3d24.7360891!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3fbc5cb308e60dd8!2z2KzYp9mF2LnYqSDYp9mE2KfZhdmK2LEg2LPZhNi32KfZhg!5e0!3m2!1sar!2ssa!4v1554901015910!5m2!1sar!2ssa" width="200" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                </td>
            </tr>
        </table>
    </footer>
    <!--Until here the footer/contact us code ends.-->
      
</body>

</html>
