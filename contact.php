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
    </header>
    <main>
        <h2 id="ctc-h2">Contact Us</h2>
    <section id="ctc-section">
        <div id="ctc-details">
            <div id="ctc-image"></div>
            <div id="details">
                <h2>Call Us</h2>
                <p>Monday to Friday from 9 a.m. to 5 p.m.</p>
                <button>Bel +32 02 488 80 00</button>
            </div>
        </div>
        <div id="ctc-form">
          <form id="ctct-form">
            <label for="text">Name</label>
            <input type="text" name="name" id="name" placeholder="Your Name" required/>
            <label for="text">Email</label>
            <input type="text" name="eml" id="eml" placeholder="Your Email" required/>
            <label for="message">Write Your Message</label>
            <textarea name="message" id="message" placeholder="Write Your Message" maxlength="264" required></textarea>
            <button type="submit">Send</button>
          </form>
        </div>
      </section>
    </main>
    <?php include_once("includes/footer.inc.php");?>
</body>

<script src="javascript/script.js">
</script>

</html>