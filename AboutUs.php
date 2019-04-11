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

    <div id="aboutuswrapper" class="container">
        <h3 id="about">About Us</h3>
        <h3 id="inside">Zurni - Help Patients Financially and Emotionally</h3>
        <p id="inside">The goal is to allow people to access the largest possible number of inpatients that require financial or emotional support.Thus, achieving religious, psychological, and social goals.</p>
        <p id="inside">We don't live in a perfect world, and there's never going to be a perfect time to give,but there are always people out there in need of help. Whether interest rates are rising, the economy is in the doldrums,or even if you're experiencing financial difficulties of your own, the reality is that when you donate your money.</p>
        <p id="inside">If you are nervous about starting with cash donations, get your feet wet by giving away some items that will affect on the patient emotionally around your home that you do not want anymore, such as toys, clothes, or furniture. Then, when you are in a position to give financially, take that step you are not only benefiting the well-being of those you give to, you are benefiting your own as well.</p>
        <p id="inside">All people of all ages can be part of donation, specifically those who are looking for doing charitable acts by helping patients financially and emotionally, patients who are in need of financial or emotional support, people whose work revolve around charity or medicine, and people who have the financial capability to help those in need or have the time to support patients through visitation and physical labor.</p>
        <p id="inside">Volunteering can have a real and valuable positive affect on people, communities and society in general. Volunteering can help you feel part of something outside your friends and family. Through volunteering you can challenge yourself to try something different, achieve personal goals, practice using your skills and discover hidden talents.</p>
        <h3 id="spon">Sponsors</h3>
        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:50%; height:150px; margin-left: auto; margin-right: auto;">

            <div class="carousel-inner">
                <div class="item active">
                    <img class="img-responsive center-block" src="Media/logo_whitebg.png" alt="">
                </div>

                <div class="item">
                    <img class="img-responsive center-block" src="Media/logo_whitebg.png" alt="">
                </div>

                <div class="item">
                    <img class="img-responsive center-block" src="Media/logo_whitebg.png" alt="">
                </div>

                <div class="item">
                    <img class="img-responsive center-block" src="Media/logo_whitebg.png" alt="">
                </div>

                <div class="item">
                    <img class="img-responsive center-block" src="Media/logo_whitebg.png" alt="">
                </div>
            </div>

            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <h3 id="donate">Donation</h3>
        <p id="inside">Donation help where the need is greatest. Patients are dying preventably in hospitals, so little help from each of us might change their entire life.
            Donate today so patients can live tomorrow. Your donation will play a significant role in helping us attain our goals at an accelerated pace. Every donation counts.</p>
        <h3 id="visit">Visitation</h3>
        <p id="inside">Zurni gives you a chance to give, even if you can not give with money you can visit the patients and support them. Visiting patients to suport them in the hospital seems simple enough, you go to the hospital, say hello, stay for a while talking with them and telling them kind words, and supportive words, then leave. It may seem simple, but it really isn't as simple as it may seem. Visiting the patient make huge changes on their emotions.</p>
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
