<?php
//Start new session
session_start();
//Destroy all session
session_destroy();
//Redirect user to login page
header("location:../login/");
