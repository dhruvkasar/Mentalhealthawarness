<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="The Mental Health Awareness Organization (MHA Org) helps spread awareness and shed light to different mental health problems, the various ways to cope with them, how to help others who might be struggling, and how to spread awareness yourself.">
    <meta name="keywords" content="Mental, Health, Awareness, Help, Depression, Anxiety, PTSD">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap link below -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- FontAwesome link below -->
    <script src="https://use.fontawesome.com/5d5a7b196b.js"></script>
    <!-- Google Fonts link below -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet"> 
    <!-- CSS link below -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Mental Health Awareness Organization</title>
</head>
<body>
    <header>
        
        <nav class="navbar navbar-expand-lg my-0 navbar-light" id="custom-nav-css"> <!-- navbar uses bootstrap code seen as seen in https://getbootstrap.com/docs/4.0/components/navbar/ -->
        <div class="container-fluid"> 
            <a class="navbar-brand active" href="index.php" id="custom-navbar-brand-mobile-responsiveness">
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
                            <?php if(isset($_SESSION['fname'])): ?>
                    <li class="nav-item">
                        <span class="nav-link mha-nav">
                            Welcome, <?php 
                            echo htmlspecialchars($_SESSION['fname']); 
                            ?>
                            <a href="logout.php" style="color: inherit; margin-left: 10px;">(Logout)</a>
                        </span>
                    </li>
                <?php else: ?>
                    <li><a class="nav-link mha-nav" href="signin.php">Sign In <span id="mha-navbar-right-space"> | </span> Sign Up</a></li>
                <?php endif; ?>
                </ul>
            </div>
        </div>
        </nav>
    </header>
    
    <section class="mental-health-main-information-home">
        <div class="hero-text">
            <div><span class="mha-hero-underline">Mental Health</span></div> <!-- the div was added to create a custom bottom margin -->
            <a href="educate-yourself.php" aria-label="Link to the 'Educate Yourself' page">What is it?</a><br>
            <a href="help-yourself.php" aria-label="Link to the 'Help Yourself' page">How can you help yourself?</a><br>
            <a href="help-others.php" aria-label="Link to the 'Help Others' page">How can you help others?</a><br>
        </div>
        <div class="mha-get-started">
        <?php if(isset($_SESSION['user_id'])): ?>
            <div class="logged-in-message">
                Welcome back! You're logged in as <?php echo htmlspecialchars($_SESSION['fname']); ?>
            </div>
        <?php else: ?>
            <a href="signup.php" aria-label="Link to the 'Sign Up' page">
                <div class="get-started-button">Get started</div>
            </a>
            <a href="spread-the-word.php" class="start-spreading-awareness" aria-label="Link to the 'Spread the Word' page">
                Start spreading awareness<i class="fa fa-angle-right"></i>
            </a>
        <?php endif; ?>
        </div>
    </section>

    <section class="hero-image-home">
        <div class="hero-image"> <!-- hero image background coloring structure found on stackoverflow. check README.md file for further information -->
            <img src="assets/images/homepagemen.jpg" alt="Man battling with mental health issues" loading="lazy">
        </div>
        <div class="content">
            <h1>"You wake up every morning to fight the same demons that left you so tired the night before."</h1>
            <p id="message-summary">We set out to hear the stories of the many men and women who battle with mental health problems everyday.</p>
            <a href="educate-yourself.php#stories" aria-label="Link to the 'Story' section of the 'Educate Yourself' page"><p id="callout-hero-image">Listen to their stories<i class="fa fa-angle-right"></i></p></a>
        </div>
    </section>

    <section class="mental-health-more-information-home">
        <!-- Main types of mental health issues: Depression, Anxiety, PTSD -->
        <div class="depression-home">
            <div class="depression-image">
                <img src="assets/images/SSR-depressed.jpg" id="depressed-man" alt="Picture of a man struggling with depression." loading="lazy">
            </div>
            <div class="depression-text">
                <h1>Guidance on how to manage depression.</h1>
                <p>Depression is a mood disorder that causes a persistent feeling of sadness and loss 
                of interest. You may have trouble doing normal day-to-day activities, and sometimes 
                you may feel as if life isn't worth living.</p>
                <a href="help-yourself.php#depression" aria-label="Link to the 'Depression' text in the 'Help Yourself' page"><p>Learn about dealing with depression<i class="fa fa-angle-right"></i></p></a>
            </div>
        </div>

        <div class="anxiety-home">
            <div class="anxiety-image">
                <img src="assets/images/deep-girl.jpg" id="anxious-woman" alt="Picture of a woman dealing with anxiety." loading="lazy">
            </div>
            <div class="anxiety-text">
                <h1>Guidance on how to manage anxiety.</h1>
                <p>Anxiety is a feeling of uneasiness, usually defined as an overreaction to a situation 
                that is only subjectively seen as menacing. It is often accompanied by restlessness, fatigue 
                and problems in concentration.</p>
                <a href="help-yourself.php#anxiety" aria-label="Link to the 'Anxiety' text in the 'Help Yourself' page"><p>Learn about dealing with anxiety<i class="fa fa-angle-right"></i></p></a>
            </div>
        </div>

        <div class="ptsd-home">
            <div class="ptsd-image">
                <img src="assets/images/ptsdimage.jpg" id="woman-with-PTSD" alt="Picture of a woman dealing with PTSD." loading="lazy">
            </div>
            <div class="ptsd-text">
                <h1>Guidance on how to manage PTSD.</h1>
                <p>Post-traumatic stress disorder is a condition that's triggered by a 
                terrifying event — either experiencing it or witnessing it. Symptoms may 
                include flashbacks, nightmares, and uncontrollable thoughts about the event.</p>
                <a href="help-yourself.php#ptsd" aria-label="Link to the 'PTSD' text in the 'Help Yourself' page"><p>Learn about dealing with PTSD<i class="fa fa-angle-right"></i></p></a>
            </div>
        </div>
    </section>

    <section class="mental-health-awareness-newsletter-home">
        <div class="newsletter">
            <div class="newsletter-callout">
                <h1>Receive mental health guidance from professionals.</h1>
                <p>Join our email list to receive monthly news about events from our community, 
                support articles, written testimonials, tips from industry professionals, and more.</p>
            </div>
            <div class="newsletter-form">
                <form action="https://formdump.codeinstitute.net/" target="_blank" method="post" autocomplete="on">
                    <label for="email">Enter your email here</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email address." aria-label="An input field where you can enter your email">
                    <input type="submit" value="Sign up now" aria-label="Register button">
                </form>
            </div>
        </div>
    </section>

    <section class="hero-image-home-2">
        <img src="assets/images/_dsc7203.jpg" class="full-size-image" alt="Image of a group hugging each other as a sign of community and collaboration." loading="lazy">
    </section>

    <section class="mental-health-awareness-community-home">
        <div class="community-callout-text">
            <h1 class="mha-heading">Let's fight mental health stigma together.</h1>
            <p class="mha-paragraph">Join our Mental Health Awareness community and educate yourselves as 
            well as others around you about the different mental health issues worldwide.</p>
            <div class="mha-get-started">
            <?php if(isset($_SESSION['user_id'])): ?>
            <div class="logged-in-message">
                Welcome back! You're logged in as <?php echo htmlspecialchars($_SESSION['fname']); ?>
            </div>
        <?php else: ?>
            <a href="signup.php" aria-label="Link to the 'Sign Up' page">
                <div class="get-started-button">Get started</div>
            </a>
            <a href="spread-the-word.php" class="start-spreading-awareness" aria-label="Link to the 'Spread the Word' page">
                Start spreading awareness<i class="fa fa-angle-right"></i>
            </a>
        <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="mental-health-emergency">
        <h1>Get real support from real people.</h1>
        <div class="mental-health-emergency-content">
            <div class="call-emergency">
                <h1>Call an emergency lifeline.</h1>
                <p>The lifeline provides 24/7, free, and confidential support for people in 
                distress and who are thinking of hurting themselves.</p>
                <a href="help-yourself.php#suicide-hotline-resources" aria-label="Link to the 'Suicide Hotlines' section of the 'Help Yourself' page"><p>Call them here<i class="fa fa-angle-right"></i></p></a>
            </div>
            <div class="support-center">
                <h1>Support Center.</h1>
                <p>Access helpful tips, articles, videos, and more resources to get help when 
                confronting your mental health struggles.</p>
                <a href="help-yourself.php#help-yourself-resources" aria-label="Link to the 'Resources' section of the 'Help Yourself' page">
                    <p>Visit our support center<i class="fa fa-angle-right"></i></p>
                </a>
            </div>
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
                © 2025 Mental Health Awareness 
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