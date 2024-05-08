<?php

include_once(__DIR__ . '/classes/User.php');

session_start();
if (isset($_SESSION['user'])) {
    $users = User::getAllData();
    $user_session = $_SESSION['user'];
    foreach ($users as $user) {
        if ($user['email'] == $_SESSION['user']->getEmail()) {
            $status = $user['status'];
        }
    }
} else {
    header("Location: register.php?message=<h3>You need to create an account before accessing the My Tracker page. <br>Please register to continue.</h3>");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Entry</title>
    <link rel="icon" type="image/x-icon" href="./images/icon.png">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once 'nav.php'; ?>
    <div id="wrapper-tracker">


        <h1>My Tracker</h1>
        <div id="tracker-content">

            <?php
            if ($status == 'onbekend') { ?>
                <section id="simulation-section-tracker">
                    <div id="simulation-content">
                        <div id="content">
                            <div id="content-image"></div>
                            <div id="content-details">
                                <h2>Unlock Your Tracker with Our Immigration Simulator</h2>
                                <p>
                                    Take the first step towards your immigration journey! Use our handy simulator
                                    to discover the best path for your situation. Answer a few questions and get
                                    personalized guidance.
                                </p>
                                <a href="simulator.php">
                                    <button type="button" id="simulation-btn">Start Now</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } else if ($status == "Not EEA") { ?>
                <section id="simulation-section-tracker">
                    <div id="simulation-content">
                        <div id="content">
                            <div id="content-details">
                                <h2>My Tracker Not Available</h2>
                                <p>
                                    Sorry, but this tracker is only intended for citizens of the European Economic Area (EEA). Since you indicated that you are not an EEA citizen, this tool is not suitable for your situation. Thank you for your interest.
                                </p>
                                <a href="index.php">
                                    <button type="button" id="simulation-btn">Home</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
        </div>
    </div>
    <footer>
        <div id="footer-content">
            <div id="about-us">
                <h2>About Us</h2>
                <p>
                    Welcome to Easy Entry, your guide through the immigration process to
                    Belgium. We are dedicated to providing simple and helpful support
                    for a smooth transition to your new home. At Easy Entry, we believe
                    in accessibility and guidance because we understand that immigrating
                    can be challenging. Together, let's take the first steps towards
                    your successful future in Belgium.
                </p>
            </div>
            <div id="themes">
                <h2>Theme's</h2>
                <ul>
                    <li><a href="#stay">Stay</a></li>
                    <li><a href="#money">Money</a></li>
                    <li><a href="#education">Education</a></li>
                </ul>
            </div>
            <div id="contact-us">
                <h2>Contact Info</h2>
                <p>+32 02 488 80 00</p>
                <p>Info@EasyEntry.com</p>
            </div>
            <div id="newsletter">
                <h2>Newsletter</h2>
                <p>Get the latest news and updates straight to your inbox.</p>
                <form id="newsletter-form">
                    <input type="email" name="email" id="email" placeholder="Enter your email" />
                    <button type="submit">Send</button>
                </form>
            </div>
        </div>
        <div id="copyright">© 2024 Easy Entry. All rights reserved.</div>
    </footer>
</body>
<script src="javascript/script.js">
</script>

</html>