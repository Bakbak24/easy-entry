<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Easy Entry</title>
  <link rel="stylesheet" href="css/style.css" />
  <script src="https://kit.fontawesome.com/8ead13f8af.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="./images/icon.png">
  <script src="js/theme.js" defer></script>
</head>

<body>
  <header>
    <?php include_once 'nav.php'; ?>
    <div id="welcoming-content">
      <div id="content">
        <h1>Welcome in Belgium</h1>
      </div>
    </div>
  </header>
  <main>
    <section id="simulation-section">
      <div id="simulation-content">
        <div id="content">
          <div id="content-image"></div>
          <div id="content-details">
            <h2>Start your immigration process</h2>
            <a href="simulator.php">
              <button type="button" id="simulation-btn">Start here</button>
            </a>
          </div>
        </div>
      </div>
    </section>
    <br />
    <h1>Theme's</h1>
    <div id="sub-themes">
      <h2 class="theme-categorie-h2" id="sta"><i class="fa fa-home" aria-hidden="true" style="color:var(--white-color);"></i>Stay</h2>
      <h2 class="theme-categorie-h2" id="mon"><i class="fa fa-eur" aria-hidden="true" style="color:var(--blue-color);"></i>Money</h2>
      <h2 class="theme-categorie-h2" id="edu"><i class="fa-solid fa-graduation-cap" aria-hidden="true" style="color:var(--blue-color);"></i>Education</h2>
    </div>
    <section id="themes-section">

      <div id="stay" class="themes" data-theme="stay">

        <div class="all-themes">
          <div class="theme-content" data-page="registration-municipality.php" data-theme="stay">
            <h3>
              Registration <br />
              Municipality
            </h3>
            <img src="images/Registration Municipality.svg" alt="Registration" />
          </div>
          <div class="theme-content" data-page="accommodation.php" data-theme="stay">
            <h3>Accommodation</h3>
            <img src="images/Accommodation.svg" alt="Accommodation" />
          </div>
          <div class="theme-content" data-page="family-unification.php" data-theme="stay">
            <h3>Family Unification</h3>
            <img src="images/Family Unification.svg" alt="Family Unification" />
          </div>
          <div class="theme-content" data-page="social-security.php" data-theme="stay">
            <h3>Social Security</h3>
            <img src="images/Social Security.svg" alt="Social Security" />
          </div>
          <div class="theme-content" data-page="civic-integration.php" data-theme="stay">
            <h3>Civic Integration</h3>
            <img src="images/Civic Integration.svg" alt="Civic Integration" />
          </div>
        </div>
      </div>
      <div id="money" class="themes" data-theme="money">

        <div class="all-themes" data-theme="money">
          <div class="theme-content" data-page="tax-declaration.php" data-theme="money">
            <h3>Tax Declarations</h3>
            <img src="images/Tax Declarations.svg" alt="Tax Declarations" />
          </div>
          <div class="theme-content" data-page="child-support.php" data-theme="money">
            <h3>Child Support</h3>
            <img src="images/Child Support.svg" alt="Child Support" />
          </div>
          <div class="theme-content" data-page="pension.php" data-theme="money">
            <h3>Pension</h3>
            <img src="images/Pension.svg" alt="Pension" />
          </div>
        </div>
      </div>
      <div id="education" class="themes" data-theme="education">
        <div class="all-themes" data-theme="education">
          <div class="theme-content" data-page="diploma-recognition.php" data-theme="education">
            <h3>Diploma Recognition</h3>
            <img src="images/Diploma Recognition.svg" alt="Diploma Recognition" />
          </div>
          <div class="theme-content" data-page="scholarship.php" data-theme="education">
            <h3>Scholarship</h3>
            <img src="images/Scholarship.svg" alt="Scholarship" />
          </div>
        </div>
      </div>
    </section>
  </main>
  <footer>
    <script>
      let sta = document.getElementById("sta");
      let mon = document.getElementById("mon");
      let edu = document.getElementById("edu");
      let allThemes = document.querySelectorAll(".theme-content");
      let divmoney = document.getElementById("money");
      let divstay = document.getElementById("stay");
      let divedu = document.getElementById("education");
      let stayicon = document.querySelector(".fa-home");
      let monicon = document.querySelector(".fa-eur");
      let eduicon = document.querySelector(".fa-graduation-cap");

      divmoney.style.display = "none";
      divedu.style.display = "none";

      sta.style.backgroundColor = "var(--blue-color)";
      sta.style.color = "var(--white-color)";
      stayicon.style.color = "var(--white-color)";

      sta.addEventListener("click", (event) => {
        divstay.style.display = "block";
        divmoney.style.display = "none";
        divedu.style.display = "none";
        sta.style.backgroundColor = "var(--blue-color)";
        sta.style.color = "var(--white-color)";
        stayicon.style.color = "var(--white-color)";

        mon.style.backgroundColor = "var(--white-color)";
        mon.style.color = "var(--blue-color)";
        edu.style.backgroundColor = "var(--white-color)";
        edu.style.color = "var(--blue-color)";

        monicon.style.color = "var(--blue-color)";
        eduicon.style.color = "var(--blue-color)";

      });

      mon.addEventListener("click", (event) => {
        divmoney.style.display = "block";
        divstay.style.display = "none";
        divedu.style.display = "none";
        mon.style.backgroundColor = "var(--blue-color)";
        mon.style.color = "var(--white-color)";
        sta.style.backgroundColor = "var(--white-color)";
        sta.style.color = "var(--blue-color)";
        edu.style.backgroundColor = "var(--white-color)";
        edu.style.color = "var(--blue-color)";
        stayicon.style.color = "var(--blue-color)";
        monicon.style.color = "var(--white-color)";
        eduicon.style.color = "var(--blue-color)";
      });

      edu.addEventListener("click", (event) => {
        divedu.style.display = "block";
        divstay.style.display = "none";
        divmoney.style.display = "none";
        edu.style.backgroundColor = "var(--blue-color)";
        edu.style.color = "var(--white-color)";
        sta.style.backgroundColor = "var(--white-color)";
        sta.style.color = "var(--blue-color)";
        mon.style.backgroundColor = "var(--white-color)";
        mon.style.color = "var(--blue-color)";
        stayicon.style.color = "var(--blue-color)";
        monicon.style.color = "var(--blue-color)";
        eduicon.style.color = "var(--white-color)";

      });
    </script>
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