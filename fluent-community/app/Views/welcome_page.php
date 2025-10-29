<?php if (!defined('ABSPATH')) exit; // Exit if accessed directly ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0,viewport-fit=cover"/>
    <title><?php echo esc_html($title); ?></title>
    <meta name="description" content="<?php echo esc_attr($description); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo esc_url(get_site_icon_url()); ?>"/>
    <?php wp_head(); ?>
</head>
<body <?php body_class('fcom_welcome_body'); ?>>
<div class="fcom-welcome-page">
    <header class="fcom-welcome-hero">
        <div class="fcom-welcome-container">
            <span class="fcom-hero-kicker"><?php esc_html_e('Fluent Community Ecosystem', 'fluent-community'); ?></span>
            <h1 class="fcom-hero-title"><?php echo esc_html($hero_title); ?></h1>
            <p class="fcom-hero-subtitle"><?php echo esc_html($hero_subtitle); ?></p>
            <div class="fcom-hero-actions">
                <a class="fcom_btn fcom_btn_primary fcom-hero-primary" href="<?php echo esc_url($hero_cta_url); ?>" target="_blank" rel="noopener">
                    <?php echo esc_html($hero_cta_label); ?>
                </a>
                <a class="fcom-hero-secondary" href="https://fluentcrm.com/?utm_source=fluent-community&amp;utm_medium=welcome">
                    <?php esc_html_e('Explore Community Portal', 'fluent-community'); ?>
                </a>
            </div>
            <div class="fcom-hero-highlights">
                <div class="fcom-hero-highlight">
                    <strong>150k+</strong>
                    <span><?php esc_html_e('businesses automate with Fluent', 'fluent-community'); ?></span>
                </div>
                <div class="fcom-hero-highlight">
                    <strong>6</strong>
                    <span><?php esc_html_e('products. One connected suite.', 'fluent-community'); ?></span>
                </div>
                <div class="fcom-hero-highlight">
                    <strong><?php esc_html_e('100%', 'fluent-community'); ?></strong>
                    <span><?php esc_html_e('WordPress-native performance', 'fluent-community'); ?></span>
                </div>
            </div>
        </div>
    </header>

    <section class="fcom-suite-highlights">
        <div class="fcom-welcome-container">
            <div class="fcom-suite-copy">
                <h2><?php esc_html_e('One Fluent workflow from lead to lifetime value', 'fluent-community'); ?></h2>
                <p><?php esc_html_e('From marketing automation and checkout experiences to support, security, and bookings—the Fluent Suite keeps every team in sync with shared data, unified automation, and a delightful customer journey.', 'fluent-community'); ?></p>
            </div>
            <div class="fcom-suite-grid">
                <div class="fcom-suite-card">
                    <span><?php esc_html_e('Unified Profiles', 'fluent-community'); ?></span>
                    <p><?php esc_html_e('Every touchpoint updates contact timelines instantly so sales, success, and marketing always know what happens next.', 'fluent-community'); ?></p>
                </div>
                <div class="fcom-suite-card">
                    <span><?php esc_html_e('Automation Everywhere', 'fluent-community'); ?></span>
                    <p><?php esc_html_e('Trigger powerful workflows from purchases, support tickets, logins, bookings, and affiliate milestones—all without leaving WordPress.', 'fluent-community'); ?></p>
                </div>
                <div class="fcom-suite-card">
                    <span><?php esc_html_e('Delightful Experiences', 'fluent-community'); ?></span>
                    <p><?php esc_html_e('Give customers modern onboarding, responsive support, and effortless checkout experiences with Fluent’s polished UI library.', 'fluent-community'); ?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="fcom-welcome-products">
        <div class="fcom-welcome-container">
            <h2 class="fcom-products-title"><?php esc_html_e('Meet the Fluent Ecosystem', 'fluent-community'); ?></h2>
            <p class="fcom-products-subtitle"><?php esc_html_e('Every plugin is powerful on its own—and unstoppable together.', 'fluent-community'); ?></p>
            <div class="fcom-products-grid">
                <?php foreach ($products as $product): ?>
                    <article class="fcom-product-card">
                        <div class="fcom-product-icon fcom-product-icon--<?php echo esc_attr($product['key']); ?>" aria-hidden="true">
                            <span class="fcom-product-initials"><?php echo esc_html(substr($product['name'], 0, 2)); ?></span>
                        </div>
                        <div class="fcom-product-header">
                            <span class="fcom-product-name"><?php echo esc_html($product['name']); ?></span>
                            <h3 class="fcom-product-headline"><?php echo esc_html($product['headline']); ?></h3>
                        </div>
                        <p class="fcom-product-description"><?php echo esc_html($product['description']); ?></p>
                        <a class="fcom_btn fcom_btn_primary fcom-product-link" href="<?php echo esc_url($product['url']); ?>" target="_blank" rel="noopener">
                            <?php esc_html_e('Learn More', 'fluent-community'); ?>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="fcom-welcome-integrations">
        <div class="fcom-welcome-container">
            <div class="fcom-integrations-copy">
                <h2><?php esc_html_e('Deep integrations with the tools you already trust', 'fluent-community'); ?></h2>
                <p><?php esc_html_e('Connect WooCommerce, LearnDash, LifterLMS, Google Calendar, Slack, Zapier, and more to orchestrate a single source of truth across your entire business.', 'fluent-community'); ?></p>
            </div>
            <ul class="fcom-integrations-list">
                <li><?php esc_html_e('Sync customer actions across CRM, support, and ecommerce instantly.', 'fluent-community'); ?></li>
                <li><?php esc_html_e('Launch hyper-personalized campaigns with unified tagging and segmentation.', 'fluent-community'); ?></li>
                <li><?php esc_html_e('Trigger automations from bookings, cart recoveries, affiliate rewards, and logins.', 'fluent-community'); ?></li>
            </ul>
        </div>
    </section>

    <footer class="fcom-welcome-footer">
        <div class="fcom-welcome-container fcom-footer-inner">
            <div class="fcom-footer-brand">
                <span class="fcom-footer-logo" aria-hidden="true"></span>
                <div>
                    <p class="fcom-footer-title"><?php esc_html_e('Fluent Suite', 'fluent-community'); ?></p>
                    <p class="fcom-footer-subtitle"><?php esc_html_e('Build, automate, and scale with products crafted for community-led growth.', 'fluent-community'); ?></p>
                </div>
            </div>
            <nav class="fcom-footer-nav" aria-label="Fluent products">
                <?php foreach ($footer_links as $link): ?>
                    <a href="<?php echo esc_url($link['url']); ?>" target="_blank" rel="noopener">
                        <?php echo esc_html($link['label']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>
        </div>
        <div class="fcom-footer-meta">
            <small>&copy; <?php echo esc_html(date_i18n('Y')); ?> <?php esc_html_e('FluentCommunity by WPManageNinja LLC. All rights reserved.', 'fluent-community'); ?></small>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
