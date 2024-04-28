<?php
$current_page = basename($_SERVER['PHP_SELF']);

$themes = [
  "registration-municipality.php" => [
    "step1" => [
      "button" => "Step 1",
      "title" => "Prepare your documents",
      "description" => "Make sure you have all the necessary documents ready for your immigration. Here you will find information on what documents are needed and where to obtain them. Check your municipality's website for specific requirements. Good preparation will make your immigration process smoother.",
      "image" => "images/registration-step-1.png"
    ],
    "step2" => [
      "button" => "Step 2",
      "title" => "Make an appointment at the municipality",
      "description" => "You need to make an appointment at the municipality to register your address. You can do this online or by phone. Make sure you have all the necessary documents ready for your appointment. You will need to bring these documents with you to the appointment.",
      "image" => "images/registration-step-2.png"
    ],
    "step3" => [
      "button" => "Step 3",
      "title" => "Within 2 weeks, the neighborhood agent visits",
      "description" => "After you have registered your address at the municipality, a neighborhood agent will visit you within 2 weeks. The neighborhood agent will check your address and ask you some questions about your living situation. This is a standard procedure and is done to ensure that you are living at the address you have registered.",
      "image" => "images/registration-step-3.png"
    ],
  ],
  "accommodation.php" => [
    "step1" => [
      "button" => "Step 1",
      "title" => "Find a place to live",
      "description" => "You need to find a place to live before you can register your address at the municipality. You can rent or buy a house or apartment. Make sure you have all the necessary documents ready for.",
      "image" => "images/accommodation-step-1.png"
    ],
    "step2" => [
      "button" => "Step 2",
      "title" => "Sign a rental agreement",
      "description" => "Once you have found a place to live, you need to sign a rental agreement with the landlord. Make sure you read the rental agreement carefully and understand all the terms and conditions. You will need to provide a copy of the rental agreement when you register your address at the municipality.",
      "image" => "images/accommodation-step-2.png"
    ],
    "step3" => [
      "button" => "Step 3",
      "title" => "Register your address at the municipality",
      "description" => "You need to register your address at the municipality within 5 days of moving in. You can do this online or by phone. Make sure you have all the necessary documents ready for your appointment. You will need to bring these documents with you to the appointment.",
      "image" => "images/accommodation-step-3.png"
    ],
  ],
];
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
  <link rel="icon" type="image/x-icon" href="./images/icon.png">
  <!-- <script src="js/data-switching.js" defer></script> -->
</head>

<body>
  <header>
    <nav>
      <div id="nav-left">
        <a href="index.php">
          <div id="logo"></div>
        </a>
        <div id="menu">
          <ul id="menu-list">
            <li><a href="#my-tracker">My Tracker</a></li>
            <li><a href="#themes-section">Themes</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </div>
      <div id="nav-right">
        <a href="register.php">
          <button type="button" id="register-btn">SIGN UP</button>
        </a>
        <a href="#login">
          <button type="button" id="login-btn">LOGIN</button>
        </a>
      </div>
      <div id="hamburger">
        <a href="javascript:void(0);" onclick="navigator()">
          <img src="images/burger.svg" alt="">
        </a>
      </div>
    </nav>
    <div id="side-menu" class="hide-nav">
      <div id="side-menu-links">
        <ul id="menu-list">
          <li><a href="#my-tracker">My Tracker</a></li>
          <li><a href="#themes-section">Themes</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </div>
      <div id="side-menu-register">
        <a href="register.php">
          <button type="button" id="register-btn">SIGN UP</button>
        </a>
        <a href="login.php">
          <button type="button" id="login-btn">LOGIN</button>
        </a>
      </div>
    </div>
  </header>
  <main>
    <div class="theme-info">
      <h1>Registration Municipality</h1>
      <p>Discover how easy it is to register at the municipality and take the first steps towards your new life in
        Belgium. Together we will work to make your integration go smoothly so that you can quickly and smoothly begin
        your new adventure in our country.</p>
    </div>
    <div class="step-plan">
      <h1>Step-By-Step Plan</h1>
      <div class="steps">
        <div class="steps-left">
          <div id="step1" class="step">
            <div class="step-image">
              <img src="<?php echo $current_theme["step1"]["image"]; ?>" alt="Step 1" />
            </div>
            <button><?php echo $current_theme["step1"]["button"]; ?></button>
            <h2>
              <?php echo $current_theme["step1"]["title"]; ?>
            </h2>
            <p>
              <?php echo $current_theme["step1"]["description"]; ?>
            </p>
          </div>
        </div>
        <div class="steps-right">
          <div class="step-tw step" id="step2">
            <div class="steps-image">
              <img src="<?php echo $current_theme["step2"]["image"]; ?>" alt="Step 2" />
            </div>
            <div class="steps-info">
              <button><?php echo $current_theme["step2"]["button"]; ?></button>
              <p><?php echo $current_theme["step2"]["title"]; ?></p>
            </div>
          </div>
          <div class="step-th step" id="step3">
            <div class="steps-image">
              <img src="<?php echo $current_theme["step3"]["image"]; ?>" alt="Step 3" />
            </div>
            <div class="steps-info">
              <button><?php echo $current_theme["step3"]["button"]; ?></button>
              <p><?php echo $current_theme["step3"]["title"]; ?></p>
            </div>
          </div>
        </div>

      </div>
      <script>
        document.addEventListener("DOMContentLoaded", function() {
          const steps = document.querySelectorAll(".step");

          steps.forEach((step) => {
            step.addEventListener("click", () => {
              const stepsParent = step.parentNode;
              if (stepsParent.classList.contains('steps-right')) {
                const leftColumn = document.querySelector('.steps-left');
                const rightColumn = document.querySelector('.steps-right');
                if (leftColumn.children.length > 0) {
                  // Move the step from the left column back to the right column
                  rightColumn.appendChild(leftColumn.children[0]);
                }
                // Move the clicked step to the left column
                leftColumn.appendChild(step);
              } else {
                // Move the clicked step after the first child in the right column
                stepsParent.insertBefore(step, stepsParent.childNodes[1]);
              }
            });
          });
        });
      </script>

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