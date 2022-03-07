<?php
/*
Plugin Name: Posts Plugin
Description: starter kit help people create plugin in well structured code using mvc pattern and autoload unit testing and so on to help people and teams build scalable plugins provided with plugin default theme will be exported and activated when plugin installed providing bootstrap and wrap class for fetch to make it easy to handle all process via rest api with the back end and jquery as well and I encourage you to use pure js after es6 syntax js became way more easy so you don't have to use jquery
Version: 1.0.0
Author: OmarHossameldin
Author URI: https://www.linkedin.com/in/omar-hossameldin-kandil-74633a1bb/
Plugin URI: https://packagist.org/packages/reneknox/wordpress
License: MIT
*/
require_once __DIR__ . './vendor/autoload.php';

use Wordpress\Services\AdminService;
use Wordpress\Services\RoutingService;

// activation 
register_activation_hook(__FILE__, [Wordpress\Services\InitializationService::class, 'install']);

// deactivation
register_deactivation_hook(__FILE__, [Wordpress\Services\InitializationService::class, 'deactivate']);

//uninstall
register_uninstall_hook(__FILE__, [Wordpress\Services\InitializationService::class, 'uninstall']);



// routing service initialize
RoutingService::initialize();

// admin views service initialize
AdminService::initialize();
