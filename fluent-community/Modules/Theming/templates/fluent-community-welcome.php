<?php
defined('ABSPATH') or die;
/**
 * Template Name: Welcome Page
 * Description: Template for displaying FluentCommunity welcome pages.
 *
 * @package FluentCommunity
 */
$themeName = get_option('template');
$supportedTheme = apply_filters('fluent_community/is_supported_theme', false, $themeName);
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <?php wp_head(); ?>
    <?php do_action('fluent_community/template_header'); ?>
</head>

<body <?php body_class(); ?> <?php do_action('fluent_community/theme_body_atts', $themeName); ?>>
<?php wp_body_open(); ?>
<div class="fcom_wrap fcom_wp_frame fcom_wp_welcome">
    <?php do_action('fluent_community/before_portal_dom'); ?>
    <div class="fluent_com">
        <div class="fhr_wrap fcom_welcome_wrap">
            <?php do_action('fluent_community/portal_header', 'wp'); ?>
            <div class="fhr_content">
                <div class="fhr_home">
                    <div class="feed_layout fcom_welcome_layout">
                        <div class="feeds_main fcom_theme_welcome <?php echo $supportedTheme ? 'fcom_supported_wp_content' : 'fcom_wp_content fcom_fallback_wp_content'; ?>">
                            <?php do_action('fluent_community/theme_content', $themeName, 'welcome'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php wp_footer(); ?>
<?php do_action('fluent_community/template_footer'); ?>
</body>
</html>
