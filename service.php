<?php require_once('includes/authorise.php'); ?>

<?php $meal_categories = getMealCategories(); 

//var_dump($services); 
?>
<?php
    $id = (int) $_GET['id'];
    $service = getService($id);

    $errors = [];
    if(isset($_POST['activity'])) {
        $email = getLoggedInUser()['email'];

        $errors = recordActivity($email, $id, $_POST);
    }
    // if statement for getting meal and sending to user_meal table by taking their email etc
    if(isset($_POST['user_meal'])) {
        $email = getLoggedInUser()['email'];

        $values = [
            'meal_id' => $_POST['meal_id'],
            'email' => $email,
            'servings' => '1'
        ];
        $action = insertMeal($values);
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
        <!-- call navbar here  -->
        <?php require_once("includes/navbar.php"); ?>

        <div class="container">
            <div class="mb-5">
                <h1 class="display-1">
                    <?php echo $service['name']; ?>
                    <img src="<?php echo $service['image_path']; ?>" class="service ml-5" width="200" height="300"/>
                </h1>
            </div>

            <?php if($id === 1) { ?> <!-- id ==1 because of first service-->
                <p>Select from our yoga classes below and start stiling your mind!</p>

                <?php // The form below is displayed if type has not been submitted. ?>
                <?php if(!isset($_POST['type'])) { ?>
                    <?php $serviceInstructions = getServiceInstructions($id); ?>

                    <form method="post">
                        <div class="form-group">
                            <?php foreach($serviceInstructions as $serviceInstruction) { ?>
                                <?php $t = $serviceInstruction['service_type']; ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                        id="<?php echo $t; ?>" name="type" value="<?php echo $t; ?>" />
                                    <label class="form-check-label" for="<?php echo $t; ?>"><?php echo $t; ?></label>
                                </div>
                            <?php } ?>
                            <?php if(isset($_POST['service'])) { ?>
                                <div class='text-danger'>You must select a yoga type.</div>
                            <?php } ?>
                        </div>

                        <button type="submit" class="btn btn-primary mr-5" name="service">Next</button>
                        <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
                    </form>
                <?php } else { ?>
                    <?php $serviceInstruction = getServiceInstruction($id, $_POST['type']); ?>

                    <h3><?php echo $serviceInstruction['service_type']; ?></h3>
                    <video class="my-3 service" height="400" controls>
                        <source src="<?php echo $serviceInstruction['path']; ?>" type="video/mp4">
                    </video>

                    <?php if(!isset($_POST['activity']) || count($errors) > 0) { ?>
                        <form method="post">
                            <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="duration">Duration (minutes)</label>
                                    <input type="text" class="form-control d-inline-block" id="duration" name="duration"
                                        <?php displayValue($_POST, 'duration'); ?> />
                                    <?php displayError($errors, 'duration'); ?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-5" name="activity">Record Activity</button>
                            <a href="" class="btn btn-outline-dark">Cancel</a>
                        </form>
                    <?php } else { ?>
                        <div class="alert alert-success">
                            You have successfully recorded <strong><?php echo $_POST['duration']; ?> minutes</strong> of
                            <strong><?php echo $_POST['type']; ?> Yoga</strong>.
                        </div>
                        <div>
                            <a href="" class="btn btn-outline-dark mr-5">More <?php echo $service['name']; ?></a>
                            <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } else if($id === 2) { ?> <!-- id ==2 because of second service-->
                <p>Select the type of meditation you would like?.</p>

                <?php // The form below is displayed if type has not been submitted. ?>
                <?php if(!isset($_POST['type'])) { ?>
                    <?php $serviceInstructions = getServiceInstructions($id); ?>

                    <form method="post">
                        <div class="form-group">
                            <?php foreach($serviceInstructions as $serviceInstruction) { ?>
                                <?php $t = $serviceInstruction['service_type']; ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                        id="<?php echo $t; ?>" name="type" value="<?php echo $t; ?>" />
                                    <label class="form-check-label" for="<?php echo $t; ?>"><?php echo $t; ?></label>
                                </div>
                            <?php } ?>
                            <?php if(isset($_POST['service'])) { ?>
                                <div class='text-danger'>Select the type of meditation you would like?.</div>
                            <?php } ?>
                        </div>

                        <button type="submit" class="btn btn-primary mr-5" name="service">Next</button>
                        <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
                    </form>
                <?php } else { ?>
                    <?php $serviceInstruction = getServiceInstruction($id, $_POST['type']); ?>

                    <h3><?php echo $serviceInstruction['service_type']; ?></h3>
                    <video class="my-3 service" height="400" controls>
                        <source src="<?php echo $serviceInstruction['path']; ?>" type="video/mp4">
                    </video>

                    <?php if(!isset($_POST['activity']) || count($errors) > 0) { ?>
                        <form method="post">
                            <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="duration">Duration (minutes)</label>
                                    <input type="text" class="form-control d-inline-block" id="duration" name="duration"
                                        <?php displayValue($_POST, 'duration'); ?> />
                                    <?php displayError($errors, 'duration'); ?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-5" name="activity">Record Activity</button>
                            <a href="" class="btn btn-outline-dark">Cancel</a>
                        </form>
                    <?php } else { ?>
                        <div class="alert alert-success">
                            You have successfully recorded <strong><?php echo $_POST['duration']; ?> minutes</strong> of
                            <strong><?php echo $_POST['type']; ?> Meditation</strong>.
                        </div>
                        <div>
                            <a href="" class="btn btn-outline-dark mr-5">More <?php echo $service['name']; ?></a>
                            <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } else if($id === 3) { ?> <!-- id ==1 because of first service-->
                <p>Select the type of stretching you would like to do?.</p>

                <?php // The form below is displayed if type has not been submitted. ?>
                <?php if(!isset($_POST['type'])) { ?>
                    <?php $serviceInstructions = getServiceInstructions($id); ?>

                    <form method="post">
                        <div class="form-group">
                            <?php foreach($serviceInstructions as $serviceInstruction) { ?>
                                <?php $t = $serviceInstruction['service_type']; ?>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"
                                        id="<?php echo $t; ?>" name="type" value="<?php echo $t; ?>" />
                                    <label class="form-check-label" for="<?php echo $t; ?>"><?php echo $t; ?></label>
                                </div>
                            <?php } ?>
                            <?php if(isset($_POST['service'])) { ?>
                                <div class='text-danger'>You must select a type of stretching?.</div>
                            <?php } ?>
                        </div>

                        <button type="submit" class="btn btn-primary mr-5" name="service">Next</button>
                        <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
                    </form>
                <?php } else { ?>
                    <?php $serviceInstruction = getServiceInstruction($id, $_POST['type']); ?>

                    <h3><?php echo $serviceInstruction['service_type']; ?></h3>
                    <video class="my-3 service" height="400" controls>
                        <source src="<?php echo $serviceInstruction['path']; ?>" type="video/mp4">
                    </video>

                    <?php if(!isset($_POST['activity']) || count($errors) > 0) { ?>
                        <form method="post">
                            <input type="hidden" name="type" value="<?php echo $_POST['type']; ?>" />

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="duration">Duration (minutes)</label>
                                    <input type="text" class="form-control d-inline-block" id="duration" name="duration"
                                        <?php displayValue($_POST, 'duration'); ?> />
                                    <?php displayError($errors, 'duration'); ?>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mr-5" name="activity">Record Activity</button>
                            <a href="" class="btn btn-outline-dark">Cancel</a>
                        </form>
                    <?php } else { ?>
                        <div class="alert alert-success">
                            You have successfully recorded <strong><?php echo $_POST['duration']; ?> minutes</strong> of
                            <strong><?php echo $_POST['type']; ?> Stretching</strong>.
                        </div>
                        <div>
                            <a href="" class="btn btn-outline-dark mr-5">More <?php echo $service['name']; ?></a>
                            <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } else if($id === 4) { ?> <!-- id ==4 because of healthy habits-->
                <p>Choose a meal category you would like?.</p>

                <?php // The form below is displayed if type has not been submitted. ?>

                    <!-- first form for selecting the category of meal -->
                    <form method="post">
                    <div class="form-group">
                        <select name="category_name" id="" class="form-control">
                            <?php foreach($meal_categories as $category){?>
                                <option value="<?php echo $category['cat_name'];  ?>"> <?php echo $category['cat_name']?></option>
                                <?php } ?>
                        </select>
                    </div>
                        <button type="submit" class="btn btn-primary mr-5" name="service">Next</button>
                        <a href="myServices.php" class="btn btn-outline-dark">Back to myServices</a>
                    </form>
                    <br>
                    <?php if(isset($_POST['service'])){?><?php
                    $selected = $_POST['category_name'];?>
                    
                    <?php $selectedCategoryMeals = getMealByCategories($selected); 
                    // if(isset($_POST['user_meal'])){
                    //     $email = ($_SESSION['user']['email']); 
                    //     $values = array(
                    //         'meai_id' => $_POST['meal_id'], 
                    //         'email' => $email, 
                    //         'servings' => 'test serving '
                    //     ); 
                    //     //var_dump($values); 
                    //     // $action = insertMeal($values); 
                    //     // var_dump($action); 
                    //     }
                    ?>
                        <h3><?php echo $selected; ?></h3>
                        <!-- second form for selecting the meals as prefered by the user
                            allows the user to select or add meals and keep adding  -->
                        <form method="POST">
                            <div class="form-group">
                                <select name="meal_id" id="" class="form-control">
                                    <?php foreach($selectedCategoryMeals as $meal){?>
                                        <option value="<?php echo $meal['meal_id'];  ?>"> <?php echo $meal['name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="row">
                                <button type="submit" class="btn btn-primary mr-5" name="user_meal">Submit</button>
                                <a href="myServices.php" class="btn btn-outline-dark">Cancel</a>
                            </div>
                        </form>
                        <?php }  ?>
                    <?php } ?>
                </div>
            <?php require_once('includes/footer.php'); ?>
    </body>
</html>