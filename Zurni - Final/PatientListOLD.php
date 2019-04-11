<!--Required php code for login process.-->
<?php session_start(); ?>
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

    <div class="container" style="margin-left: auto; margin-right: auto; width:600px;">
        <h3 style="text-align:center;">Patient List</h3>
        <?php 
            $conn = new mysqli("localhost","root","","Zurni");
            if ($conn->connect_error) die($conn->connect_error);
            $query  = "SELECT * FROM patient";
            $result = $conn->query($query);
            if (!$result) die ("Database access failed: " . $conn->error);
            $rows = $result->num_rows;
            for ($j = 0 ; $j < $rows ; ++$j)
              {
                echo '<div id="viewp" style="border-radius:10px; padding:10px; display:inline-block; margin:20px; width:150px; color:#57b750; text-align:center;"><img src="Media/User@2x.png" class="img-circle" style="border: solid 1px; width:80px; height:80px; margin-right:auto; margin-left:auto; display:block;"><br>';
                
                $result->data_seek($j);
                
                echo '<h4>'   . $result->fetch_assoc()['Name']   . '</h4><br><a href="#" style="color:white; background-color:#57b750; text-decoration: none; border-radius:5px; padding: 5px 25px 5px 25px;">View Profile</a></div>';
              }
         ?>
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
