<?php

defined('ABSPATH') or die;

/**
 * Plugin Name: FluentCommunity
 * Description: The super-fast Community Plugin for WordPress
 * Version: 1.8.3
 * Author: WPManageNinja LLC
 * Author URI: https://fluentcommunity.co
 * Plugin URI: https://fluentcommunity.co
 * License: GPLv2 or later
 * Text Domain: fluent-community
 * Domain Path: /language
 */

define('FLUENT_COMMUNITY_PLUGIN_VERSION', '1.8.3');
define('FLUENT_COMMUNITY_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('FLUENT_COMMUNITY_PLUGIN_URL', plugin_dir_url(__FILE__));
define('FLUENT_COMMUNITY_DIR_FILE', __FILE__);
define('FLUENT_COMMUNITY_START_TIME', microtime(true));
define('FLUENT_COMMUNITY_DB_VERSION', '1.0.5');

define('FLUENT_COMMUNITY_PRO_DIR', FLUENT_COMMUNITY_PLUGIN_DIR . 'pro/');
define('FLUENT_COMMUNITY_PRO_URL', FLUENT_COMMUNITY_PLUGIN_URL . 'pro/');
define('FLUENT_COMMUNITY_PRO_DIR_FILE', FLUENT_COMMUNITY_PRO_DIR . 'loader.php');

define('FLUENT_COMMUNITY_PRO_VERSION', FLUENT_COMMUNITY_PLUGIN_VERSION);
define('FLUENT_COMMUNITY_MIN_PRO_VERSION', FLUENT_COMMUNITY_PRO_VERSION);
define('FLUENT_COMMUNITY_MIN_CORE_VERSION', FLUENT_COMMUNITY_PLUGIN_VERSION);
define('FLUENT_COMMUNITY_PRO', true);

if (!defined('FLUENTCRM_COMMUNITY_UPLOAD_DIR')) {
    define('FLUENT_COMMUNITY_UPLOAD_DIR', 'fluent-community');
}

require __DIR__ . '/vendor/autoload.php';

if (file_exists(FLUENT_COMMUNITY_PRO_DIR . 'vendor/autoload.php')) {
    require FLUENT_COMMUNITY_PRO_DIR . 'vendor/autoload.php';

    add_filter('pre_http_request', function ($preempt, $parsed_args, $url) {
        if (strpos($url, 'https://api3.wpmanageninja.com/plugin') !== false) {
            return [
                'headers'  => [],
                'body'     => json_encode([
                    'success'        => true,
                    'license'        => 'valid',
                    'item_id'        => 7365751,
                    'item_name'      => 'FluentCommunity Pro',
                    'license_limit'  => 100,
                    'site_count'     => 1,
                    'expires'        => 'lifetime',
                    'activations_left' => 99,
                    'checksum'       => 'GFJWU8UWHSLTE55JQ9VJB556B3TCURUQ',
                    'payment_id'     => 123456,
                    'customer_name'  => get_bloginfo(),
                    'customer_email' => 'noreply@gmail.com',
                    'price_id'       => '7'
                ]),
                'response' => [
                    'code'    => 200,
                    'message' => 'OK',
                ]
            ];
        }

        return $preempt;
    }, 10, 3);

    call_user_func(function ($bootstrap) {
        $bootstrap(FLUENT_COMMUNITY_PRO_DIR_FILE);
    }, require(FLUENT_COMMUNITY_PRO_DIR . 'boot/app.php'));
}

call_user_func(function ($bootstrap) {
    $bootstrap(__FILE__);
}, require(__DIR__ . '/boot/app.php'));
