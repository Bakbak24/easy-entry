<?php

include_once(__DIR__ . '/classes/User.php');

session_start();
if (isset($_SESSION['user'])) {
    $users = User::getAllData();
    $user_session = $_SESSION['user'];
    foreach ($users as $user) {
        if ($user['email'] == $_SESSION['user']->getEmail()) {
            $status = $user['status'];
            $name = $user['firstname'];
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
    <style>
        .container {
            width: 70%;
            height: auto;
            margin: 50px auto;
            position: relative;
            box-sizing: border-box;
        }

        .container h3 {
            margin: 0 0 5px 0;
        }

        .container ul {
            list-style: none;
            padding: 0;
            margin: 0;
            position: relative;
            display: block;
        }

        .container ul::after {
            content: "";
            position: absolute;
            width: 10px;
            height: calc(480px);
            left: 50%;
            top: 50px;
            transform: translateX(-50%);
            background-color: #F0F0F0;
            box-shadow: rgba(0, 0, 0, 0.06) 0px 2px 4px 0px inset;
        }

        .container ul li {
            width: 50%;
            height: auto;
            padding: 15px 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 1px 1px 15px rgba(0, 0, 0, 0.218);
            position: relative;
            margin-bottom: 30px;
            z-index: 99;
            box-sizing: border-box;
            /* Voeg dit toe om ervoor te zorgen dat padding binnen de breedte van het element valt */
        }

        .container ul li:nth-child(4) {
            margin-bottom: 0;
        }

        .container ul li .circle {
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background-color: #F0F0F0;
            top: 50px;
            display: grid;
            place-items: center;
            box-shadow: rgba(0, 0, 0, 0.06) 0px 2px 4px 0px inset;

        }

        .circle::after {
            content: attr(data-number);
            color: var(--dark-color);
            text-align: center;
            width: 30px;
            height: 30px;
            background-color: #FFFFFF;
            border-radius: 50%;
            border: 3px solid #009BD6;
        }


        ul li:nth-child(odd) .circle {
            transform: translate(50%, -50%);
            right: -30px;
        }

        ul li:nth-child(even) .circle {
            transform: translate(-50%, -50%);
            left: -30px;
        }

        .container ul li:nth-child(odd) {
            float: left;
            clear: right;
            text-align: right;
            transform: translateX(-30px);
        }

        .container ul li:nth-child(even) {
            float: right;
            clear: left;
            transform: translateX(30px);
        }

        .container ul li .heading {
            font-size: 17px;
            color: var(--dark-color);
        }

        .container ul li p {
            font-size: 13px;
            color: var(--dark-color);
            line-height: 18px;
            margin: 6px 0 10px 0;
        }

        .container ul li a {
            font-size: 13px;
            text-decoration: none;
            color: var(--dark-color);
            background-color: var(--white-color);
            border: 3px solid #009BD6;
            border-radius: 50px;
            padding: 5px 10px;
            transition: all 0.3s ease;
        }

        .container ul li .completed::after {
            background-color: #4CAF50;
            border-color: #4CAF50;
            color: var(--white-color);
        }

        .container button {
            font-size: 13px;
            text-decoration: none;
            color: var(--white-color);
            background-color: #0084B6;
            border-radius: 50px;
            padding: 5px 10px;
            transition: all 0.3s ease;
            border: none;
            font-family: var(--body-font);
            font-weight: 600;
            cursor: pointer;
        }

        .container .button-wrapper {
            display: flex;
            flex-direction: row-reverse;
            justify-content: space-between;
            align-items: center;
        }

        .container ul li:nth-child(even) .button-wrapper {
            flex-direction: row;
        }

        .container ul .hide-step2 {
            background-color: var(--light-color);
            box-shadow: none
        }

        .container ul .hide-step3 {
            background-color: var(--light-color);
            box-shadow: none
        }

        .hide-step2 .step2-gone {
            visibility: hidden;
        }

        .hide-step3 .step3-gone {
            visibility: hidden;
        }

        #simulation-section-tracker {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        @media only screen and (min-width: 798px) and (max-width: 1100px) {
            .container {
                width: 80%;
            }
        }

        @media only screen and (max-width: 798px) {
            .container {
                width: 70%;
                transform: translateX(20px);
            }

            .container ul::after {
                left: -40px;
                height: calc(600px);
            }

            .container ul li {
                width: 100%;
                float: none;
                clear: none;
                margin-bottom: 80px;
            }

            .container ul li .circle {
                left: -40px;
                transform: translate(-50%, -50%);
            }

            .container ul li .date {
                left: 20px;
            }

            .container ul li:nth-child(odd) {
                transform: translateX(0px);
                text-align: left;
            }

            .container ul li:nth-child(even) {
                transform: translateX(0px);
            }
        }

        @media only screen and (max-width: 550px) {
            .container {
                width: 80%;
            }

            .container ul::after {
                left: -30px;
            }

            .container ul li .circle {
                left: -30px;
            }



            #wrapper-tracker {
                padding: 0;
                width: 100%;
            }

            #wrapper-tracker h1 {
                padding: 0 20px;

            }
        }
    </style>

