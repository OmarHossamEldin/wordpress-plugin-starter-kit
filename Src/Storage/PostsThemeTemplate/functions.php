<?php

require_once WP_PLUGIN_DIR  . '/wordpress-starter-kit/vendor/autoload.php';

use Wordpress\Support\Facades\Template\Asset;
// register assets
add_action('wp_enqueue_scripts', fn () => Asset::register_assets());

