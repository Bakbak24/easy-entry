<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav>
        <div id="nav-left">
            <a href="index.html">
                <div id="logo">

                </div>
            </a>
            <div id="menu">
                <ul>
                    <li><a href="#my-tracker">My Tracker</a></li>
                    <li><a href="#themes-section">Theme's</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
        <div id="nav-right">
            <a href="register.php">
                <button type="button" id="register-btn">SIGN UP</button>
            </a>
            <a href="login.php">
                <button type="button" id="login-btn">LOGIN</button>
            </a>
        </div>
    </nav>
    <div class="content-register" id="content-login">
        <h2>Login</h2>
        <div class="content-register-form">
            <form action="#" method="POST">
                <div class="register-form-label">
                    <label for="e-mail">Email</label>
                    <input type="email" name="e-mail" id="e-mail">
                </div>
                <div class="register-form-label">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="register-form-label">
                    <button>Login</button>
                </div>
                <hr class="hr-text" data-content="Or log in with google">
                <div class="register-form-label">
                    <button id="signup-google"> <img src="./images/google.svg" alt=""> Login with Google</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>