<?php

require_once('functions.php');

if(!isUserLoggedIn())
    redirect('login.php');  // maybe do "else" which will do nothing and keeps you login pagex