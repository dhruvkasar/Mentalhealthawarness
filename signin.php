<?php
session_start();
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    // Modify the SQL to select first name
    $stmt = $conn->prepare("SELECT id, fname, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fname'] = $user['fname']; // Store first name in session
            header("Location: index.php"); // Change to .php
            exit();
        } else {
            $error = "Invalid password!";
        }
    } else {
        $error = "No account found with that email!";
    }
    
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="The Mental Health Awareness Organization (MHA Org) helps spread awareness and shed light to different mental health problems, the various ways to cope with them, how to help others who might be struggling, and how to spread awareness yourself.">
    <meta name="keywords" content="Mental, Health, Awareness, Help, Depression, Anxiety, PTSD">
    <meta name="author" content="Madyar Kozhakhmetov">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FontAwesome link below -->
    <script src="https://use.fontawesome.com/5d5a7b196b.js"></script>
    <!-- Google Fonts link below -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet"> 
    <!-- Bootstrap link below -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- CSS link below -->
    <link rel="stylesheet" href="assets/css/style.css">
    <title>MHA Sign In</title>
</head>
<body>
    <script src="formvalidation.js"></script>
    <?php if (isset($error)): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>

    <header>
        <nav class="navbar navbar-expand-lg my-0 navbar-light" id="custom-nav-css"> <!-- navbar uses bootstrap code seen as seen in https://getbootstrap.com/docs/4.0/components/navbar/ -->
        <div class="container-fluid"> 
            <a class="navbar-brand" id="custom-navbar-brand-mobile-responsiveness" href="index.php">
                <img src="assets/images/mha.png" class="d-inline-block align-top" alt="Mental Health Awareness Organization logo" loading="lazy">
                MHA 
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="nav navbar-nav mx-auto">
                    <li><a class="nav-link mha-nav" href="educate-yourself.php">Educate Yourself</a></li>
                    <li><a class="nav-link mha-nav" href="help-yourself.php">Help Yourself</a></li>
                    <li><a class="nav-link mha-nav" href="help-others.php">Help Others</a></li>
                    <li><a class="nav-link mha-nav" href="spread-the-word.php">Spread the Word</a></li> 
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="nav-link mha-nav active mha-active" href="signin.php">Sign In <span id="mha-navbar-right-space"> | </span> Sign Up</a></li>
                </ul>
            </div>
        </div>
        </nav>
    </header>
    
    <section class="sign-in-page">
    <div class="sign-in">
        <div class="sign-in">
            <div class="sign-in-logo"><img src="assets/images/mha.png" alt="Logo"></div>
            <div class="sign-in-form">
                <form action="signin.php" method="POST" novalidate>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="pass" placeholder="Password" required>
                    <input type="submit" value="Sign In">
                </form>
            </div>
        <div class="sign-in-redirect">Don't have an account? <a href="signup.php" aria-label="Link to the 'Sign Up' page">Sign Up<i class="fa fa-angle-right"></i></a></div>
    </div>
    </section>

    <footer> 
        <div class="black-background"></div>
        <div class="top-footer">
            <div class="top-left">
                <img src="assets/images/india.png" id="flag" alt="Flag of the United States of America." loading="lazy">
                English
            </div>
            <div class="top-right">
                <a href="https://x.com/_withdhruv" target="_blank" aria-label="Link to the Twitter home page"><i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com/" target="_blank" aria-label="Link to the Facebook home page"><i class="fa fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/yoursiktara/" target="_blank" aria-label="Link to the Instagram home page"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
        <div class="bottom-footer">
            <div class="bottom-left">
                © 2020 Mental Health Awareness 
            </div>
            <div class="bottom-right">
                <span>Privacy Notice</span><br>
                <span>Terms of Service</span>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Javascript bundle -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>
