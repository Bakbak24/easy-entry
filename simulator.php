<?php
include_once(__DIR__ . '/classes/User.php');

if (!empty($_POST)) {
    try {
        $user = new User();
        $user->setEmail($_POST['e-mail']);
        $user->setPassword($_POST['password']);
        $user->login();
        session_start();
        $_SESSION['user'] = $user;
        header('Location: index.php');
    } catch (Throwable $ex) {
        $error = $ex->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Enrty</title>
    <link rel="icon" type="image/x-icon" href="./images/icon.png">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once 'nav.php'; ?>
    <div id="content-simulator">
        <div class="theme-info" id="simulator-info">
            <h1>Start your immigration process with our simulator</h1>
            <p>
                With our simulator, you can explore your migration process to Belgium step by step. Answer questions on various aspects, such as your financial situation and housing, to better understand the requirements and possibilities for your immigration.
            </p>
            <p>
                This simulator serves as the first step in the process and helps us to follow and guide your immigration progress together with you. Please note that the results of the simulation are informational and do not constitute legal evidence. Ultimate decisions are made by immigration experts who take your individual situation into account.
            </p>
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