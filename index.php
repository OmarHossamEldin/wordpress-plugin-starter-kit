<?php
/*
Plugin Name: Testing
Plugin URI: http://testing.com
Description: This is my first plugin! It makes a new admin menu link!
Version: 1.0.0
Author: M.Hassan
Author URI: http://yourdomain.com
License: GPLv2 or later 

*/
require_once __DIR__ . '/vendor/autoload.php';


// activation
register_activation_hook(__FILE__, [Wordpress\Services\InstallService::class, 'install']);

// deactivation
register_deactivation_hook(__FILE__, [Wordpress\Services\InstallService::class, 'unInstall']);
