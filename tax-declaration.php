<?php
$current_page = basename($_SERVER['PHP_SELF']);

include_once(__DIR__ . "/includes/themes.inc.php");
$current_theme = null;

foreach ($themes as $theme_key => $theme) :
    if ($current_page === $theme_key) :
        $current_theme = $theme;
        break;
    endif;
endforeach;


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Easy Entry</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/registration.scss" />
    <link rel="icon" type="image/x-icon" href="./images/icon.png">
    <script src="js/switching-steps.js" defer></script>
</head>

<body>
    <header>
        <?php include_once 'nav.php'; ?>
    </header>
    <main>
        <div class="theme-info">
            <h1>Tax Declaration</h1>
            <p>
                Tax declaration is a vital procedure in Belgium, where individuals and businesses disclose income and expenses for tax assessment. It's essential for complying with tax laws and regulations, minimizing the risk of penalties and legal complications. Seeking assistance from tax authorities or professionals can streamline the process and optimize potential benefits, ensuring accurate and efficient tax reporting.
            </p>
        </div>
        <div class="step-plan">
      <h1>Step-By-Step Plan</h1>
      <div class="steps">
        <div class="steps-left">
          <div id="step1" class="step">
            <div class="step-image">
              <img src="<?php echo $current_theme["step1"]["image"]; ?>" alt="Step 1" />
            </div>
            <div class="step-info">
              <button><?php echo $current_theme["step1"]["button"]; ?></button>
              <h2><?php echo $current_theme["step1"]["title"]; ?></h2>
              <p>
                <?php echo $current_theme["step1"]["description"]; ?>
              </p>
            </div>
          </div>
        </div>
        <div class="steps-right">
          <div class="step-tw step" id="step2">
            <div class="step-image">
              <img src="<?php echo $current_theme["step2"]["image"]; ?>" alt="Step 2" />
            </div>
            <div class="step-info">
              <button><?php echo $current_theme["step2"]["button"]; ?></button>
              <h2><?php echo $current_theme["step2"]["title"]; ?></h2>
              <p>
                <?php echo $current_theme["step2"]["description"]; ?>
              </p>
            </div>
          </div>
          <div class="step-th step" id="step3">
            <div class="step-image">
              <img src="<?php echo $current_theme["step3"]["image"]; ?>" alt="Step 3" />
            </div>
            <div class="step-info">
              <button><?php echo $current_theme["step3"]["button"]; ?></button>
              <h2><?php echo $current_theme["step3"]["title"]; ?></h2>
              <p>
                <?php echo $current_theme["step3"]["description"]; ?>
              </p>
            </div>
          </div>
        </div>
      </div>
        <iframe id="yt-frame" src="https://www.youtube.com/embed/i7LqhwaeOaI" frameborder="2" allowfullscreen></iframe>
        <section id="contact-section">
            <div id="contact-details">
                <h2>Did you miss anything?</h2>
                <p>Please let us know! Your feedback is invaluable and helps us make RefugeeHelp even better. Please use this
                    form to share suggestions about our website. Please note that this form is for suggestions related to the
                    website only and not for personal questions or requests. We unfortunately cannot respond to each suggestion
                    individually, but we greatly appreciate all your input.</p>
            </div>
            <div id="contact-form">
                <form id="ctct-form">
                    <label for="text">Reason</label>
                    <input type="text" name="name" id="name" placeholder="Your type suggestion" />
                    <label for="message">Can you explain more about this</label>
                    <textarea name="message" id="message" placeholder="Your explanation" maxlength="264"></textarea>
                    <button type="submit">Send</button>
                </form>
            </div>
        </section>
    </main>
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