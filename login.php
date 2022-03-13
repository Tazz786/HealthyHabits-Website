<?php require_once('includes/functions.php'); ?>
<?php
    $errors = [];
    if(isset($_POST['login'])) {
        $errors = loginUser($_POST);

        if(count($errors) === 0)
            redirect('myServices.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Login Page</title>
        <?php require_once('includes/header.php'); ?>
        <link rel="stylesheet" type="text/css" href="style/index.css"/>
    </head>
    <body>
        <?php require_once('includes/navbar.php'); ?>
        <div class="container">
            <h4 class="display-1">Login</h4>
            <div class="row">
                <div class="col-sm-8 col-md-6">
                    <form method="post">
                        <div class="form-group">
                            <label for="lastname">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                            <?php displayValue($_POST, 'email'); ?> />
                            <?php displayError($errors, 'email'); ?>
                        </div>
                        <div class="form-group">
                            <label for="phone">Password</label>
                            <input type="password" class="form-control" id="password" name="password" />
                            <?php displayError($errors, 'password'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary" name="login" value="login">Login</button>
                        <br>
                    </form>
                </div>
            </div>
        </div>
        <?php require_once('includes/footer.php'); ?>
    </body>
</html>