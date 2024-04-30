<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Easy Entry</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="icon" type="image/x-icon" href="./images/icon.png">
  <script src="js/theme.js" defer></script>
</head>

<body>
  <header>
    <?php include_once 'nav.php'; ?>
    <div id="welcoming-content">
      <div id="content">
        <h1>Welcome in Belgium</h1>
        <p>
          Are you on your way to immigrate to Belgium and would like to ease
          this process you can do so through our platform
        </p>
        <input type="search" name="search" id="search" placeholder="Search" />
      </div>
    </div>
  </header>
  <main>
    <section id="simulation-section">
      <div id="simulation-content">
        <div id="content">
          <div id="content-image"></div>
          <div id="content-details">
            <h2>Want to get a smooth start on your immigration process?</h2>
            <p>
              Discover your immigration options with our handy simulator!
              Answer a few simple questions and let us guide you to the right
              steps for your situation.
            </p>
            <a href="simulator.php">
              <button type="button" id="simulation-btn">Start here</button>
            </a>
          </div>
        </div>
      </div>
    </section>
    <br />
    <section id="themes-section">
      <h1>Theme's</h1>
      <div id="stay">
        <h2 class="theme-categorie-h2" id="sta">Stay</h2>
        <div class="all-themes">
          <div class="theme-content" data-page="registration-municipality.php">
            <h3>
              Registration <br />
              Municipality
            </h3>
            <img src="images/Registration Municipality.svg" alt="Registration" />
          </div>
          <div class="theme-content" data-page="accommodation.php">
            <h3>Accommodation</h3>
            <img src="images/Accommodation.svg" alt="Accommodation" />
          </div>
          <div class="theme-content" data-page="family-unification.php">
            <h3>Family Unification</h3>
            <img src="images/Family Unification.svg" alt="Family Unification" />
          </div>
          <div class="theme-content" data-page="social-security.php">
            <h3>Social Security</h3>
            <img src="images/Social Security.svg" alt="Social Security" />
          </div>
          <div class="theme-content" data-page="civic-integration.php">
            <h3>Civic Integration</h3>
            <img src="images/Civic Integration.svg" alt="Civic Integration" />
          </div>
        </div>
      </div>
      <div id="money">
        <h2 class="theme-categorie-h2" id="mon">Money</h2>
        <div class="all-themes">
          <div class="theme-content" data-page="tax-declaration.php">
            <h3>Tax Declarations</h3>
            <img src="images/Tax Declarations.svg" alt="Tax Declarations" />
          </div>
          <div class="theme-content" data-page="child-support.php">
            <h3>Child Support</h3>
            <img src="images/Child Support.svg" alt="Child Support" />
          </div>
          <div class="theme-content" data-page="pension.php">
            <h3>Pension</h3>
            <img src="images/Pension.svg" alt="Pension" />
          </div>
        </div>
      </div>
      <div id="education">
        <h2 class="theme-categorie-h2" id="edu">Education</h2>
        <div class="all-themes">
          <div class="theme-content" data-page="diploma-recognition.php">
            <h3>Diploma Recognition</h3>
            <img src="images/Diploma Recognition.svg" alt="Diploma Recognition" />
          </div>
          <div class="theme-content" data-page="scholarship.php">
            <h3>Scholarship</h3>
            <img src="images/Scholarship.svg" alt="Scholarship" />
          </div>
        </div>
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