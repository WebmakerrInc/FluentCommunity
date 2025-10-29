<?php
if (!defined('ABSPATH')) {
    exit;
}

if (function_exists('wp_enqueue_block_template_skip_link')) {
    wp_enqueue_block_template_skip_link();
}
/** @var string $title */
/** @var string $description */
/** @var string $cta_url */
/** @var array $products */
/** @var string $color_css */
/** @var string $logo_url */
/** @var string $portal_url */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title><?php echo esc_html($title); ?></title>
    <meta name="description" content="<?php echo esc_attr($description); ?>">
    <?php do_action('fluent_community/enqueue_global_assets', true); ?>
    <?php wp_head(); ?>
    <style>
        <?php echo $color_css; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        body.fcom-welcome-page {
            margin: 0;
            background: var(--fcom-secondary-bg, #f0f0f1);
            color: var(--fcom-primary-text, #19283a);
            min-height: 100vh;
        }

        .fcom-welcome-layout {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .fcom-welcome-header {
            background: var(--fcom-primary-bg, #ffffff);
            border-bottom: 1px solid var(--fcom-primary-border, #dcdfe6);
        }

        .fcom-welcome-header-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1.5rem;
            padding: 1.25rem 0;
        }

        .fcom-welcome-logo {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--fcom-primary-text, #19283a);
            text-decoration: none;
            font-weight: 600;
        }

        .fcom-welcome-logo img {
            max-height: 32px;
            width: auto;
        }

        .fcom-welcome-main {
            flex: 1;
            padding: 3rem 0;
            display: grid;
            gap: 3rem;
        }

        .fcom-welcome-hero,
        .fcom-welcome-products,
        .fcom-suite-summary,
        .fcom-welcome-links {
            background: var(--fcom-primary-bg, #ffffff);
            border: 1px solid var(--fcom-primary-border, #dcdfe6);
            border-radius: 16px;
            padding: clamp(1.75rem, 4vw, 2.75rem);
        }

        .fcom-welcome-hero {
            display: grid;
            gap: 1.5rem;
        }

        .fcom-hero-eyebrow {
            margin: 0;
            font-size: 0.85rem;
            letter-spacing: 0.16em;
            text-transform: uppercase;
            font-weight: 600;
            color: var(--fcom-menu-text, #545861);
        }

        .fcom-welcome-hero h1 {
            margin: 0;
            font-size: clamp(2.2rem, 4vw, 2.8rem);
        }

        .fcom-welcome-hero p {
            margin: 0;
            font-size: 1.05rem;
            line-height: 1.65;
            color: var(--fcom-menu-text, #545861);
        }

        .fcom-welcome-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            align-items: center;
        }

        .fcom-welcome-cta {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.85rem 1.75rem;
            border-radius: 10px;
            background: var(--fcom-primary-button, #4a5fe0);
            color: var(--fcom-primary-button-text, #ffffff);
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .fcom-welcome-cta:hover,
        .fcom-welcome-cta:focus-visible {
            background: var(--fcom-menu-text-hover, #3648b3);
            color: var(--fcom-primary-button-text, #ffffff);
        }

        .fcom-welcome-secondary {
            color: var(--fcom-text-link, #2271b1);
            text-decoration: none;
            font-weight: 600;
        }

        .fcom-welcome-secondary:hover,
        .fcom-welcome-secondary:focus-visible {
            text-decoration: underline;
        }

        .fcom-welcome-products {
            display: grid;
            gap: 2rem;
        }

        .fcom-product-list {
            display: grid;
            gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .fcom-product-list {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1024px) {
            .fcom-product-list {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        .fcom-product-card {
            border: 1px solid var(--fcom-primary-border, #dcdfe6);
            border-radius: 12px;
            padding: 1.5rem;
            display: grid;
            gap: 0.75rem;
            background: var(--fcom-primary-bg, #ffffff);
        }

        .fcom-product-card h3 {
            margin: 0;
            font-size: 1.15rem;
        }

        .fcom-product-name {
            margin: 0;
            font-weight: 600;
            color: var(--fcom-primary-text, #19283a);
        }

        .fcom-product-card p {
            margin: 0;
            color: var(--fcom-menu-text, #545861);
            line-height: 1.6;
        }

        .fcom-product-card a {
            font-weight: 600;
            color: var(--fcom-text-link, #2271b1);
            text-decoration: none;
        }

        .fcom-product-card a:hover,
        .fcom-product-card a:focus-visible {
            text-decoration: underline;
        }

        .fcom-suite-summary {
            display: grid;
            gap: 1.5rem;
        }

        @media (min-width: 900px) {
            .fcom-suite-summary {
                grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
                align-items: start;
            }
        }

        .fcom-suite-summary h3 {
            margin: 0 0 0.75rem;
            font-size: clamp(1.8rem, 3vw, 2.2rem);
        }

        .fcom-suite-summary p {
            margin: 0;
            color: var(--fcom-menu-text, #545861);
            line-height: 1.65;
        }

        .fcom-suite-points {
            display: grid;
            gap: 1rem;
        }

        .fcom-suite-point {
            display: flex;
            align-items: flex-start;
            gap: 0.75rem;
        }

        .fcom-suite-point svg {
            flex-shrink: 0;
            margin-top: 0.3rem;
            color: var(--fcom-text-link, #2271b1);
        }

        .fcom-suite-point span {
            display: block;
            font-weight: 600;
            color: var(--fcom-primary-text, #19283a);
        }

        .fcom-welcome-links {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem 1.75rem;
            align-items: center;
            justify-content: center;
        }

        .fcom-welcome-links a {
            color: var(--fcom-text-link, #2271b1);
            font-weight: 600;
            text-decoration: none;
        }

        .fcom-welcome-links a:hover,
        .fcom-welcome-links a:focus-visible {
            text-decoration: underline;
        }

        .fcom-welcome-footer {
            background: var(--fcom-primary-bg, #ffffff);
            border-top: 1px solid var(--fcom-primary-border, #dcdfe6);
            margin-top: auto;
        }

        .fcom-welcome-footer-inner {
            padding: 1.75rem 0;
            display: grid;
            gap: 1.25rem;
        }

        .fcom-welcome-footer-links {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem 1.5rem;
        }

        .fcom-welcome-footer-links a {
            color: var(--fcom-text-link, #2271b1);
            text-decoration: none;
            font-weight: 600;
        }

        .fcom-welcome-footer-links a:hover,
        .fcom-welcome-footer-links a:focus-visible {
            text-decoration: underline;
        }

        .fcom-welcome-footer-copy {
            margin: 0;
            font-size: 0.9rem;
            color: var(--fcom-menu-text, #545861);
        }
    </style>
</head>
<body <?php body_class('fluent_com fcom-welcome-page'); ?>>
<div class="fcom-welcome-layout">
    <header class="fcom-welcome-header" role="banner">
        <div class="fcom_template_standard fcom-welcome-header-inner">
            <div class="top_menu_left">
                <div class="fhr_logo">
                    <a class="fcom-welcome-logo" href="<?php echo esc_url($portal_url); ?>">
                        <?php if (!empty($logo_url)) : ?>
                            <img src="<?php echo esc_url($logo_url); ?>" alt="<?php esc_attr_e('Fluent Community', 'fluent-community'); ?>">
                        <?php endif; ?>
                        <span><?php esc_html_e('Fluent Community', 'fluent-community'); ?></span>
                    </a>
                </div>
            </div>
            <div class="top_menu_right">
                <a class="fcom-welcome-cta" href="<?php echo esc_url($portal_url); ?>">
                    <?php esc_html_e('Enter Portal', 'fluent-community'); ?>
                </a>
            </div>
        </div>
    </header>
    <main class="fcom_template_standard fcom-welcome-main fcom_wp_content" role="main">
        <section class="fcom-welcome-hero" id="fcom-hero">
            <div>
                <p class="fcom-hero-eyebrow"><?php esc_html_e('Fluent Suite', 'fluent-community'); ?></p>
                <h1><?php echo esc_html($title); ?></h1>
                <p><?php echo esc_html($description); ?></p>
            </div>
            <div class="fcom-welcome-actions">
                <a class="fcom-welcome-cta" href="<?php echo esc_url($cta_url); ?>"><?php esc_html_e('Get Started with Fluent Suite', 'fluent-community'); ?></a>
                <a class="fcom-welcome-secondary" href="#fcom-ecosystem"><?php esc_html_e('Explore products', 'fluent-community'); ?></a>
            </div>
        </section>

        <section class="fcom-welcome-products" aria-labelledby="fcom-ecosystem">
            <div>
                <h2 id="fcom-ecosystem"><?php esc_html_e('Powerful tools for every team', 'fluent-community'); ?></h2>
                <p><?php esc_html_e('Each Fluent product is crafted to work beautifully on its own — and even better together. Build automated funnels, deliver world-class support, and scale revenue without leaving WordPress.', 'fluent-community'); ?></p>
            </div>
            <?php if ($products) : ?>
                <div class="fcom-product-list">
                    <?php foreach ($products as $product) : ?>
                        <article class="fcom-product-card">
                            <h3><?php echo esc_html($product['headline']); ?></h3>
                            <p class="fcom-product-name"><?php echo esc_html($product['name']); ?></p>
                            <p><?php echo esc_html($product['description']); ?></p>
                            <a href="<?php echo esc_url($product['url']); ?>" target="_blank" rel="noopener">
                                <?php esc_html_e('Learn More', 'fluent-community'); ?>
                            </a>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>

        <section class="fcom-suite-summary" aria-labelledby="fcom-suite">
            <div>
                <h3 id="fcom-suite"><?php esc_html_e('The Fluent way to run your business', 'fluent-community'); ?></h3>
                <p><?php esc_html_e('From email marketing and eCommerce to bookings and affiliate management, Fluent Suite keeps every workflow inside WordPress. Automate the busy work, personalize every touchpoint, and keep your teams in sync.', 'fluent-community'); ?></p>
                <div class="fcom-welcome-actions">
                    <a class="fcom-welcome-cta" href="<?php echo esc_url($cta_url); ?>"><?php esc_html_e('Explore Fluent Suite Plans', 'fluent-community'); ?></a>
                </div>
            </div>
            <div class="fcom-suite-points">
                <div class="fcom-suite-point">
                    <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                        <path d="M16.6663 5L7.49967 14.1667L3.33301 10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div>
                        <span><?php esc_html_e('Deep integrations across every plugin', 'fluent-community'); ?></span>
                        <p><?php esc_html_e('Trigger automations, assign tags, and personalize customer journeys with a unified data layer.', 'fluent-community'); ?></p>
                    </div>
                </div>
                <div class="fcom-suite-point">
                    <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                        <path d="M16.6663 5L7.49967 14.1667L3.33301 10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div>
                        <span><?php esc_html_e('Modern UX that mirrors Fluent Community', 'fluent-community'); ?></span>
                        <p><?php esc_html_e('Consistent design language keeps every touchpoint on brand and easy to navigate.', 'fluent-community'); ?></p>
                    </div>
                </div>
                <div class="fcom-suite-point">
                    <svg viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                        <path d="M16.6663 5L7.49967 14.1667L3.33301 10" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <div>
                        <span><?php esc_html_e('Scales with your community', 'fluent-community'); ?></span>
                        <p><?php esc_html_e('Whether onboarding leads or delighting members, Fluent Suite grows alongside your WordPress business.', 'fluent-community'); ?></p>
                    </div>
                </div>
            </div>
        </section>

        <section class="fcom-welcome-links" aria-label="<?php esc_attr_e('Fluent product links', 'fluent-community'); ?>">
            <span><?php esc_html_e('Explore the Fluent ecosystem:', 'fluent-community'); ?></span>
            <?php foreach ($products as $product) : ?>
                <a href="<?php echo esc_url($product['url']); ?>" target="_blank" rel="noopener">
                    <?php echo esc_html($product['name']); ?>
                </a>
            <?php endforeach; ?>
        </section>
    </main>
    <footer class="fcom-welcome-footer" role="contentinfo">
        <div class="fcom_template_standard fcom-welcome-footer-inner">
            <div class="fcom-welcome-actions">
                <a class="fcom-welcome-cta" href="<?php echo esc_url($cta_url); ?>"><?php esc_html_e('Start Your Fluent Journey', 'fluent-community'); ?></a>
            </div>
            <div class="fcom-welcome-footer-links" aria-label="<?php esc_attr_e('Additional Fluent links', 'fluent-community'); ?>">
                <?php foreach ($products as $product) : ?>
                    <a href="<?php echo esc_url($product['url']); ?>" target="_blank" rel="noopener">
                        <?php echo esc_html($product['name']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <p class="fcom-welcome-footer-copy">&copy; <?php echo esc_html(date_i18n('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'fluent-community'); ?></p>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
