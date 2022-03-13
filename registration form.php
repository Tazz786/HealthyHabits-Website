<?php require_once('includes/functions.php'); ?>
<?php
    $errors = [];
    if(isset($_POST['register'])) {
        $errors = registerUser($_POST);
        if(count($errors) === 0)
            redirect('myServices.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration form</title>
        <link rel="stylesheet" type="text/css" href="style/registrationform.css"/>
    </head>
    <body>
        <div class="container">
            <div class="title">Registration</div>
            <div class="content">

                <!-- registration form -->
                <!-- maybe put the onsubmit= "return false"-->
                <form method="post">
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">First Name</span>
                            <input name="firstname" type="text" placeholder="Enter your last name" id="firstname"
                            <?php displayValue($_POST, 'firstname'); ?> >
                            <?php displayError($errors, 'firstname'); ?>
                        </div>
                        <div class="input-box">
                            <span class="details">Last Name</span>
                            <input name="lastname" type="text" placeholder="Enter your last name" id="lastname"
                            <?php displayValue($_POST, 'lastname'); ?> >
                            <?php displayError($errors, 'lastname'); ?>
                        </div>
                        <div class="input-box">
                            <span class="details">Email</span>
                            <input name="email" type="text" placeholder="Enter your email" id="email"
                            <?php displayValue($_POST, 'email'); ?> >
                            <?php displayError($errors, 'email'); ?>
                        </div>
                        <div class="input-box">
                            <span class="details">Phone Number</span>
                            <input name="phone"type="text" placeholder="+61 4xxx xxx xxx" id="phone"
                            <?php displayValue($_POST, 'phone'); ?> >
                            <?php displayError($errors, 'phone'); ?>
                        </div>
                        
                        <!-- example used from https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_js_rangeslider_pic -->
                        <div class="slidecontainer">
                            <p>Age: <span id="demo"></span></p>
                            <div id="ageError"></div>
                            <input name="age" type="range" min="0" max="100" class="slider" id="age"
                            <?php displayValue($_POST, 'age'); ?>
                            <?php if(!isset($_POST['age'])) echo 'value="1"'; ?> >
                        </div>
                        <?php displayError($errors, 'age'); ?>
                        <script>
                            var slider = document.getElementById("age");
                            var output = document.getElementById("demo");
                            output.innerHTML = slider.value;
                            
                             slider.oninput = function() {
                               output.innerHTML = this.value;
                             }
                        </script>
                    </div>
                    
                    <!-- Lab09_acode archive (https://rmit.instructure.com/courses/79695/files/20753484?wrap=1) 
                            Used student and employment example -->

                    <!--student status details-->
                    <div class="form-group">
                        <div>Student Status</div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio"
                                id="student-status-yes" name="student-status" value="true"
                                <?php displayChecked($_POST, 'student-status', 'true'); ?> />
                            <label class="form-check-label" for="student-status-yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio"
                                id="student-status-no" name="student-status" value="false"
                                <?php displayChecked($_POST, 'student-status', 'false'); ?> />
                            <label class="form-check-label" for="student-status-no">No</label>
                        </div>
                        <?php displayError($errors, 'student-status'); ?>
                    </div>
                    <!--Employment status details-->
                    <div class="form-group">
                        <br>
                        <div>Employment Status</div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio"
                                id="employment-status-yes" name="employment-status" value="true"
                                <?php displayChecked($_POST, 'employment-status', 'true'); ?> />
                            <label class="form-check-label" for="employment-status-yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio"
                                id="employment-status-no" name="employment-status" value="false"
                                <?php displayChecked($_POST, 'employment-status', 'false'); ?> />
                            <label class="form-check-label" for="employment-status-no">No</label>
                        </div>
                        <?php displayError($errors, 'employment-status'); ?>
                    </div>
                    <br>
                    <div class="user-details">
                        <div class="input-box">
                            <span class="details">Password</span>
                            <input type="password" id="password" name="password" placeholder="password format: Xdvd_pl3 or Hello-12" >
                            <?php displayError($errors, 'password'); ?>
                        </div>
                        <br>
                        <div class="input-box">
                            <span class="details">Confirm Password</span>
                            <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm your password" >
                            <?php displayError($errors, 'confirmPassword'); ?>
                        </div>
                    </div>
                    <div class="button">
                            <input name="register" type="submit" value="sign up">
                            <!-- maybe do return onclick-->
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>