</head>

<body>
    <?php include_once 'nav.php'; ?>
    <div id="wrapper-tracker">


        <h1>My Tracker</h1>
        <div id="tracker-content">

            <?php if ($status == 'onbekend') { ?>
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
            <?php } else if ($status == "Finished") { ?>
                <section id="simulation-section-tracker">
                    <div id="simulation-content">
                        <div id="content">
                            <div id="content-details">
                                <h2>Immigration Process Completed</h2>
                                <p>
                                    Congratulations! You've completed your immigration process. For further information on migration in Belgium, browse our website.
                                </p>
                                <a href="index.php">
                                    <button type="button" id="simulation-btn">Home</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } else if (str_contains($status, "Student not enrolled")) { ?>
                <div class="container">
                    <ul>
                        <li>
                            <h3 class="heading">Study Flanders</h3>
                            <p>Ontdek hoe je je kunt inschrijven bij een school in België met behulp van Study Flanders. Deze website biedt waardevolle ondersteuning en begeleiding bij het inschrijvingsproces. Neem een kijkje op de Study Flanders-website voor meer informatie over hoe je je kunt aanmelden voor onderwijs in België. Zodra je klaar bent met deze stap, ga je verder naar de volgende stap in My Tracker.</p>
                            <div class="button-wrapper">
                                <button type="button" onclick="goToStep2()" id="step1">Next Step</button>
                                <a href="https://www.studyinflanders.be/">Study Flanders</a>
                            </div>
                            <span class="circle completed" data-number="1"></span>
                        </li>
                        <li class="hide-step2">
                            <div class="step2-gone">
                                <h3 class="heading">Scholarship</h3>
                                <p>Unlock opportunities for scholarships to support your education journey in Belgium. Explore various scholarship options and learn how they can assist you in achieving your academic goals. Find more information on available scholarships on our website. Once you've explored your scholarship options, proceed to the next step in My Tracker. </p>
                                <div class="button-wrapper">
                                    <button type="button" onclick="goToStep3()" id="step2">Next Step</button>
                                    <a href="scholarship.php">Scholarship</a>
                                </div>
                            </div>
                            <span class="circle" data-number="2"></span>
                        </li>
                        <li class="hide-step3">
                            <div class="step3-gone">
                                <h3 class="heading">Registration Municipality</h3>
                                <p>Ensure smooth integration into Belgium by registering with your municipality. Follow the required steps to register to make your immigration process easier. Find out more about the registration process on our website. Once you've completed this step, you've reached the final milestone in My Tracker, marking the successful completion of your migration</p>
                                <div class="button-wrapper">
                                    <a href="registration-municipality.php">Registration Municipality</a>
                                </div>
                            </div>
                            <span class="circle" data-number="3"></span>
                        </li>
                    </ul>
                </div>

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
<script>
    var step1Button = document.getElementById('step1');
    var step2Button = document.getElementById('step2');
    var step2gone = document.querySelector('.step2-gone'); // Selecteer de tweede stap
    var step3gone = document.querySelector('.step3-gone'); // Selecteer de derde stap
    var step2 = document.querySelector('.hide-step2'); // Selecteer de tweede stap
    var step3 = document.querySelector('.hide-step3'); // Selecteer de derde stap




    function goToStep2() {
        step1Button.style.display = 'none'; // Verberg de knop van stap 1
        step2gone.style.visibility = 'visible'; // Toon de tweede stap
        step2.style.backgroundColor = '#fff'; // Toon de tweede stap
        step2.style.boxShadow = '1px 1px 15px rgba(0, 0, 0, 0.218)'; // Toon de tweede stap
        document.querySelector('.circle[data-number="2"]').classList.add('completed');
    }

    function goToStep3() {
        step2Button.style.display = 'none'; // Verberg de knop van stap 2
        step3gone.style.visibility = 'visible'; // Toon de derde stap
        step3.style.backgroundColor = '#fff'; // Toon de derde stap
        step3.style.boxShadow = '1px 1px 15px rgba(0, 0, 0, 0.218)'; // Toon de derde stap
        document.querySelector('.circle[data-number="3"]').classList.add('completed');
        updateStatus("Finished");
    }

    function updateStatus(newStatus) {
        status = newStatus;
        // Stuur de status naar de server via AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update_status.php");
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.send(JSON.stringify({
            status: status
        }));
    }
</script>


</html>