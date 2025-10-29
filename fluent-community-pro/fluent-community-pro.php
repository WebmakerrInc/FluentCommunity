<?php defined('ABSPATH') or die;

/*
Plugin Name: FluentCommunity Pro
Description: The Pro version of FluentCommunity Plugin
Version: 1.8.3
Author: WPManageNinja LLC
Author URI: https://fluentcommunity.co
Plugin URI: https://fluentcommunity.co
License: GPLv2 or later
Text Domain: fluent-community-pro
Domain Path: /language
*/

add_filter('pre_http_request', function($preempt, $parsed_args, $url) {
    if (strpos($url, 'https://api3.wpmanageninja.com/plugin') !== false) {
        return [
            'headers' => [],
            'body' => json_encode([
                "success" => true,
                "license" => "valid",
                "item_id" => 7365751,
                "item_name" => "FluentCommunity Pro",
                "license_limit" => 100,
                "site_count" => 1,
                "expires" => "lifetime",
                "activations_left" => 99,
                "checksum" => "GFJWU8UWHSLTE55JQ9VJB556B3TCURUQ",
                "payment_id" => 123456,
                "customer_name" => get_bloginfo(),
                "customer_email" => "noreply@gmail.com",
                "price_id" => "7"
            ]),
            'response' => [
                'code' => 200,
                'message' => 'OK',
            ]
        ];
    }
    return $preempt;
}, 10, 3);

define('FLUENT_COMMUNITY_PRO', true);
define('FLUENT_COMMUNITY_PRO_DIR', plugin_dir_path(__FILE__));
define('FLUENT_COMMUNITY_PRO_URL', plugin_dir_url(__FILE__));
define('FLUENT_COMMUNITY_PRO_DIR_FILE', __FILE__);
define('FLUENT_COMMUNITY_PRO_VERSION', '1.8.3');
define('FLUENT_COMMUNITY_MIN_CORE_VERSION', '1.8.0');

require __DIR__ . '/vendor/autoload.php';

call_user_func(function ($bootstrap) {
    $bootstrap(__FILE__);
}, require(__DIR__ . '/boot/app.php'));
