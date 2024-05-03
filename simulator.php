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
    <title>Easy Entry</title>
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
                <strong>
                    This simulator serves as the first step in the process and helps us to follow and guide your immigration progress together with you. Please note that the results of the simulation are informational and do not constitute legal evidence. Ultimate decisions are made by immigration experts who take your individual situation into account.
                </strong>
            </p>
        </div>

        <div id="simulator-questions">
            <div class="form-label-group">
                <div class="circle">1</div>
                <div id="question">
                    <div id="content">
                        <label>Are you an EEA citizen?</label><br>
                        <label>
                            Yes
                            <input type="radio" id="YesButton" name="eea" value="yes" onclick="showQuestion()">
                        </label>
                        <label>
                            No
                            <input type="radio" id="NoButton" name="eea" value="no" onclick="showMessage()">
                        </label>
                    </div>
                </div>
            </div>


            <div id="Message" style="display: none;" class="simulator-message">
                <div class="circle"><img src="images/cross.svg" alt=""></div>
                <div id="question">
                    <div id="content">
                        <h2>Simulator Not Available</h2>
                        <p>Sorry, but this simulator is only intended for citizens of the European Economic Area (EEA). Since you indicated that you are not an EEA citizen, this tool is not suitable for your situation. Thank you for your interest.</p>
                    </div>
                </div>
            </div>

            <div id="Question1" style="display:none;" class="form-label-group">
                <div class="circle">2</div>
                <div id="question">
                    <div id="content">
                        <div id="multiple-radio">
                            <label for="purpose">What is the purpose of your immigration to Belgium?</label><br>
                            <label>
                                <input type="radio" id="studying" name="purpose" value="studying" onclick="showStudyQ1()">
                                Studying
                            </label><br>
                            <label>
                                <input type="radio" id="work" name="purpose" value="work" onclick="showWorkQ1()">
                                Work
                            </label><br>
                        </div>
                    </div>
                </div>
            </div>

            <div id="StudyQ1" style="display: none;" class="form-label-group">
                <div class="circle">3</div>
                <div id="question">
                    <div id="content">
                        <label for="study">Have you already enrolled in a school in Belgium?</label><br>
                        <label>
                            Yes
                            <input type="radio" id="yes_study1" name="study1" value="yes_study1" onclick="showStudyQ2()">

                        </label>
                        <label>
                            No
                            <input type="radio" id="no_study1" name="study1" value="no_study1" onclick="showStudyM1()">
                        </label>
                    </div>
                </div>
            </div>

            <div id="StudyM" style="display: none;" class="simulator-message">
                <div class="circle"><img src="images/checked.svg" alt=""></div>
                <div id="question">
                    <div id="content">
                        <h2>Information on School Enrollment</h2>
                        <p>
                            We regret to inform you that this simulation is tailored for individuals who are already enrolled in a school in Belgium. If you are seeking guidance on how to enroll in a school, we recommend visiting the following website for more information
                        </p>
                        <a href="https://www.studyinflanders.be/">
                            <button type="button" id="sim-btn">Study In Flanders</button>
                        </a>
                    </div>
                </div>
            </div>

            <div id="StudyQ2" style="display: none;" class="form-label-group">
                <div class="circle">4</div>
                <div id="question">
                    <div id="content">
                        <label for="study">Have you applied for a scholarship if you are eligible for one?</label><br>
                        <label>
                            Yes
                            <input type="radio" id="yes_study2" name="study2" value="yes_study2" onclick="showStudyQ3()">
                        </label>
                        <label>
                            No
                            <input type="radio" id="no_study2" name="study2" value="no_study2" onclick="showStudyM2()">
                        </label>
                    </div>
                </div>
            </div>

            <div id="StudyM2" style="display: none;" class="simulator-message">
                <div class="circle"><img src="images/checked.svg" alt=""></div>
                <div id="question">
                    <div id="content">
                        <h2>Information on Scholarships</h2>
                        <a href="scholarship.php">
                            <button type="button" id="sim-btn">Scholarship</button>
                        </a>
                    </div>
                </div>
            </div>

            <div id="StudyQ3" style="display: none;" class="form-label-group">
                <div class="circle">5</div>
                <div id="question">
                    <div id="content">
                        <label for="study">Are you already registered with the local municipality?</label><br>
                        <label>
                            Yes
                            <input type="radio" id="yes_study3" name="study3" value="Klaar" onclick="showStudyFinish()">
                        </label>
                        <label>
                            No
                            <input type="radio" id="no_study3" name="study3" value="no_study3" onclick="showStudyM3()">
                        </label>
                    </div>
                </div>
            </div>

            <div id="StudyM3" style="display: none;" class="simulator-message">
                <div class="circle"><img src="images/checked.svg" alt=""></div>
                <div id="question">
                    <div id="content">
                        <h2>Register with your local municipality.</h2>
                        <a href="registration-municipality.php">
                            <button type="button" id="sim-btn">Registration Municipality</button>
                        </a>
                    </div>
                </div>
            </div>

            <div id="StudyFinish" style="display: none;" class="simulator-message">
                <div class="circle"><img src="images/checked.svg" alt=""></div>
                <div id="question">
                    <div id="content">
                        <h2>Thank you for completing the simulation</h2>
                        <p>You are finished with your migrationprocess. If you have any questions, please contact us.</p>
                    </div>
                </div>
            </div>

            <div id="FinancialQ" style="display:none;" class="form-label-group">
                <div class="circle">3</div>
                <div id="question">
                    <div id="content">
                        <div id="multiple-radio">
                            <label for="financial">What is your current financial situation?</label><br>
                            <label>
                                <input type="radio" id="moneyEmployed" name="financial" value="money" onclick="showMoney1()">
                                Employed
                            </label><br>
                            <label>
                                <input type="radio" id="moneyEquity" name="financial" value="money" onclick="showMoney1()">
                                Equity
                            </label><br>
                            <label>
                                <input type="radio" id="noMoney" name="financial" value="money" onclick="showNoMoney()">
                                Job Seeker
                            </label><br>
                        </div>
                    </div>
                </div>
            </div>

            <div id="House" style="display:none;" class="form-label-group">
                <div class="circle">4</div>
                <div id="question">
                    <div id="content">
                        <div id="multiple-radio">
                            <label for="financial">Have you already arranged housing in Belgium?</label><br>
                            <label>
                                <input type="radio" id="yesHouse" name="house" value="yesHouse" onclick="showGemeente()">
                                Yes
                            </label><br>
                            <label>
                                <input type="radio" id="noHouse" name="house" value="noHouse" onclick="showNoHouse()">
                                No
                            </label><br>
                        </div>
                    </div>
                </div>
            </div>

            <div id="Accommodation" style="display:none;" class="simulator-message">
                <div class="circle"><img src="images/checked.svg" alt=""></div>
                <div id="question">
                    <div id="content">
                        <h2>No Fixed Address</h2>
                        <a href="registration-municipality.php">
                            <button type="button" id="sim-btn">Accommodation</button>
                        </a>
                    </div>
                </div>
            </div>

            <div id="Gemeente" style="display:none;" class="form-label-group">
                <div class="circle">5</div>
                <div id="question">
                    <div id="content">
                        <div id="multiple-radio">
                            <label for="financial">Have you already registered with the local municipality?</label><br>
                            <label>
                                <input type="radio" id="yesGemeente" name="gemeente" value="Klaar" onclick="showSocialeZekerheid()">
                                Yes
                            </label><br>
                            <label>
                                <input type="radio" id="noGemeente" name="gemeente" value="noGemeente" onclick="showGemeenteM()">
                                No
                            </label><br>
                        </div>
                    </div>
                </div>
            </div>

            <div id="GemeenteM" style="display:none;" class="simulator-message">
                <div class="circle"><img src="images/checked.svg" alt=""></div>
                <div id="question">
                    <div id="content">
                        <h2>Register with your local municipality.</h2>
                        <a href="registration-municipality.php">
                            <button type="button" id="sim-btn">Registration Municipality</button>
                        </a>
                    </div>
                </div>
            </div>

            <div id="socialeZekerheid" style="display:none;" class="form-label-group">
                <div class="circle">6</div>
                <div id="question">
                    <div id="content">
                        <div id="multiple-radio">
                            <label for="financial">Have you already arranged social security in Belgium?</label><br>
                            <label>
                                <input type="radio" id="yesSocialeZekerheid" name="socialeZekerheid" value="yesSocialeZekerheid" onclick="showSociaalFinish()">
                                Yes
                            </label><br>
                            <label>
                                <input type="radio" id="noSocialeZekerheid" name="socialeZekerheid" value="noSocialeZekerheid" onclick="showNoSociaal()">
                                No
                            </label><br>
                        </div>
                    </div>
                </div>
            </div>

            <div id="noSociaal" style="display:none;" class="simulator-message">
                <div class="circle"><img src="images/checked.svg" alt=""></div>
                <div id="question">
                    <div id="content">
                        <h2>Register with a social security</h2>
                        <a href="registration-municipality.php">
                            <button type="button" id="sim-btn">Social Security</button>
                        </a>
                    </div>
                </div>
            </div>


            <div id="SociaalFinish" style="display:none;" class="simulator-message">
                <div class="circle"><img src="images/checked.svg" alt=""></div>
                <div id="question">
                    <div id="content">
                        <h2>Thank you for completing the simulation</h2>
                        <p>You are finished with your migrationprocess. If you have any questions, please contact us.</p>
                    </div>
                </div>
            </div>




            <div id="jobSearch" style="display:none;" class="simulator-message">
                <div class="circle"><img src="images/checked.svg" alt=""></div>
                <div id="question">
                    <div id="content">
                        <h2>Proof of Job Search Required</h2>
                        <p> As a job seeker, it's essential to demonstrate active efforts in seeking employment opportunities. Providing evidence of your job search activities can enhance your prospects and eligibility for various benefits and opportunities. Please click the button below to learn more about the requirements and resources available for job seekers in Belgium.</p>
                        <a href="https://employment.belgium.be/en/themes/international/foreign-workers">
                            <button type="button" id="sim-btn">Foreign workers</button>
                        </a>
                    </div>
                </div>
            </div>


        </div>



        <script>
            var yesButton = document.getElementById("YesButton");
            var noButton = document.getElementById("NoButton");
            var noStudy = document.getElementById("no_study1");
            var yesStudy = document.getElementById("yes_study1");
            var noStudy2 = document.getElementById("no_study2");
            var yesStudy2 = document.getElementById("yes_study2");
            var noStudy3 = document.getElementById("no_study3");
            var yesStudy3 = document.getElementById("yes_study3");
            var moneyEmployed = document.getElementById("moneyEmployed");
            var moneyEquity = document.getElementById("moneyEquity");
            var noMoney = document.getElementById("noMoney");
            var yesHouse = document.getElementById("yesHouse");
            var noHouse = document.getElementById("noHouse");
            var yesGemeente = document.getElementById("yesGemeente");
            var noGemeente = document.getElementById("noGemeente");
            var yesSocialeZekerheid = document.getElementById("yesSocialeZekerheid");
            var noSocialeZekerheid = document.getElementById("noSocialeZekerheid");




            var workR = document.getElementById("work");
            var studyingR = document.getElementById("studying");


            var message = document.getElementById("Message");
            var studyM = document.getElementById("StudyM");
            var studyM2 = document.getElementById("StudyM2");
            var studyM3 = document.getElementById("StudyM3");



            var question1 = document.getElementById("Question1");
            var financialQ = document.getElementById("FinancialQ");
            var studyQ1 = document.getElementById("StudyQ1");
            var studyQ2 = document.getElementById("StudyQ2");
            var studyQ3 = document.getElementById("StudyQ3");
            var studyFinish = document.getElementById("StudyFinish");
            var house = document.getElementById("House");
            var Money = document.getElementById("Money");
            var gemeente = document.getElementById("Gemeente");
            var gemeenteM = document.getElementById("GemeenteM");
            var socialeZekerheid = document.getElementById("socialeZekerheid");
            var sociaalFinish = document.getElementById("SociaalFinish");
            var noSociaal = document.getElementById("noSociaal");
            var jobSearch = document.getElementById("jobSearch");
            var Accommodation = document.getElementById("Accommodation");



            function showQuestion() {

                var message = document.getElementById("Message");
                if (yesButton.checked) {
                    question1.style.display = "flex";
                    message.style.display = "none";
                    teller = 2;
                } else {
                    question1.style.display = "none";
                    message.style.display = "flex";
                }
            }

            function showMessage() {

                if (noButton.checked) {
                    <?php
                    if (isset($_SESSION['user'])) {
                        $user = $_SESSION['user'];
                        $user->setStatus("Not EEA");
                        $user->statusUpdate();
                    }
                    ?>
                    message.style.display = "flex";
                    question1.style.display = "none";
                    financialQ.style.display = "none";
                    studyQ1.style.display = "none";
                    studyM.style.display = "none";
                    studyQ2.style.display = "none";
                    studyM2.style.display = "none";
                    studyQ3.style.display = "none";
                    studyM3.style.display = "none";
                    studyFinish.style.display = "none";
                    house.style.display = "none";
                    Money.style.display = "none";
                    gemeente.style.display = "none";
                    socialeZekerheid.style.display = "none";
                    sociaalFinish.style.display = "none";
                    noSociaal.style.display = "none";
                    jobSearch.style.display = "none";
                    Accommodation.style.display = "none";
                    yesSocialeZekerheid.checked = false;
                    noSocialeZekerheid.checked = false;
                    yesGemeente.checked = false;
                    noGemeente.checked = false;
                    yesHouse.checked = false;
                    noHouse.checked = false;
                    moneyEmployed.checked = false;
                    moneyEquity.checked = false;
                    noMoney.checked = false;
                    noStudy.checked = false;
                    studyingR.checked = false;
                    workR.checked = false;
                    noStudy.checked = false;
                    yesStudy.checked = false;
                    noStudy2.checked = false;
                    yesStudy2.checked = false;
                    noStudy3.checked = false;
                    yesStudy3.checked = false;
                } else {
                    message.style.display = "none";
                }
            }

            function showStudyM1() {
                if (noStudy.checked) {
                    <?php
                    if (isset($_SESSION['user'])) {
                        $user = $_SESSION['user'];
                        $user->setStatus("Student not enrolled");
                        $user->statusUpdate();
                    }
                    ?>
                    studyM.style.display = "flex";
                    studyQ2.style.display = "none";
                    studyM2.style.display = "none";
                    studyQ3.style.display = "none";
                    studyM3.style.display = "none";
                    studyFinish.style.display = "none";
                    house.style.display = "none";
                    Money.style.display = "none";
                    gemeente.style.display = "none";
                    noStudy2.checked = false;
                    yesStudy2.checked = false;
                    noStudy3.checked = false;
                    yesStudy3.checked = false;
                } else {
                    studyM.style.display = "none";
                }
            }

            function showWorkQ1() {

                if (workR.checked) {
                    financialQ.style.display = "flex";
                    studyQ1.style.display = "none";
                    studyM.style.display = "none";
                    studyQ2.style.display = "none";
                    studyM2.style.display = "none";
                    studyQ3.style.display = "none";
                    studyM3.style.display = "none";
                    studyFinish.style.display = "none";
                    noStudy.checked = false;
                    yesStudy.checked = false;
                    noStudy2.checked = false;
                    noStudy3.checked = false;
                    yesStudy3.checked = false;

                } else {
                    financialQ.style.display = "none";
                }
            }

            function showStudyQ1() {

                if (studyingR.checked) {
                    studyQ1.style.display = "flex";
                    financialQ.style.display = "none";
                    jobSearch.style.display = "none";
                    Accommodation.style.display = "none";
                    house.style.display = "none";
                    Money.style.display = "none";
                    gemeente.style.display = "none";
                    gemeenteM.style.display = "none";
                    socialeZekerheid.style.display = "none";
                    sociaalFinish.style.display = "none";
                    noStudy.checked = false;
                    yesStudy.checked = false;
                    noStudy2.checked = false;
                    noStudy3.checked = false;
                    yesStudy3.checked = false;
                    yesSocialeZekerheid.checked = false;
                    noSocialeZekerheid.checked = false;
                    yesGemeente.checked = false;
                    noGemeente.checked = false;
                    yesHouse.checked = false;
                    noHouse.checked = false;
                    moneyEmployed.checked = false;
                    moneyEquity.checked = false;
                    noMoney.checked = false;

                } else {
                    studyQ1.style.display = "none";
                }
            }

            function showStudyQ2() {
                if (yesStudy.checked) {
                    studyQ2.style.display = "flex";
                    studyM.style.display = "none";
                    studyM2.style.display = "none";
                    studyQ3.style.display = "none";
                    studyM3.style.display = "none";
                    studyFinish.style.display = "none";
                    gemeente.style.display = "none";
                    house.style.display = "none";
                    Money.style.display = "none";
                    noStudy.checked = false;
                    noStudy2.checked = false;
                    noStudy3.checked = false;
                    yesStudy3.checked = false;

                } else {
                    studyQ2.style.display = "none";
                }
            }

            function showStudyM2() {
                if (noStudy2.checked) {
                    <?php
                    if (isset($_SESSION['user'])) {
                        $user = $_SESSION['user'];
                        $user->setStatus("Student no scholarship");
                        $user->statusUpdate();
                    }
                    ?>
                    studyM2.style.display = "flex";
                    studyQ3.style.display = "none";
                    studyM3.style.display = "none";
                    studyFinish.style.display = "none";
                    noStudy3.checked = false;
                    yesStudy3.checked = false;


                } else {
                    studyM2.style.display = "none";
                }
            }

            function showStudyQ3() {
                if (yesStudy2.checked) {
                    studyQ3.style.display = "flex";
                    studyM2.style.display = "none";
                    studyM3.style.display = "none";
                    studyFinish.style.display = "none";
                    noStudy3.checked = false;
                    yesStudy3.checked = false;
                } else {
                    studyQ3.style.display = "none";
                }
            }

            function showStudyM3() {
                if (noStudy3.checked) {
                    <?php
                    if (isset($_SESSION['user'])) {
                        $user = $_SESSION['user'];
                        $user->setStatus("Student-municipality");
                        $user->statusUpdate();
                    }
                    ?>
                    studyM3.style.display = "flex";
                    studyFinish.style.display = "none";

                } else {
                    studyM3.style.display = "none";
                }
            }

            function showStudyFinish() {
                if (yesStudy3.checked) {
                    <?php
                    if (isset($_SESSION['user'])) {
                        $user = $_SESSION['user'];
                        $user->setStatus("Finished");
                        $user->statusUpdate();
                    }
                    ?>
                    studyFinish.style.display = "flex";
                    studyM3.style.display = "none";
                } else {
                    studyFinish.style.display = "none";
                }
            }

            function showMoney1() {
                if (moneyEmployed.checked || moneyEquity.checked) {
                    house.style.display = "flex";
                    gemeente.style.display = "none";
                    gemeenteM.style.display = "none";
                    socialeZekerheid.style.display = "none";
                    sociaalFinish.style.display = "none";
                    jobSearch.style.display = "none";
                } else {
                    house.style.display = "none";
                }
            }

            function showNoHouse() {
                if (noHouse.checked) {
                    <?php
                    if (isset($_SESSION['user'])) {
                        $user = $_SESSION['user'];
                        $user->setStatus("No House");
                        $user->statusUpdate();
                    }
                    ?>
                    Accommodation.style.display = "flex";
                    gemeente.style.display = "none";
                    gemeenteM.style.display = "none";
                    socialeZekerheid.style.display = "none";
                    sociaalFinish.style.display = "none";
                    noSociaal.style.display = "none";
                    sociaalFinish.style.display = "none";
                    noSociaal.style.display = "none";
                    sociaalFinish.style.display = "none";
                    jobSearch.style.display = "none";
                } else {
                    noHouse.style.display = "none";
                }
            }

            function showGemeente() {
                if (yesHouse.checked) {
                    gemeente.style.display = "flex";
                    gemeenteM.style.display = "none";
                    socialeZekerheid.style.display = "none";
                    noSociaal.style.display = "none";
                    sociaalFinish.style.display = "none";
                } else {
                    gemeente.style.display = "none";
                }
            }

            function showGemeenteM() {
                if (noGemeente.checked) {
                    <?php
                    if (isset($_SESSION['user'])) {
                        $user = $_SESSION['user'];
                        $user->setStatus("Municipality");
                        $user->statusUpdate();
                    }
                    ?>
                    gemeenteM.style.display = "flex";
                    sociaalFinish.style.display = "none";
                    socialeZekerheid.style.display = "none";
                    noSociaal.style.display = "none";
                } else {
                    gemeenteM.style.display = "none";
                }
            }

            function showSocialeZekerheid() {
                if (yesGemeente.checked) {
                    socialeZekerheid.style.display = "flex";
                    gemeenteM.style.display = "none";
                } else {
                    socialeZekerheid.style.display = "none";
                }
            }

            function showNoSociaal() {
                if (noSocialeZekerheid.checked) {
                    noSociaal.style.display = "flex";
                    gemeenteM.style.display = "none";
                    sociaalFinish.style.display = "none";
                } else {
                    noSociaal.style.display = "none";
                }
            }

            function showSociaalFinish() {
                if (yesSocialeZekerheid.checked) {
                    <?php
                    if (isset($_SESSION['user'])) {
                        $user = $_SESSION['user'];
                        $user->setStatus("Finished");
                        $user->statusUpdate();
                    }
                    ?>
                    sociaalFinish.style.display = "flex";
                    gemeenteM.style.display = "none";
                    noSociaal.style.display = "none";

                } else {
                    sociaalFinish.style.display = "none";
                }
            }

            function showNoMoney() {
                if (noMoney.checked) {
                    <?php
                    if (isset($_SESSION['user'])) {
                        $user = $_SESSION['user'];
                        $user->setStatus("Job Seeker");
                        $user->statusUpdate();
                    }
                    ?>
                    jobSearch.style.display = "flex";
                    house.style.display = "none";
                    Accommodation.style.display = "none";
                    gemeente.style.display = "none";
                    gemeenteM.style.display = "none";
                    socialeZekerheid.style.display = "none";
                    sociaalFinish.style.display = "none";
                    noStudy.checked = false;
                    yesStudy.checked = false;
                    noStudy2.checked = false;
                    yesStudy2.checked = false;
                    noStudy3.checked = false;
                    yesStudy3.checked = false;
                    yesSocialeZekerheid.checked = false;
                    noSocialeZekerheid.checked = false;
                    yesGemeente.checked = false;
                    noGemeente.checked = false;
                    yesHouse.checked = false;
                    noHouse.checked = false;
                    moneyEmployed.checked = false;
                    moneyEquity.checked = false;
                }
            }
        </script>


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