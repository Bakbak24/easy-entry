<?php
include_once(__DIR__ . "/classes/User.php");

if (!empty($_POST)) {
    try {
        if (empty($_POST['firstName']) || empty($_POST['surName']) || empty($_POST['e-mail']) || empty($_POST['password'])) {
            throw new Exception("Please fill in all fields.");
        } else {
            $user = new User();
            $options = [
                'cost' => 12,
            ];
            $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);
            $user->setFirstname($_POST['firstName']);
            $user->setLastname($_POST['surName']);
            $user->setEmail($_POST['e-mail']);
            $user->setPassword($hashedPassword);
            $user->setStatus('onbekend');
            $user->save();
            session_start();
            $_SESSION['user'] = $user;
            header('Location: index.php');
        }
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
    <title>Sign up</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once 'nav.php'; ?>
    <div class="content-register">
        <h2>Create Account</h2>
        <div class="content-register-form">
            <form action="" method="post">
                <?php
                if (isset($error)) {
                    echo "<div class='alert alert-danger' role='alert'>$error</div>";
                }
                ?>
                <div class="register-form-label-user-wrapped">
                    <div class="register-form-label">
                        <label for="firstName">Firstname</label>
                        <input type="text" name="firstName" id="firstName">
                    </div>
                    <div class="register-form-label">
                        <label for="surName">Surname</label>
                        <input type="text" name="surName" id="surName">
                    </div>
                </div>
                <div class="register-form-label">
                    <label for="e-mail">Email</label>
                    <input type="email" name="e-mail" id="e-mail">
                </div>
                <div class="register-form-label">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="register-form-label">
                    <button>Sign Up</button>
                </div>
                <hr class="hr-text" data-content="Or Sign Up with google">
                <div class="register-form-label">
                    <button id="signup-google"> <img src="./images/google.svg" alt=""> Sign Up with Google</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="javascript/script.js">
</script>

</html>