<?php

include_once(__DIR__ . '/classes/User.php');
include_once(__DIR__ . '/classes/Progress.php');


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







$totalSteps = 0;
$currentStep = 0;

if ($status == 'onbekend') {
    $totalSteps = 0;
} else if ($status == "Not EEA") {
    $totalSteps = 0;
} else if ($status == "Finished") {
    $totalSteps = 0;
} else if (str_contains($status, "Student not enrolled") || str_contains($status, "Job Seeker")) {
    $totalSteps = 3;
} else if (str_contains($status, "Student no scholarship") || str_contains($status, "No House") || str_contains($status, "Municipality")) {
    $totalSteps = 2;
} else if (str_contains($status, "Student-municipality")) {
    $totalSteps = 1;
}

if (str_contains($status, "1")) {
    $currentStep = 1;
} else if (str_contains($status, "2")) {
    $currentStep = 2;
} else if (str_contains($status, "3")) {
    $currentStep = 3;
} else if (str_contains($status, "4")) {
    $currentStep = 4;
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

        .container h1 {
            margin: 0px;
        }

        .container h3 {
            margin: 0px 0px 5px 0px;
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
            left: 50%;
            top: 50px;
            transform: translateX(-50%);
            background-color: #F0F0F0;
            box-shadow: rgba(0, 0, 0, 0.06) 0px 2px 4px 0px inset;
        }

        .steps3 ul::after {
            height: 480px;
        }

        .steps3-half ul::after {
            height: 620px;
        }

        .steps2 ul::after {
            height: 260px;
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
            text-align: center;
        }

        .Student-municipality a {
            text-decoration: none;
            color: var(--dark-color);
            border: 3px solid #009BD6;
            border-radius: 50px;
            padding: 5px 10px;
            transition: all 0.3s ease;
            text-align: center;
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

        .Student-municipality button {
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

        .Student-municipality .button-wrapper {
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

        .tracker-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            margin: 20px 0;
        }

        .tracker-info {
            font-size: 1.5rem;
            color: var(--dark-color);
        }

        .qr-code {
            /* Voeg hier stijlen toe voor de QR-code container */
            margin-top: 20px;
            text-align: center;
        }

        .qr-code img {
            /* Voeg hier stijlen toe voor de QR-code afbeelding */
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        .progress-container {
            position: relative;
            width: 90%;
            margin-bottom: 10px;
        }

        progress {
            width: 90%;
            height: 15px;
            appearance: none;
            -webkit-appearance: none;
            border: none;
            background-color: #f5f5f5;
            border-radius: 20px;
        }

        progress::-webkit-progress-bar {
            background-color: #f5f5f5;
            border-radius: 10px;
        }

        progress::-webkit-progress-value {
            background-color: #007bff;
            border-radius: 10px;
        }

        /* Stijl voor de voortgangsbalk met een aangepaste achtergrondkleur */
        progress.green-progress::-webkit-progress-value {
            background-color: green;
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

        @media only screen and (max-width: 1220px) {
            .steps3 ul::after {
                height: 560px;
            }

            .steps3-half ul::after {
                height: 640px;
            }

            .steps2 ul::after {
                height: 260px;
            }
        }

        @media only screen and (max-width: 880px) {
            .steps3 ul::after {
                height: 620px;
            }

            .steps3-half ul::after {
                height: 700px;
            }

            .steps2 ul::after {
                height: 320px;
            }
        }

        @media only screen and (max-width: 625px) {
            .steps3 ul::after {
                height: 100vh;
            }

            .steps3-half ul::after {
                height: 100vh;
            }

            .steps2 ul::after {
                height: 50vh;
            }
        }
    </style>

</head>

<body>
    <div class="gtranslate_wrapper">
        <?php include_once 'nav.php'; ?>
        <div id="wrapper-tracker">

            <?php
            if ($status != 'onbekend' && $status != 'Not EEA') {
            ?>

                <div class="tracker-container">
                    <h1>My Tracker</h1>
                    <div class="tracker-info">
                        <?php
                        if ($status == "Finished" || str_contains($status, "Student not enrolled4") || str_contains($status, "Student no scholarship3") || str_contains($status, "Job Seeker4") || str_contains($status, "No House3") || str_contains($status, "Municipality3")) {
                        ?>

                        <?php
                        } else if (str_contains($status, "Student not enrolled") || str_contains($status, "Student no scholarship") || str_contains($status, "Job Seeker") || str_contains($status, "No House") || str_contains($status, "Municipality")) {
                            echo "Stap $currentStep/$totalSteps";
                        }
                        ?>
                    </div>
                </div>

            <?php
            }
            ?>
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
                <?php } else if ($status == "Finished" || str_contains($status, "Student not enrolled4") || str_contains($status, "Student no scholarship3") || str_contains($status, "Student-municipality2") || str_contains($status, "No House3") || str_contains($status, "Municipality3")) { ?>
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
                <?php } else if (str_contains($status, "Student not enrolled")) {
                    $progress = new Progress();
                    $progress->setNaam('studietoelage');
                    $progress2 = new Progress();
                    $progress2->setNaam('gemeente');
                    $status = $progress->getStatusFromName($progress->getNaam());
                    $status2 = $progress2->getStatusFromName($progress2->getNaam());
                ?>
                    <div class="container steps3">
                        <ul>
                            <li>
                                <h3 class="heading">Study Flanders</h3>
                                <p>Find out how to register at a school in Belgium using Study Flanders. This website provides valuable support and guidance through the registration process. Take a look at the Study Flanders website for more information on how to apply for education in Belgium. Once you're done with this step, move on to the next step in My Tracker.</p>
                                <div class="button-wrapper">
                                    <?php
                                    if ($currentStep == 1) { ?>
                                        <button type="button" onclick="goToStep2()" id="step1">Next Step</button>
                                    <?php } ?>
                                    <a href="https://www.studyinflanders.be/">Study Flanders</a>
                                </div>
                                <span class="circle completed" data-number="1"></span>
                            </li>
                            <li <?php
                                if ($currentStep == 1) {
                                    echo 'class="hide-step2"';
                                } else {
                                    echo 'class=""';
                                }
                                ?>>
                                <div <?php
                                        if ($currentStep == 1) {
                                            echo 'class="step2-gone"';
                                        } else {
                                            echo 'class=""';
                                        }
                                        ?>>
                                    <h3 class="heading">Scholarship</h3>
                                    <p>Unlock opportunities for scholarships to support your education journey in Belgium. Explore various scholarship options and learn how they can assist you in achieving your academic goals. Find more information on available scholarships on our website. Once you've explored your scholarship options, proceed to the next step in My Tracker. </p>
                                    <?php
                                    if ($status[0]['status'] == 0) {
                                    ?>
                                        <div class="progress-container">
                                            <progress id="file" value="20" max="100"> 20% </progress>
                                        </div>
                                        <div class="button-wrapper">
                                            <label for="file">Process is ongoing</label>
                                        <?php } else { ?>
                                            <div class="progress-container">
                                                <progress id="file" value="100" max="100" class="green-progress"> 100% </progress>
                                            </div>
                                            <div class="button-wrapper">
                                                <button type="button" onclick="goToStep3()" id="step2">Next Step</button>
                                            <?php } ?>
                                            <a href="scholarship.php">Scholarship</a>
                                            </div>
                                        </div>
                                        <span <?php
                                                if ($currentStep >= 2) {
                                                    echo 'class="circle completed"';
                                                } else {
                                                    echo 'class="circle"';
                                                }
                                                ?> data-number="2"></span>
                            </li>
                            <li <?php
                                if ($currentStep <= 2) {
                                    echo 'class="hide-step3"';
                                } else {
                                    echo 'class=""';
                                }
                                ?>>
                                <div <?php
                                        if ($currentStep <= 2) {
                                            echo 'class="step3-gone"';
                                        } else {
                                            echo 'class=""';
                                        }
                                        ?>>
                                    <h3 class="heading">Registration Municipality</h3>
                                    <p>Ensure smooth integration into Belgium by registering with your municipality. Follow the required steps to register to make your immigration process easier. Find out more about the registration process on our website. Once you've completed this step, you've reached the final milestone in My Tracker, marking the successful completion of your migration</p>
                                    <?php if ($status2[0]['status'] == 2) { ?>
                                        <div class="progress-container">
                                            <progress id="file" value="100" max="100" class="green-progress"> 100% </progress>
                                        </div>
                                        <div class="button-wrapper">
                                            <button type="button" onclick="goToStep4()" id="step3">Finish</button>
                                            <label for="file">Retrieve your ID</label>
                                        </div>
                                    <?php } else if ($status2[0]['status'] == 0) { ?>
                                        <div class="progress-container">
                                            <progress id="file" value="5" max="100"> 5% </progress>
                                        </div>
                                        <div class="button-wrapper">
                                            <a href="registration-municipality.php">Registration Municipality</a>
                                            <label for="file">Process not started</label>
                                        </div>
                                    <?php } else { ?>
                                        <div class="progress-container">
                                            <progress id="file" value="20" max="100"> 20% </progress>
                                        </div>
                                        <div class="button-wrapper">
                                            <a href="registration-municipality.php">Registration Municipality</a>
                                            <label for="file">Process is ongoing</label>
                                        </div>
                                    <?php } ?>

                                </div>

                                <span <?php
                                        if ($currentStep == 3) {
                                            echo 'class="circle completed"';
                                        } else {
                                            echo 'class="circle"';
                                        }
                                        ?> data-number="3"></span>
                            </li>
                        </ul>
                    </div>

                <?php } else if (str_contains($status, "Student no scholarship")) {
                    $progress = new Progress();
                    $progress->setNaam('studietoelage');
                    $progress2 = new Progress();
                    $progress2->setNaam('gemeente');
                    $status = $progress->getStatusFromName($progress->getNaam());
                    $status2 = $progress2->getStatusFromName($progress2->getNaam());
                ?>
                    <div class="container steps2">
                        <ul>
                            <li>
                                <h3 class="heading">Scholarship</h3>
                                <p>Unlock opportunities for scholarships to support your education journey in Belgium. Explore various scholarship options and learn how they can assist you in achieving your academic goals. Find more information on available scholarships on our website. Once you've explored your scholarship options, proceed to the next step in My Tracker. </p>
                                <?php
                                if ($status[0]['status'] == 0) {
                                ?>
                                    <div class="progress-container">
                                        <progress id="file" value="20" max="100"> 20% </progress>
                                    </div>
                                    <div class="button-wrapper">
                                        <label for="file">Process is ongoing</label>
                                    <?php } else { ?>
                                        <div class="progress-container">
                                            <progress id="file" value="100" max="100" class="green-progress"> 100% </progress>
                                        </div>
                                        <div class="button-wrapper">
                                            <button type="button" onclick="goToStep2()" id="step1">Next Step</button>
                                        <?php } ?>
                                        <a href="scholarship.php">Scholarship</a>
                                        </div>
                                        <span class="circle completed" data-number="1"></span>
                            </li>
                            <li <?php
                                if ($currentStep <= 1) {
                                    echo 'class="hide-step2"';
                                } else {
                                    echo 'class=""';
                                }
                                ?>>
                                <div <?php
                                        if ($currentStep <= 1) {
                                            echo 'class="step2-gone"';
                                        } else {
                                            echo 'class=""';
                                        }
                                        ?>>
                                    <h3 class="heading">Registration Municipality</h3>
                                    <p>Ensure smooth integration into Belgium by registering with your municipality. Follow the required steps to register to make your immigration process easier. Find out more about the registration process on our website. Once you've completed this step, you've reached the final milestone in My Tracker, marking the successful completion of your migration</p>
                                    <?php if ($status2[0]['status'] == 2) { ?>
                                        <div class="progress-container">
                                            <progress id="file" value="100" max="100" class="green-progress"> 100% </progress>
                                        </div>
                                        <div class="button-wrapper">
                                            <label for="file" style="color:black;">Retrieve your ID</label>
                                            <button type="button" onclick="goToStep3()" id="step2">Finish</button>
                                        </div>
                                    <?php } else if ($status2[0]['status'] == 0) { ?>
                                        <div class="progress-container">
                                            <progress id="file" value="5" max="100"> 5% </progress>
                                        </div>
                                        <div class="button-wrapper">
                                            <label for="file" style="color:black;">Process not started</label>
                                            <a href="registration-municipality.php">Registration Municipality</a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="progress-container">
                                            <progress id="file" value="20" max="100"> 20% </progress>
                                        </div>
                                        <div class="button-wrapper">
                                            <label for="file" style="color:black;">Process is ongoing</label>
                                            <a href="registration-municipality.php">Registration Municipality</a>
                                        </div>
                                    <?php } ?>
                                </div>

                                <span <?php
                                        if ($currentStep == 2) {
                                            echo 'class="circle completed"';
                                        } else {
                                            echo 'class="circle"';
                                        }
                                        ?> data-number="2"></span>
                            </li>
                        </ul>
                    </div>

                <?php } else if (str_contains($status, "Student-municipality")) {
                    $progress = new Progress();
                    $progress->setNaam('gemeente');
                    $status = $progress->getStatusFromName($progress->getNaam());
                ?>
                    <section id="simulation-section-tracker" class="Student-municipality">
                        <div id="simulation-content">
                            <div id="content">
                                <div id="content-details">
                                    <h2>Registration Municipality</h2>
                                    <p>Ensure smooth integration into Belgium by registering with your municipality. Follow the required steps to register to make your immigration process easier. Find out more about the registration process on our website. Once you've completed this step, you've reached the final milestone in My Tracker, marking the successful completion of your migration</p>
                                    <?php if ($status[0]['status'] == 2) { ?>
                                        <div class="progress-container">
                                            <progress id="file" value="100" max="100" class="green-progress"> 100% </progress>
                                        </div>
                                        <label for="file" style="color:black;">Retrieve your ID</label>
                                        <div class="button-wrapper">
                                            <button type="button" onclick="goToStep2()" id="step2">Finish</button>
                                        </div>
                                    <?php } else if ($status[0]['status'] == 0) { ?>
                                        <div class="progress-container">
                                            <progress id="file" value="5" max="100"> 5% </progress>
                                        </div>
                                        <label for="file" style="color:black;">Process not started</label>
                                        <div class="button-wrapper">
                                            <a href="registration-municipality.php">Registration Municipality</a>
                                        </div>
                                    <?php } else { ?>
                                        <div class="progress-container">
                                            <progress id="file" value="20" max="100"> 20% </progress>
                                        </div>
                                        <label for="file" style="color:black;">Process is ongoing</label>
                                        <div class="button-wrapper">
                                            <a href="registration-municipality.php">Registration Municipality</a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                    </section>
                <?php } else if (str_contains($status, "Job Seeker")) {
                    $progress = new Progress();
                    $progress->setNaam('huisvesting');
                    $progress2 = new Progress();
                    $progress2->setNaam('gemeente');
                    $status = $progress->getStatusFromName($progress->getNaam());
                    $status2 = $progress2->getStatusFromName($progress2->getNaam());
                ?>
                    <div class="container steps3">
                        <ul>
                            <li>
                                <h3 class="heading">Settling in Belgium</h3>
                                <p>Find comprehensive assistance on settling in Belgium at our website. Explore valuable resources tailored to your needs, covering accommodation, healthcare, legal requirements, and more. Prepare yourself for a seamless transition into Belgian society with our support. Visit the website now to access the help you need.</p>
                                <div class="button-wrapper">
                                    <?php
                                    if ($currentStep == 1) { ?>
                                        <button type="button" onclick="goToStep2()" id="step1">Next Step</button>
                                    <?php } ?>
                                    <a href="https://settlinginbelgium.be/en/work-and-retirement/looking-for-work-in-belgium">Settling in Belgium</a>
                                </div>
                                <span class="circle completed" data-number="1"></span>
                            </li>
                            <li <?php
                                if ($currentStep == 1) {
                                    echo 'class="hide-step2"';
                                } else {
                                    echo 'class=""';
                                }
                                ?>>
                                <div <?php
                                        if ($currentStep == 1) {
                                            echo 'class="step2-gone"';
                                        } else {
                                            echo 'class=""';
                                        }
                                        ?>>
                                    <h3 class="heading">Accommodation</h3>
                                    <p>Discover housing options to support your relocation to Belgium. Explore various accommodation choices, including apartments and shared housing, to find the best fit for your needs. Learn how to secure housing and understand your rental rights and responsibilities. For more detailed information and assistance, visit our website. Once you've found suitable accommodation, proceed to the next step in My Tracker.</p>
                                    <?php
                                    if ($status[0]['status'] == 0) {
                                    ?>
                                        <div class="progress-container">
                                            <progress id="file" value="20" max="100"> 20% </progress>
                                        </div>
                                        <div class="button-wrapper">
                                            <label for="file">Process is ongoing</label>
                                        <?php } else { ?>
                                            <div class="progress-container">
                                                <progress id="file" value="100" max="100" class="green-progress"> 100% </progress>
                                            </div>
                                            <div class="button-wrapper">
                                                <button type="button" onclick="goToStep3()" id="step2">Next Step</button>
                                            <?php } ?>
                                            <a href="accommodation.php">Accommodation</a>
                                            </div>
                                        </div>
                                        <span <?php
                                                if ($currentStep >= 2) {
                                                    echo 'class="circle completed"';
                                                } else {
                                                    echo 'class="circle"';
                                                }
                                                ?> data-number="2"></span>
                            </li>
                            <li <?php
                                if ($currentStep <= 2) {
                                    echo 'class="hide-step3"';
                                } else {
                                    echo 'class=""';
                                }
                                ?>>
                                <div <?php
                                        if ($currentStep <= 2) {
                                            echo 'class="step3-gone"';
                                        } else {
                                            echo 'class=""';
                                        }
                                        ?>>
                                    <h3 class="heading">Registration Municipality</h3>
                                    <p>Ensure smooth integration into Belgium by registering with your municipality. Follow the required steps to register to make your immigration process easier. Find out more about the registration process on our website. Once you've completed this step, you've reached the final milestone in My Tracker, marking the successful completion of your migration</p>
                                    <?php if ($status2[0]['status'] == 2) { ?>
                                        <div class="progress-container">
                                            <progress id="file" value="100" max="100" class="green-progress"> 100% </progress>
                                        </div>
                                        <div class="button-wrapper">
                                            <button type="button" onclick="goToStep4()" id="step3">Finish</button>
                                            <label for="file">Retrieve your ID</label>
                                        </div>
                                    <?php } else if ($status2[0]['status'] == 0) { ?>
                                        <div class="progress-container">
                                            <progress id="file" value="5" max="100"> 5% </progress>
                                        </div>
                                        <div class="button-wrapper">
                                            <a href="registration-municipality.php">Registration Municipality</a>
                                            <label for="file">Process not started</label>
                                        </div>
                                    <?php } else { ?>
                                        <div class="progress-container">
                                            <progress id="file" value="20" max="100"> 20% </progress>
                                        </div>
                                        <div class="button-wrapper">
                                            <a href="registration-municipality.php">Registration Municipality</a>
                                            <label for="file">Process is ongoing</label>
                                        </div>
                                    <?php } ?>
                                </div>


                                <span <?php
                                        if ($currentStep == 3) {
                                            echo 'class="circle completed"';
                                        } else {
                                            echo 'class="circle"';
                                        }
                                        ?> data-number="3"></span>
                            </li>
                        </ul>
                    </div>
                <?php } else if (str_contains($status, "No House")) {
                    $progress = new Progress();
                    $progress->setNaam('huisvesting');
                    $progress2 = new Progress();
                    $progress2->setNaam('gemeente');
                    $status = $progress->getStatusFromName($progress->getNaam());
                    $status2 = $progress2->getStatusFromName($progress2->getNaam());
                ?>
                    <div class="container steps2">
                        <ul>
                            <li>
                                <h3 class="heading">Accommodation</h3>
                                <p>Discover housing options to support your relocation to Belgium. Explore various accommodation choices, including apartments and shared housing, to find the best fit for your needs. Learn how to secure housing and understand your rental rights and responsibilities. For more detailed information and assistance, visit our website. Once you've found suitable accommodation, proceed to the next step in My Tracker.</p>
                                <?php
                                if ($status[0]['status'] == 0) {
                                ?>
                                    <div class="progress-container">
                                        <progress id="file" value="20" max="100"> 20% </progress>
                                    </div>
                                    <div class="button-wrapper">
                                        <label for="file">Process is ongoing</label>
                                    <?php } else { ?>
                                        <div class="progress-container">
                                            <progress id="file" value="100" max="100" class="green-progress"> 100% </progress>
                                        </div>
                                        <div class="button-wrapper">
                                            <button type="button" onclick="goToStep2()" id="step2">Next Step</button>
                                        <?php } ?>
                                        <a href="accommodation.php">Accommodation</a>
                                        </div>
                                        <span class="circle completed" data-number="1"></span>
                            </li>
                            <li <?php
                                if ($currentStep <= 1) {
                                    echo 'class="hide-step2"';
                                } else {
                                    echo 'class=""';
                                }
                                ?>>
                                <div <?php
                                        if ($currentStep <= 1) {
                                            echo 'class="step2-gone"';
                                        } else {
                                            echo 'class=""';
                                        }
                                        ?>>
                                    <h3 class="heading">Registration Municipality</h3>
                                    <p>Ensure smooth integration into Belgium by registering with your municipality. Follow the required steps to register to make your immigration process easier. Find out more about the registration process on our website. Once you've completed this step, you've reached the final milestone in My Tracker, marking the successful completion of your migration</p>
                                    <?php if ($status2[0]['status'] == 2) { ?>
                                        <div class="progress-container">
                                            <progress id="file" value="100" max="100" class="green-progress"> 100% </progress>
                                        </div>
                                        <div class="button-wrapper">
                                            <button type="button" onclick="goToStep3()" id="step3">Finish</button>
                                            <label for="file">Retrieve your ID</label>
                                        </div>
                                    <?php } else if ($status2[0]['status'] == 0) { ?>
                                        <div class="progress-container">
                                            <progress id="file" value="5" max="100"> 5% </progress>
                                        </div>
                                        <div class="button-wrapper">
                                            <a href="registration-municipality.php">Registration Municipality</a>
                                            <label for="file">Process not started</label>
                                        </div>
                                    <?php } else { ?>
                                        <div class="progress-container">
                                            <progress id="file" value="20" max="100"> 20% </progress>
                                        </div>
                                        <div class="button-wrapper">
                                            <a href="registration-municipality.php">Registration Municipality</a>
                                            <label for="file">Process is ongoing</label>
                                        </div>
                                    <?php } ?>

                                </div>

                                <span <?php
                                        if ($currentStep == 2) {
                                            echo 'class="circle completed"';
                                        } else {
                                            echo 'class="circle"';
                                        }
                                        ?> data-number="2"></span>

                            </li>
                        </ul>
                    </div>
                <?php } else if (str_contains($status, "Municipality")) {
                    $progress = new Progress();
                    $progress->setNaam('Ziekenfonds');
                    $progress2 = new Progress();
                    $progress2->setNaam('gemeente');
                    $status = $progress->getStatusFromName($progress->getNaam());
                    $status2 = $progress2->getStatusFromName($progress2->getNaam());
                ?>
                    <div class="container steps2">
                        <ul>
                            <li>
                                <h3 class="heading">Registration Municipality</h3>
                                <p>Ensure smooth integration into Belgium by registering with your municipality. Follow the required steps to register to make your immigration process easier. Find out more about the registration process on our website. Once you've completed this step, you've reached the final milestone in My Tracker, marking the successful completion of your migration</p>
                                <?php if ($status2[0]['status'] == 2) { ?>
                                    <div class="progress-container">
                                        <progress id="file" value="100" max="100" class="green-progress"> 100% </progress>
                                    </div>
                                    <div class="button-wrapper">
                                        <button type="button" onclick="goToStep2()" id="step1">Next Step</button>
                                        <label for="file">Retrieve your ID</label>
                                    </div>
                                <?php } else if ($status2[0]['status'] == 0) { ?>
                                    <div class="progress-container">
                                        <progress id="file" value="5" max="100"> 5% </progress>
                                    </div>
                                    <div class="button-wrapper">
                                        <a href="registration-municipality.php">Registration Municipality</a>
                                        <label for="file">Process not started</label>
                                    </div>
                                <?php } else { ?>
                                    <div class="progress-container">
                                        <progress id="file" value="20" max="100"> 20% </progress>
                                    </div>
                                    <div class="button-wrapper">
                                        <a href="registration-municipality.php">Registration Municipality</a>
                                        <label for="file">Process is ongoing</label>
                                    </div>
                                <?php } ?>


                                <span class="circle completed" data-number="1"></span>
                            </li>
                            <li <?php
                                if ($currentStep == 1) {
                                    echo 'class="hide-step2"';
                                } else {
                                    echo 'class=""';
                                }
                                ?>>
                                <div <?php
                                        if ($currentStep == 1) {
                                            echo 'class="step2-gone"';
                                        } else {
                                            echo 'class=""';
                                        }
                                        ?>>
                                    <h3 class="heading">Health Insurance</h3>
                                    <p>Ensure smooth integration into Belgium by understanding the Health Insurance system. Familiarize yourself with the necessary steps to secure medical coverage and benefits, making your immigration process more manageable. Explore detailed information about Health Insurance on our website. Once you're signed to a Health Insurance, move on to the next step in My Tracker.</p>
                                    <?php
                                    if ($status[0]['status'] == 0) {
                                    ?>
                                        <div class="progress-container">
                                            <progress id="file" value="20" max="100"> 20% </progress>
                                        </div>
                                        <div class="button-wrapper">
                                            <label for="file">Process is ongoing</label>
                                        <?php } else { ?>
                                            <div class="progress-container">
                                                <progress id="file" value="100" max="100" class="green-progress"> 100% </progress>
                                            </div>
                                            <div class="button-wrapper">
                                                <button type="button" onclick="goToStep3()" id="step2">Finish</button>
                                            <?php } ?>
                                            <a href="social-security.php">Social Security</a>
                                            </div>
                                        </div>
                                        <span <?php
                                                if ($currentStep >= 2) {
                                                    echo 'class="circle completed"';
                                                } else {
                                                    echo 'class="circle"';
                                                }
                                                ?> data-number="2"></span>
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
    </div>
</body>

<script>
    window.gtranslateSettings = {
        default_language: "en",
        native_language_names: true,
        detect_browser_language: true,
        languages: ["en", "fr", "es", "nl", "de", "uk", "it", "bg", "pl"],
        wrapper_selector: ".gtranslate_wrapper",
        flag_size: 24,
        switcher_horizontal_position: "right",
        switcher_open_direction: "top",
    };
</script>
<script>
    /*!Copyright (C) GTranslate Inc.*/
    (function() {
        var gt = window.gtranslateSettings || {};
        gt = gt[document.currentScript.getAttribute('data-gt-widget-id')] || gt;
        var lang_array_english = {
            "af": "Afrikaans",
            "sq": "Albanian",
            "am": "Amharic",
            "ar": "Arabic",
            "hy": "Armenian",
            "az": "Azerbaijani",
            "eu": "Basque",
            "be": "Belarusian",
            "bn": "Bengali",
            "bs": "Bosnian",
            "bg": "Bulgarian",
            "ca": "Catalan",
            "ceb": "Cebuano",
            "ny": "Chichewa",
            "zh-CN": "Chinese (Simplified)",
            "zh-TW": "Chinese (Traditional)",
            "co": "Corsican",
            "hr": "Croatian",
            "cs": "Czech",
            "da": "Danish",
            "nl": "Dutch",
            "en": "English",
            "eo": "Esperanto",
            "et": "Estonian",
            "tl": "Filipino",
            "fi": "Finnish",
            "fr": "French",
            "fy": "Frisian",
            "gl": "Galician",
            "ka": "Georgian",
            "de": "German",
            "el": "Greek",
            "gu": "Gujarati",
            "ht": "Haitian Creole",
            "ha": "Hausa",
            "haw": "Hawaiian",
            "iw": "Hebrew",
            "hi": "Hindi",
            "hmn": "Hmong",
            "hu": "Hungarian",
            "is": "Icelandic",
            "ig": "Igbo",
            "id": "Indonesian",
            "ga": "Irish",
            "it": "Italian",
            "ja": "Japanese",
            "jw": "Javanese",
            "kn": "Kannada",
            "kk": "Kazakh",
            "km": "Khmer",
            "ko": "Korean",
            "ku": "Kurdish (Kurmanji)",
            "ky": "Kyrgyz",
            "lo": "Lao",
            "la": "Latin",
            "lv": "Latvian",
            "lt": "Lithuanian",
            "lb": "Luxembourgish",
            "mk": "Macedonian",
            "mg": "Malagasy",
            "ms": "Malay",
            "ml": "Malayalam",
            "mt": "Maltese",
            "mi": "Maori",
            "mr": "Marathi",
            "mn": "Mongolian",
            "my": "Myanmar (Burmese)",
            "ne": "Nepali",
            "no": "Norwegian",
            "ps": "Pashto",
            "fa": "Persian",
            "pl": "Polish",
            "pt": "Portuguese",
            "pa": "Punjabi",
            "ro": "Romanian",
            "ru": "Russian",
            "sm": "Samoan",
            "gd": "Scottish Gaelic",
            "sr": "Serbian",
            "st": "Sesotho",
            "sn": "Shona",
            "sd": "Sindhi",
            "si": "Sinhala",
            "sk": "Slovak",
            "sl": "Slovenian",
            "so": "Somali",
            "es": "Spanish",
            "su": "Sundanese",
            "sw": "Swahili",
            "sv": "Swedish",
            "tg": "Tajik",
            "ta": "Tamil",
            "te": "Telugu",
            "th": "Thai",
            "tr": "Turkish",
            "uk": "Ukrainian",
            "ur": "Urdu",
            "uz": "Uzbek",
            "vi": "Vietnamese",
            "cy": "Welsh",
            "xh": "Xhosa",
            "yi": "Yiddish",
            "yo": "Yoruba",
            "zu": "Zulu"
        };
        var lang_array_native = {
            "af": "Afrikaans",
            "sq": "Shqip",
            "am": "\u12a0\u121b\u122d\u129b",
            "ar": "\u0627\u0644\u0639\u0631\u0628\u064a\u0629",
            "hy": "\u0540\u0561\u0575\u0565\u0580\u0565\u0576",
            "az": "Az\u0259rbaycan dili",
            "eu": "Euskara",
            "be": "\u0411\u0435\u043b\u0430\u0440\u0443\u0441\u043a\u0430\u044f \u043c\u043e\u0432\u0430",
            "bn": "\u09ac\u09be\u0982\u09b2\u09be",
            "bs": "Bosanski",
            "bg": "\u0411\u044a\u043b\u0433\u0430\u0440\u0441\u043a\u0438",
            "ca": "Catal\u00e0",
            "ceb": "Cebuano",
            "ny": "Chichewa",
            "zh-CN": "\u7b80\u4f53\u4e2d\u6587",
            "zh-TW": "\u7e41\u9ad4\u4e2d\u6587",
            "co": "Corsu",
            "hr": "Hrvatski",
            "cs": "\u010ce\u0161tina\u200e",
            "da": "Dansk",
            "nl": "Nederlands",
            "en": "English",
            "eo": "Esperanto",
            "et": "Eesti",
            "tl": "Filipino",
            "fi": "Suomi",
            "fr": "Fran\u00e7ais",
            "fy": "Frysk",
            "gl": "Galego",
            "ka": "\u10e5\u10d0\u10e0\u10d7\u10e3\u10da\u10d8",
            "de": "Deutsch",
            "el": "\u0395\u03bb\u03bb\u03b7\u03bd\u03b9\u03ba\u03ac",
            "gu": "\u0a97\u0ac1\u0a9c\u0ab0\u0abe\u0aa4\u0ac0",
            "ht": "Kreyol ayisyen",
            "ha": "Harshen Hausa",
            "haw": "\u014clelo Hawai\u02bbi",
            "iw": "\u05e2\u05b4\u05d1\u05b0\u05e8\u05b4\u05d9\u05ea",
            "hi": "\u0939\u093f\u0928\u094d\u0926\u0940",
            "hmn": "Hmong",
            "hu": "Magyar",
            "is": "\u00cdslenska",
            "ig": "Igbo",
            "id": "Bahasa Indonesia",
            "ga": "Gaeilge",
            "it": "Italiano",
            "ja": "\u65e5\u672c\u8a9e",
            "jw": "Basa Jawa",
            "kn": "\u0c95\u0ca8\u0ccd\u0ca8\u0ca1",
            "kk": "\u049a\u0430\u0437\u0430\u049b \u0442\u0456\u043b\u0456",
            "km": "\u1797\u17b6\u179f\u17b6\u1781\u17d2\u1798\u17c2\u179a",
            "ko": "\ud55c\uad6d\uc5b4",
            "ku": "\u0643\u0648\u0631\u062f\u06cc\u200e",
            "ky": "\u041a\u044b\u0440\u0433\u044b\u0437\u0447\u0430",
            "lo": "\u0e9e\u0eb2\u0eaa\u0eb2\u0ea5\u0eb2\u0ea7",
            "la": "Latin",
            "lv": "Latvie\u0161u valoda",
            "lt": "Lietuvi\u0173 kalba",
            "lb": "L\u00ebtzebuergesch",
            "mk": "\u041c\u0430\u043a\u0435\u0434\u043e\u043d\u0441\u043a\u0438 \u0458\u0430\u0437\u0438\u043a",
            "mg": "Malagasy",
            "ms": "Bahasa Melayu",
            "ml": "\u0d2e\u0d32\u0d2f\u0d3e\u0d33\u0d02",
            "mt": "Maltese",
            "mi": "Te Reo M\u0101ori",
            "mr": "\u092e\u0930\u093e\u0920\u0940",
            "mn": "\u041c\u043e\u043d\u0433\u043e\u043b",
            "my": "\u1017\u1019\u102c\u1005\u102c",
            "ne": "\u0928\u0947\u092a\u093e\u0932\u0940",
            "no": "Norsk bokm\u00e5l",
            "ps": "\u067e\u069a\u062a\u0648",
            "fa": "\u0641\u0627\u0631\u0633\u06cc",
            "pl": "Polski",
            "pt": "Portugu\u00eas",
            "pa": "\u0a2a\u0a70\u0a1c\u0a3e\u0a2c\u0a40",
            "ro": "Rom\u00e2n\u0103",
            "ru": "\u0420\u0443\u0441\u0441\u043a\u0438\u0439",
            "sm": "Samoan",
            "gd": "G\u00e0idhlig",
            "sr": "\u0421\u0440\u043f\u0441\u043a\u0438 \u0458\u0435\u0437\u0438\u043a",
            "st": "Sesotho",
            "sn": "Shona",
            "sd": "\u0633\u0646\u068c\u064a",
            "si": "\u0dc3\u0dd2\u0d82\u0dc4\u0dbd",
            "sk": "Sloven\u010dina",
            "sl": "Sloven\u0161\u010dina",
            "so": "Afsoomaali",
            "es": "Espa\u00f1ol",
            "su": "Basa Sunda",
            "sw": "Kiswahili",
            "sv": "Svenska",
            "tg": "\u0422\u043e\u04b7\u0438\u043a\u04e3",
            "ta": "\u0ba4\u0bae\u0bbf\u0bb4\u0bcd",
            "te": "\u0c24\u0c46\u0c32\u0c41\u0c17\u0c41",
            "th": "\u0e44\u0e17\u0e22",
            "tr": "T\u00fcrk\u00e7e",
            "uk": "\u0423\u043a\u0440\u0430\u0457\u043d\u0441\u044c\u043a\u0430",
            "ur": "\u0627\u0631\u062f\u0648",
            "uz": "O\u2018zbekcha",
            "vi": "Ti\u1ebfng Vi\u1ec7t",
            "cy": "Cymraeg",
            "xh": "isiXhosa",
            "yi": "\u05d9\u05d9\u05d3\u05d9\u05e9",
            "yo": "Yor\u00f9b\u00e1",
            "zu": "Zulu"
        };
        var default_language = gt.default_language || 'auto';
        var languages = gt.languages || Object.keys(lang_array_english);
        var alt_flags = gt.alt_flags || {};
        var flag_size = gt.flag_size || 32;
        var flag_style = gt.flag_style || '2d';
        var flags_location = gt.flags_location || 'https://cdn.gtranslate.net/flags/';
        var url_structure = gt.url_structure || 'none';
        var custom_domains = gt.custom_domains || {};
        var switcher_horizontal_position = gt.switcher_horizontal_position || 'left';
        var switcher_vertical_position = gt.switcher_vertical_position || 'bottom';
        var switcher_open_direction = gt.switcher_open_direction || 'bottom';
        var native_language_names = gt.native_language_names || false;
        var detect_browser_language = gt.detect_browser_language || false;
        var wrapper_selector = gt.wrapper_selector || '.gtranslate_wrapper';
        var switcher_text_color = gt.switcher_text_color || '#666';
        var switcher_arrow_color = gt.switcher_arrow_color || '#666';
        var switcher_border_color = gt.switcher_border_color || '#ccc';
        var switcher_background_color = gt.switcher_background_color || '#fff';
        var switcher_background_shadow_color = gt.switcher_background_shadow_color || '#efefef';
        var switcher_background_hover_color = gt.switcher_background_hover_color || '#fff';
        var dropdown_text_color = gt.dropdown_text_color || '#000';
        var dropdown_hover_color = gt.dropdown_hover_color || '#fff';
        var dropdown_background_color = gt.dropdown_background_color || '#eee';
        var custom_css = gt.custom_css || '';
        var lang_array = native_language_names && lang_array_native || lang_array_english;
        var u_class = '.gt_container-' + Array.from('dwf' + wrapper_selector).reduce(function(h, c) {
            return 0 | (31 * h + c.charCodeAt(0))
        }, 0).toString(36);
        var widget_code = '<!-- GTranslate: https://gtranslate.com -->';
        var widget_css = custom_css;
        flags_location += (flag_style == '3d' ? flag_size : 'svg') + '/';
        var flag_ext = flag_style == '3d' ? '.png' : '.svg';

        function get_flag_src(lang) {
            if (!alt_flags[lang])
                return flags_location + lang + flag_ext;
            else if (alt_flags[lang] == 'usa')
                return flags_location + 'en-us' + flag_ext;
            else if (alt_flags[lang] == 'canada')
                return flags_location + 'en-ca' + flag_ext;
            else if (alt_flags[lang] == 'brazil')
                return flags_location + 'pt-br' + flag_ext;
            else if (alt_flags[lang] == 'mexico')
                return flags_location + 'es-mx' + flag_ext;
            else if (alt_flags[lang] == 'argentina')
                return flags_location + 'es-ar' + flag_ext;
            else if (alt_flags[lang] == 'colombia')
                return flags_location + 'es-co' + flag_ext;
            else if (alt_flags[lang] == 'quebec')
                return flags_location + 'fr-qc' + flag_ext;
            else
                return alt_flags[lang];
        }

        function get_lang_href(lang) {
            var href = '#';
            if (url_structure == 'sub_directory') {
                var gt_request_uri = (document.currentScript.getAttribute('data-gt-orig-url') || (location.pathname.startsWith('/' + current_lang + '/') && '/' + location.pathname.split('/').slice(2).join('/') || location.pathname)) + location.search + location.hash;
                href = (lang == default_language) && location.protocol + '//' + location.hostname + gt_request_uri || location.protocol + '//' + location.hostname + '/' + lang + gt_request_uri;
            } else if (url_structure == 'sub_domain') {
                var gt_request_uri = (document.currentScript.getAttribute('data-gt-orig-url') || location.pathname) + location.search + location.hash;
                var domain = document.currentScript.getAttribute('data-gt-orig-domain') || location.hostname;
                if (typeof custom_domains == 'object' && custom_domains[lang])
                    href = (lang == default_language) && location.protocol + '//' + domain + gt_request_uri || location.protocol + '//' + custom_domains[lang] + gt_request_uri;
                else
                    href = (lang == default_language) && location.protocol + '//' + domain + gt_request_uri || location.protocol + '//' + lang + '.' + domain.replace(/^www\./, '') + gt_request_uri;
            }
            return href;
        }
        var current_lang = document.querySelector('html').getAttribute('lang') || default_language;
        if (url_structure == 'none') {
            var googtrans_matches = document.cookie.match('(^|;) ?googtrans=([^;]*)(;|$)');
            current_lang = googtrans_matches && googtrans_matches[2].split('/')[2] || current_lang;
        }
        if (!lang_array[current_lang])
            current_lang = default_language;
        if (url_structure == 'none') {
            widget_code += '<div id="google_translate_element2"></div>';
            widget_css += "div.skiptranslate,#google_translate_element2{display:none!important}";
            widget_css += "body{top:0!important}";
            widget_css += "font font{background-color:transparent!important;box-shadow:none!important;position:initial!important}";
        }
        var font_size = 10,
            widget_width = 163,
            arrow_size = 7;
        if (flag_size == 24)
            font_size = 12, widget_width = 173, arrow_size = 11;
        else if (flag_size == 32)
            font_size = 14, widget_width = 193, arrow_size = 12;
        else if (flag_size == 48)
            font_size = 16, widget_width = 223, arrow_size = 14;
        widget_css += u_class + ' .gt_switcher{font-family:Arial;font-size:' + font_size + 'pt;text-align:left;cursor:pointer;overflow:hidden;width:' + widget_width + 'px;line-height:0}';
        widget_css += u_class + ' .gt_switcher a{text-decoration:none;display:block;font-size:' + font_size + 'pt;box-sizing:content-box}';
        widget_css += u_class + ' .gt_switcher a img{width:' + flag_size + 'px;height:' + flag_size + 'px;vertical-align:middle;display:inline;border:0;padding:0;margin:0;opacity:0.8}';
        widget_css += u_class + ' .gt_switcher a:hover img{opacity:1}';
        widget_css += u_class + ' .gt_switcher .gt_selected{background:' + switcher_background_color + ' linear-gradient(180deg, ' + switcher_background_shadow_color + ' 0%, ' + switcher_background_color + ' 70%);position:relative;z-index:9999}';
        widget_css += u_class + ' .gt_switcher .gt_selected a{border:1px solid ' + switcher_border_color + ';color:' + switcher_text_color + ';padding:3px 5px;width:' + (widget_width - 2 * 5 - 2 * 1) + 'px}';
        widget_css += u_class + ' .gt_switcher .gt_selected a:after{height:' + flag_size + 'px;display:inline-block;position:absolute;right:' + (flag_size < 20 ? 5 : 10) + 'px;width:15px;background-position:50%;background-size:' + arrow_size + 'px;background-image:url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'16\' height=\'16\' viewBox=\'0 0 285 285\'><path d=\'M282 76.5l-14.2-14.3a9 9 0 0 0-13.1 0L142.5 174.4 30.3 62.2a9 9 0 0 0-13.2 0L3 76.5a9 9 0 0 0 0 13.1l133 133a9 9 0 0 0 13.1 0l133-133a9 9 0 0 0 0-13z\' style=\'fill:' + escape(switcher_arrow_color) + '\'/></svg>");background-repeat:no-repeat;content:""!important;transition:all .2s}';
        widget_css += u_class + ' .gt_switcher .gt_selected a.open:after{transform:rotate(-180deg)}';
        widget_css += u_class + ' .gt_switcher .gt_selected a:hover{background:' + switcher_background_hover_color + '}';
        widget_css += u_class + ' .gt_switcher .gt_current{display:none}';
        widget_css += u_class + ' .gt_switcher .gt_option{position:relative;z-index:9998;border-left:1px solid ' + switcher_border_color + ';border-right:1px solid ' + switcher_border_color + ';border-' + switcher_open_direction + ':1px solid ' + switcher_border_color + ';background-color:' + dropdown_background_color + ';display:none;width:' + (widget_width - 2 * 1) + 'px;max-height:198px;height:0;box-sizing:content-box;overflow-y:auto;overflow-x:hidden;transition:height 0.5s ease-in-out}';
        widget_css += u_class + ' .gt_switcher .gt_option a{color:' + dropdown_text_color + ';padding:3px 5px}';
        widget_css += u_class + ' .gt_switcher .gt_option a:hover{background:' + dropdown_hover_color + '}';
        widget_css += u_class + ' .gt_switcher .gt_option::-webkit-scrollbar-track{background-color:#f5f5f5}';
        widget_css += u_class + ' .gt_switcher .gt_option::-webkit-scrollbar{width:5px}';
        widget_css += u_class + ' .gt_switcher .gt_option::-webkit-scrollbar-thumb{background-color:#888}';
        widget_code += '<div class="gt_switcher notranslate">';
        var gt_current_div = '<div class="gt_selected"><a href="#"><img src="' + get_flag_src(current_lang) + '" height="' + flag_size + '" width="' + flag_size + '" alt="' + current_lang + '" /> ' + lang_array[current_lang] + '</a></div>';
        var gt_options_div = '<div class="gt_option">';
        languages.forEach(function(lang) {
            var el_a = document.createElement('a');
            el_a.href = get_lang_href(lang);
            el_a.title = lang_array[lang];
            el_a.classList.add('nturl');
            lang == current_lang && el_a.classList.add('gt_current');
            el_a.setAttribute('data-gt-lang', lang);
            var el_img = document.createElement('img');
            el_img.height = el_img.width = flag_size;
            el_img.alt = lang;
            el_img.setAttribute('data-gt-lazy-src', get_flag_src(lang));
            el_a.appendChild(el_img);
            el_a.innerHTML += ' ' + lang_array[lang];
            gt_options_div += el_a.outerHTML;
        });
        gt_options_div += '</div>';
        if (switcher_open_direction == 'top')
            widget_code += gt_options_div + gt_current_div;
        else
            widget_code += gt_current_div + gt_options_div;
        widget_code += '</div>';
        if (switcher_horizontal_position != 'inline')
            widget_code = '<div class="gt_switcher_wrapper" style="position:fixed;' + switcher_vertical_position + ':0;' + switcher_horizontal_position + ':8%;z-index:999999;">' + widget_code + '</div>';
        var add_css = document.createElement('style');
        add_css.classList.add('gtranslate_css');
        add_css.textContent = widget_css;
        document.head.appendChild(add_css);
        document.querySelectorAll(wrapper_selector).forEach(function(e) {
            e.classList.add(u_class.substring(1));
            e.innerHTML += widget_code
        });
        if (url_structure == 'none') {
            function get_current_lang() {
                var keyValue = document.cookie.match('(^|;) ?googtrans=([^;]*)(;|$)');
                return keyValue ? keyValue[2].split('/')[2] : null;
            }

            function fire_event(element, event) {
                try {
                    if (document.createEventObject) {
                        var evt = document.createEventObject();
                        element.fireEvent('on' + event, evt)
                    } else {
                        var evt = document.createEvent('HTMLEvents');
                        evt.initEvent(event, true, true);
                        element.dispatchEvent(evt)
                    }
                } catch (e) {}
            }

            function load_tlib() {
                if (!window.gt_translate_script) {
                    window.gt_translate_script = document.createElement('script');
                    gt_translate_script.src = 'https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2';
                    document.body.appendChild(gt_translate_script);
                }
            }
            window.doGTranslate = function(lang_pair) {
                if (lang_pair.value) lang_pair = lang_pair.value;
                if (lang_pair == '') return;
                var lang = lang_pair.split('|')[1];
                if (get_current_lang() == null && lang == lang_pair.split('|')[0]) return;
                var teCombo;
                var sel = document.getElementsByTagName('select');
                for (var i = 0; i < sel.length; i++)
                    if (sel[i].className.indexOf('goog-te-combo') != -1) {
                        teCombo = sel[i];
                        break;
                    } if (document.getElementById('google_translate_element2') == null || document.getElementById('google_translate_element2').innerHTML.length == 0 || teCombo.length == 0 || teCombo.innerHTML.length == 0) {
                    setTimeout(function() {
                        doGTranslate(lang_pair)
                    }, 500)
                } else {
                    teCombo.value = lang;
                    fire_event(teCombo, 'change');
                    fire_event(teCombo, 'change')
                }
            }
            window.googleTranslateElementInit2 = function() {
                new google.translate.TranslateElement({
                    pageLanguage: default_language,
                    autoDisplay: false
                }, 'google_translate_element2')
            };
            if (current_lang != default_language)
                load_tlib();
            else
                document.querySelectorAll(u_class).forEach(function(e) {
                    e.addEventListener('pointerenter', load_tlib)
                });
        }
        var gt_slider_open = false;

        function gt_show_slider(el) {
            gt_slider_open = true;
            el.querySelectorAll('.gt_option a img:not([src])').forEach(function(img) {
                img.setAttribute('src', img.getAttribute('data-gt-lazy-src'));
            });
            el.querySelector('div.gt_selected a').classList.add('open');
            var option_el = el.querySelector('div.gt_option');
            option_el.style.display = 'block';
            option_el.style.overflowY = 'hidden';
            setTimeout(function() {
                if (option_el.style.display != 'block') return;
                option_el.style.height = Math.min(198, (Math.min(option_el.childElementCount - 1, 6) * (flag_size + 6) + 1)) + 'px';
            }, 100);
            setTimeout(function() {
                if (option_el.style.display != 'block') return;
                option_el.style.overflowY = 'auto';
            }, 600);
        }

        function gt_hide_slider() {
            gt_slider_open = false;
            document.querySelectorAll(u_class + ' div.gt_switcher').forEach(function(e) {
                e.querySelector('div.gt_selected a').classList.remove('open');
                var option_el = e.querySelector('div.gt_option');
                option_el.style.height = 0;
                option_el.style.overflowY = 'hidden';
                setTimeout(function() {
                    option_el.style.display = 'none';
                    option_el.style.overflowY = 'auto';
                }, 500);
            });
        }

        function gt_update_slider_language(el) {
            el.parentNode.parentNode.querySelector('div.gt_selected a').innerHTML = el.innerHTML;
            setTimeout(function() {
                el.parentNode.querySelectorAll('a.gt_current').forEach(function(e) {
                    e.classList.remove('gt_current');
                });
                el.classList.add('gt_current');
            }, 400);
        }
        document.addEventListener('click', function() {
            if (gt_slider_open) gt_hide_slider();
        });
        document.querySelectorAll(u_class + ' .gt_switcher div.gt_selected').forEach(function(e) {
            e.addEventListener('click', function(evt) {
                evt.preventDefault();
                evt.stopPropagation();
                if (gt_slider_open) gt_hide_slider();
                else gt_show_slider(e.parentNode);
            });
            e.addEventListener('pointerenter', function(evt) {
                evt.target.parentNode.querySelectorAll('.gt_option img:not([src])').forEach(function(img) {
                    img.setAttribute('src', img.getAttribute('data-gt-lazy-src'))
                })
            });
        });
        document.querySelectorAll(u_class + ' .gt_switcher div.gt_option a').forEach(function(e) {
            e.addEventListener('click', function(evt) {
                if (url_structure == 'none') {
                    evt.preventDefault();
                    doGTranslate(default_language + '|' + e.getAttribute('data-gt-lang'));
                }
                gt_update_slider_language(e);
            })
        });
        if (detect_browser_language && window.sessionStorage && window.navigator && sessionStorage.getItem('gt_autoswitch') == null && !/bot|spider|slurp|facebook/i.test(navigator.userAgent)) {
            var accept_language = (navigator.language || navigator.userLanguage).toLowerCase();
            switch (accept_language) {
                case 'zh':
                case 'zh-cn':
                    var preferred_language = 'zh-CN';
                    break;
                case 'zh-tw':
                case 'zh-hk':
                    var preferred_language = 'zh-TW';
                    break;
                case 'he':
                    var preferred_language = 'iw';
                    break;
                default:
                    var preferred_language = accept_language.substr(0, 2);
                    break;
            }
            if (current_lang == default_language && preferred_language != default_language && languages.includes(preferred_language)) {
                if (url_structure == 'none') {
                    load_tlib();
                    window.gt_translate_script.onload = function() {
                        doGTranslate(default_language + '|' + preferred_language);
                        var el = document.querySelector(u_class + ' a[data-gt-lang="' + preferred_language + '"]');
                        el.querySelectorAll('img:not([src])').forEach(function(e) {
                            e.setAttribute('src', e.getAttribute('data-gt-lazy-src'))
                        });
                        gt_update_slider_language(el);
                    };
                } else
                    document.querySelectorAll(u_class + ' a[data-gt-lang="' + preferred_language + '"]').forEach(function(e) {
                        location.href = e.href
                    });
            }
            sessionStorage.setItem('gt_autoswitch', 1);
        }
    })();
</script>
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
        nextStepStatus("1");
        location.reload();
    }

    function goToStep3() {
        nextStepStatus("2");
        location.reload();
    }

    function goToStep4() {
        nextStepStatus("3");
        location.reload();
    }

    function nextStepStatus(currentStepnr) {
        currentStep = currentStepnr;
        // Stuur de status naar de server via AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "next_step_status.php");
        xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xhr.send(JSON.stringify({
            currentStep: currentStep
        }));
    }
</script>


</html>