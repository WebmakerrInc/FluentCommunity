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
/** @var string $white_logo_url */
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

        body.fcom-welcome-page *,
        body.fcom-welcome-page *::before,
        body.fcom-welcome-page *::after {
            box-sizing: border-box;
        }

        .fcom-welcome-layout {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .fcom-welcome-header {
            background: var(--fcom-primary-bg, #ffffff);
            border-bottom: 1px solid var(--fcom-primary-border, #dcdfe6);
            position: sticky;
            top: 0;
            z-index: 20;
        }

        .fcom-welcome-header .fcom_template_standard {
            width: min(1120px, 100%);
            margin: 0 auto;
            padding: 0 clamp(1rem, 4vw, 2.5rem);
        }

        .fcom-welcome-header .fcom_top_menu {
            padding: clamp(0.75rem, 2vw, 1.25rem) 0;
        }

        .fcom-welcome-main {
            flex: 1;
            width: min(1120px, 100%);
            margin: 0 auto;
            padding: clamp(3rem, 5vw, 4.5rem) clamp(1.25rem, 4vw, 2.75rem) clamp(3.5rem, 6vw, 5rem);
            display: flex;
            flex-direction: column;
            gap: clamp(2rem, 4vw, 3.5rem);
        }

        .fcom-welcome-hero,
        .fcom-welcome-products,
        .fcom-suite-summary,
        .fcom-welcome-links {
            background: var(--fcom-primary-bg, #ffffff);
            border: 1px solid var(--fcom-primary-border, #dcdfe6);
            border-radius: 20px;
            box-shadow: 0 25px 45px rgba(9, 30, 66, 0.08);
        }

        .fcom-welcome-hero {
            display: grid;
            gap: clamp(2rem, 4vw, 3rem);
            align-items: center;
            padding: clamp(2.5rem, 5vw, 3.5rem);
        }

        @media (min-width: 1024px) {
            .fcom-welcome-hero {
                grid-template-columns: minmax(0, 1.1fr) minmax(0, 0.9fr);
            }
        }

        .fcom-hero-content {
            display: grid;
            gap: 1.25rem;
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
            font-size: clamp(2.4rem, 4.8vw, 3.2rem);
            line-height: 1.1;
        }

        .fcom-hero-description {
            margin: 0;
            font-size: 1.08rem;
            line-height: 1.7;
            color: var(--fcom-menu-text, #545861);
        }

        .fcom-hero-points {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            gap: 0.85rem;
        }

        .fcom-hero-points li {
            display: flex;
            gap: 0.75rem;
            align-items: flex-start;
            font-size: 1rem;
            color: var(--fcom-menu-text, #545861);
        }

        .fcom-hero-icon {
            flex-shrink: 0;
            width: 22px;
            height: 22px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: rgba(74, 95, 224, 0.12);
            color: var(--fcom-primary-button, #4a5fe0);
        }

        .fcom-welcome-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 0.9rem;
            align-items: center;
        }

        .fcom-welcome-cta {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.85rem 1.9rem;
            border-radius: 12px;
            background: var(--fcom-primary-button, #4a5fe0);
            color: var(--fcom-primary-button-text, #ffffff);
            font-weight: 600;
            text-decoration: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
            box-shadow: 0 10px 25px rgba(74, 95, 224, 0.25);
        }

        .fcom-welcome-cta:hover,
        .fcom-welcome-cta:focus-visible {
            background: var(--fcom-menu-text-hover, #3648b3);
            color: var(--fcom-primary-button-text, #ffffff);
            transform: translateY(-2px);
            box-shadow: 0 16px 30px rgba(74, 95, 224, 0.35);
        }

        .fcom-welcome-secondary {
            color: var(--fcom-text-link, #2271b1);
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .fcom-welcome-secondary:hover,
        .fcom-welcome-secondary:focus-visible {
            text-decoration: underline;
        }

        .fcom-hero-trust {
            display: grid;
            gap: 0.65rem;
            margin-top: 0.5rem;
        }

        .fcom-hero-logo {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
        }

        .fcom-hero-logo img {
            max-height: 30px;
            width: auto;
        }

        .fcom-hero-trust p {
            margin: 0;
            font-size: 0.95rem;
            color: var(--fcom-menu-text, #545861);
        }

        .fcom-hero-integrations-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 0.75rem;
            align-items: center;
            margin-top: 0.25rem;
        }

        .fcom-hero-integrations-wrapper span {
            font-weight: 600;
            color: var(--fcom-primary-text, #19283a);
        }

        .fcom-hero-integrations {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .fcom-hero-integrations li {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            border: 1px solid var(--fcom-primary-border, #dcdfe6);
            background: var(--fcom-secondary-bg, #f0f0f1);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .fcom-hero-integrations img {
            max-width: 80%;
            max-height: 80%;
            object-fit: contain;
        }

        .fcom-hero-integrations li span {
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--fcom-primary-text, #19283a);
        }

        .fcom-hero-media {
            display: flex;
            justify-content: center;
        }

        .fcom-hero-card {
            background: linear-gradient(160deg, rgba(74, 95, 224, 0.08) 0%, rgba(74, 95, 224, 0.18) 100%);
            border-radius: 18px;
            padding: clamp(1.75rem, 4vw, 2.5rem);
            display: grid;
            gap: 1.5rem;
            border: 1px solid rgba(74, 95, 224, 0.25);
        }

        .fcom-hero-card h3 {
            margin: 0;
            font-size: clamp(1.6rem, 3vw, 1.95rem);
        }

        .fcom-hero-card p {
            margin: 0;
            color: var(--fcom-primary-text, #19283a);
            line-height: 1.6;
        }

        .fcom-hero-metrics {
            display: grid;
            gap: 1rem;
        }

        .fcom-hero-metric {
            background: var(--fcom-primary-bg, #ffffff);
            border-radius: 14px;
            padding: 1rem 1.25rem;
            border: 1px solid rgba(74, 95, 224, 0.2);
            display: grid;
            gap: 0.35rem;
        }

        .fcom-hero-metric-value {
            font-weight: 700;
            font-size: 1.05rem;
            color: var(--fcom-primary-text, #19283a);
        }

        .fcom-hero-metric span:last-child {
            font-size: 0.95rem;
            color: var(--fcom-menu-text, #545861);
        }

        .fcom-welcome-products {
            display: grid;
            gap: 2.25rem;
            padding: clamp(2.25rem, 4.5vw, 3rem);
        }

        .fcom-welcome-products > div > h2 {
            margin: 0 0 0.75rem;
            font-size: clamp(1.9rem, 3.5vw, 2.4rem);
        }

        .fcom-welcome-products > div > p {
            margin: 0;
            color: var(--fcom-menu-text, #545861);
            line-height: 1.7;
        }

        .fcom-product-list {
            display: grid;
            gap: 1.75rem;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        }

        .fcom-product-card {
            border: 1px solid var(--fcom-primary-border, #dcdfe6);
            border-radius: 16px;
            padding: 1.75rem 1.5rem;
            background: var(--fcom-primary-bg, #ffffff);
            display: grid;
            gap: 1rem;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .fcom-product-card:hover,
        .fcom-product-card:focus-within {
            transform: translateY(-4px);
            box-shadow: 0 18px 38px rgba(9, 30, 66, 0.1);
        }

        .fcom-product-brand {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-weight: 700;
            font-size: 0.95rem;
        }

        .fcom-product-brand img {
            width: 100%;
            height: 100%;
            object-fit: contain;
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
            line-height: 1.65;
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
            gap: clamp(2rem, 4vw, 3rem);
            padding: clamp(2.5rem, 5vw, 3.5rem);
        }

        @media (min-width: 900px) {
            .fcom-suite-summary {
                grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
                align-items: start;
            }
        }

        .fcom-suite-summary h3 {
            margin: 0 0 0.85rem;
            font-size: clamp(1.85rem, 3.2vw, 2.3rem);
        }

        .fcom-suite-summary p {
            margin: 0;
            color: var(--fcom-menu-text, #545861);
            line-height: 1.7;
        }

        .fcom-suite-actions {
            margin-top: 1.5rem;
        }

        .fcom-suite-points {
            display: grid;
            gap: 1.25rem;
        }

        .fcom-suite-point {
            display: flex;
            align-items: flex-start;
            gap: 0.9rem;
        }

        .fcom-suite-point svg {
            flex-shrink: 0;
            width: 26px;
            height: 26px;
            padding: 0.35rem;
            border-radius: 10px;
            background: rgba(34, 113, 177, 0.12);
            color: var(--fcom-text-link, #2271b1);
        }

        .fcom-suite-point span {
            display: block;
            font-weight: 600;
            color: var(--fcom-primary-text, #19283a);
            margin-bottom: 0.35rem;
        }

        .fcom-suite-point p {
            margin: 0;
            color: var(--fcom-menu-text, #545861);
            line-height: 1.6;
        }

        .fcom-welcome-links {
            padding: clamp(2rem, 4vw, 2.75rem);
            display: grid;
            gap: 0.75rem;
            justify-items: center;
            text-align: center;
        }

        .fcom-welcome-links span {
            font-weight: 600;
            color: var(--fcom-primary-text, #19283a);
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
            width: min(1120px, 100%);
            margin: 0 auto;
            padding: clamp(2.25rem, 4vw, 3rem) clamp(1.5rem, 4vw, 2.75rem);
            display: grid;
            gap: 1.5rem;
        }

        .fcom-welcome-footer-links {
            display: flex;
            flex-wrap: wrap;
            gap: 0.85rem 1.6rem;
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

        @media (max-width: 768px) {
            .fcom-welcome-hero {
                box-shadow: 0 14px 28px rgba(9, 30, 66, 0.12);
            }

            .fcom-welcome-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .fcom-welcome-cta {
                width: 100%;
                justify-content: center;
            }

            .fcom-welcome-secondary {
                justify-content: center;
            }

            .fcom-hero-card {
                width: 100%;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .fcom-welcome-cta,
            .fcom-product-card {
                transition: none;
            }
        }
    </style>
</head>
<body <?php body_class('fluent_com fcom-welcome-page'); ?>>
<div class="fcom-welcome-layout">
    <header class="fcom-welcome-header" role="banner">
        <div class="fcom_template_standard">
            <?php do_action('fluent_community/portal_header', 'welcome'); ?>
        </div>
    </header>
    <main class="fcom-welcome-main fcom_template_standard fcom_wp_content" role="main">
        <section class="fcom-welcome-hero" id="fcom-hero">
            <div class="fcom-hero-content">
                <p class="fcom-hero-eyebrow"><?php esc_html_e('Fluent Suite', 'fluent-community'); ?></p>
                <h1><?php echo esc_html($title); ?></h1>
                <p class="fcom-hero-description"><?php echo esc_html($description); ?></p>
                <ul class="fcom-hero-points">
                    <li>
                        <span class="fcom-hero-icon" aria-hidden="true">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5 3.375L4.5 9.375L1.5 6.375" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <span><?php esc_html_e('Automate journeys from lead capture to lifelong membership.', 'fluent-community'); ?></span>
                    </li>
                    <li>
                        <span class="fcom-hero-icon" aria-hidden="true">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5 3.375L4.5 9.375L1.5 6.375" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <span><?php esc_html_e('Launch campaigns, courses, and support inside a single branded portal.', 'fluent-community'); ?></span>
                    </li>
                    <li>
                        <span class="fcom-hero-icon" aria-hidden="true">
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.5 3.375L4.5 9.375L1.5 6.375" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <span><?php esc_html_e('Give every team a unified view of members, payments, and progress.', 'fluent-community'); ?></span>
                    </li>
                </ul>
                <div class="fcom-welcome-actions">
                    <a class="fcom-welcome-cta" href="<?php echo esc_url($cta_url); ?>"><?php esc_html_e('Get Started with Fluent Suite', 'fluent-community'); ?></a>
                    <a class="fcom-welcome-secondary" href="#fcom-ecosystem">
                        <span><?php esc_html_e('Explore the product ecosystem', 'fluent-community'); ?></span>
                    </a>
                </div>
                <div class="fcom-hero-trust">
                    <div class="fcom-hero-logo">
                        <?php if (!empty($logo_url)) : ?>
                            <img class="show_on_light" src="<?php echo esc_url($logo_url); ?>" alt="<?php esc_attr_e('Fluent Community', 'fluent-community'); ?>">
                        <?php endif; ?>
                        <?php if (!empty($white_logo_url)) : ?>
                            <img class="show_on_dark" src="<?php echo esc_url($white_logo_url); ?>" alt="<?php esc_attr_e('Fluent Community', 'fluent-community'); ?>">
                        <?php endif; ?>
                    </div>
                    <p><?php esc_html_e('Join 40,000+ teams automating their customer journey with Fluent tools.', 'fluent-community'); ?></p>
                </div>
                <?php $featuredProducts = array_slice($products, 0, 4); ?>
                <?php if ($featuredProducts) : ?>
                    <div class="fcom-hero-integrations-wrapper">
                        <span><?php esc_html_e('Connected with', 'fluent-community'); ?></span>
                        <ul class="fcom-hero-integrations">
                            <?php foreach ($featuredProducts as $product) : ?>
                                <li>
                                    <?php if (!empty($product['logo'])) : ?>
                                        <img src="<?php echo esc_url($product['logo']); ?>" alt="<?php echo esc_attr($product['name']); ?>">
                                    <?php else : ?>
                                        <span><?php echo esc_html($product['initials']); ?></span>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <div class="fcom-hero-media">
                <div class="fcom-hero-card">
                    <h3><?php esc_html_e('Build a community that converts', 'fluent-community'); ?></h3>
                    <p><?php esc_html_e('Guide members from first touch to lifelong advocacy with a portal that feels native to WordPress and keeps every workflow in sync.', 'fluent-community'); ?></p>
                    <div class="fcom-hero-metrics">
                        <div class="fcom-hero-metric">
                            <span class="fcom-hero-metric-value"><?php esc_html_e('Unified CRM', 'fluent-community'); ?></span>
                            <span><?php esc_html_e('Sync tags, automation triggers, and purchase data instantly.', 'fluent-community'); ?></span>
                        </div>
                        <div class="fcom-hero-metric">
                            <span class="fcom-hero-metric-value"><?php esc_html_e('Personalized UX', 'fluent-community'); ?></span>
                            <span><?php esc_html_e('Deliver tailored feeds, spaces, and offers for every segment.', 'fluent-community'); ?></span>
                        </div>
                        <div class="fcom-hero-metric">
                            <span class="fcom-hero-metric-value"><?php esc_html_e('Faster launches', 'fluent-community'); ?></span>
                            <span><?php esc_html_e('Spin up portals, campaigns, and automations without developers.', 'fluent-community'); ?></span>
                        </div>
                    </div>
                </div>
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
                            <?php if (!empty($product['logo']) || !empty($product['initials'])) : ?>
                                <div class="fcom-product-brand" style="background: <?php echo esc_attr($product['accent']); ?>;">
                                    <?php if (!empty($product['logo'])) : ?>
                                        <img src="<?php echo esc_url($product['logo']); ?>" alt="<?php echo esc_attr($product['name']); ?>">
                                    <?php else : ?>
                                        <span><?php echo esc_html($product['initials']); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
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
                <div class="fcom-suite-actions">
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
        <div class="fcom-welcome-footer-inner">
            <div class="fcom-welcome-actions">
                <a class="fcom-welcome-cta" href="<?php echo esc_url($cta_url); ?>"><?php esc_html_e('Start Your Fluent Journey', 'fluent-community'); ?></a>
                <a class="fcom-welcome-secondary" href="<?php echo esc_url($portal_url); ?>"><?php esc_html_e('Enter the Community Portal', 'fluent-community'); ?></a>
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
