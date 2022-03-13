<!--Header-->
<div class="header">
    <div class="head1">Life</div>
    <div class="head2">Living it Full Everyday</div>
</div>
<div class="navbar" style="z-index: 2;">
    <a href="index.php">Home</a>
    <?php if(isUserLoggedIn()) { ?>
        <a href="myServices.php" class="nav-item nav-link">myServices</a>
    <?php } ?> <!-- should the link if use is logged in-->
    <a href="contactForm.html">Contact</a>
    <div class="dropdown">
        <button class="dropbtn">Services
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="yoga.html">Yoga</a>
            <a href="meditation.html">Meditation</a>
            <a href="stretching.html">Stretching</a>
            <a href="HealthyHabits.html">Healthy Habits</a>
        </div>
    </div>
    <div class="navbar-nav ml-auto">
        <?php if(isUserLoggedIn()) { ?>
            <span class="nav-item nav-link text-light">
                Welcome, <?= getLoggedInUser()['first_name']; ?>
            </span>
            <a href="logout.php" class="nav-item nav-link">Logout</a>
            <?php } else { ?>
                <a href="registration form.php" class="navbar-log">Sign up</a>
                <a href="login.php" class="nav-item nav-link">Login</a>
        <?php } ?>
    </div>
</div>
