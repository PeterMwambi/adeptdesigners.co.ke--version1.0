<?php

/**
 * Check Ip address verify aganist bots check URL param
 * If URL contains invalid url link such as link to database deny URL access 
 * redirect to homepage 
 */
header("location:home/");
