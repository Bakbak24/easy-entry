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
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="./images/icon.png">
</head>

<body>
    <?php include_once 'nav.php'; ?>
    <div class="content-register" id="content-login">
        <h2>Login</h2>
        <div class="content-register-form">
            <form action="" method="post">
                <?php
                if (isset($error)) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
                ?>
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
<script src="javascript/script.js">
</script>

</html>