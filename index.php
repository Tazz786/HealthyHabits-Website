<?php require_once('includes/functions.php'); ?>
<!DOCTYPE html>
<html>

    <!-- HOME PAGE-->
    <head>
        <title> Life - Living It Full Everyday</title>

        <!-- Image slider -->
        <link rel="stylesheet" type="text/css" href="style/slick.css"/>
        <link rel="stylesheet" type="text/css" href="style/slick-theme.css"/>

        <!-- call header here  -->
        <?php require_once("includes/header.php"); ?>

        <!-- Links -->
        <link rel="stylesheet" type="text/css" href="style/index.css"/>
    </head>
    <body>
        <!-- call navbar here  -->
        <?php require_once("includes/navbar.php"); ?>

        <!-- Jquery Carasuel Image Slider -->
        <div class="slider-area" id="wrapper">
            <div><img src="images/stretch 1.jpg" alt="Stretching" style="width: 98%;height:800px;"></div>
            <div><img src="images/healthyhabits 2.jpg" alt="Healthy Habits Image" style="width: 98%;height:800px;"></div>
            <div><img src="images/meditation3.jpg" alt="Meditation Image" style="width: 98%;height:800px;"></div>
            <div><img src="images/yoga 4.jpg" alt="Yoga Image" style="width: 98%;height:800px;"></div>  
        </div>

        <!-- Body section -->
        <div class = "body_sec">
            <section id="Content">
                <div class="card">
                    <!--div class = "logo" ><a href ="#"><img src = "logo.png"></a></div-->
                    <h2>Why do humans stay together?.</h2>
                    <img src="images/wellbeing.jpeg" alt="Togetherness" style="width: 100%;height:500px;">
                    <br>
                    <h4> Being Toegther </h4>
                    <p> As humans, the relationships we form with other people are vital to our mental and emotional wellbeing, 
                        and really, our survival. ... A positive relationship can be shared between any two people who love, 
                        support, encourage and help each other practically as well as emotionally.</p>
                    
                        <h4> Greater Sense of Purpose</h4>
                        <p> It is natural for humans to want to feel needed, and like they’re part of something bigger. 
                            Many people strive to feel like they’re doing something good for someone else, 
                            and improving the world in some way. Being in a loving relationship, no matter what kind, 
                            can give a person a sense of well-being and purpose. In fact, 
                            it is possible that having a sense of purpose can actually add years to your life.
                        </p>
                </div>
                <div class="card">
                    <!--div class = "logo" ><a href ="#"><img src = "logo.png"></a></div-->
                    <h2>Why do exercise make us happy?</h2>
                    <img src="images/exercising.jpg" alt="Happines" style="width:1000px;height:750px;">
                    <br>
                    <h4> Exercising make us happy </h4>
                    <p> As humans, the relationships we form with other people are vital to our mental and emotional wellbeing, 
                        and really, our survival. ... A positive relationship can be shared between any two people who love, 
                        support, encourage and help each other practically as well as emotionally.</p>
                    
                        <h4> longer Life</h4>
                        <p> Speaking of adding years onto your life, research suggests that having healthy social relationships 
                            makes a bigger impact on avoiding early death than taking blood pressure medication or being exposed 
                            to air pollution. One study even suggests that a lack of social relationships has the same effect 
                            on health as smoking 15 cigarettes a day.
                            <br><br>
                            Everyone is unique and has their own needs and desires when it comes to relationships, 
                            handling stress and living a healthy, meaningful life. If you are the type of person who enjoys 
                            being alone, that is okay too, but attempting to make a couple close relationships could mean 
                            noticeable benefits to your mental and physical health.
                        </p>
                    </div>
            </section>
        </div>
        <!-- footer -->
        <?php require_once("includes/footer.php"); ?>
        
        <!-- Carasuel plugin -->
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="scripts/slick.min.js"></script>
        
        <script>
            $(document).ready(function(){
                $('.slider-area').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 1000,
                });
            });
        </script>
    </body>
</html>