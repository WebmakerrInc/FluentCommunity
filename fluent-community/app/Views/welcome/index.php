<?php
if (!defined('ABSPATH')) {
    exit;
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
    <style>
        <?php echo $color_css; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
        :root {
            --fcom-welcome-gradient: linear-gradient(135deg, #4A5FE0 0%, #7F56DA 50%, #2EB6FF 100%);
            --fcom-welcome-hero-radius: clamp(2rem, 5vw, 3rem);
        }

        body.fcom-welcome-body {
            margin: 0;
            background: var(--fcom-secondary-bg, #f0f2f5);
            color: var(--fcom-primary-text, #19283a);
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            -webkit-font-smoothing: antialiased;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .fcom-welcome-layout {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .fcom-welcome-header {
            position: sticky;
            top: 0;
            z-index: 12;
            background: rgba(15, 20, 45, 0.8);
            backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .fcom-header-inner {
            max-width: 1180px;
            margin: 0 auto;
            padding: 1.1rem clamp(1.5rem, 4vw, 3rem);
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1.5rem;
        }

        .fcom-welcome-logo {
            display: inline-flex;
            align-items: center;
            gap: 0.65rem;
            text-decoration: none;
            color: #fff;
            font-weight: 700;
            font-size: 1.1rem;
        }

        .fcom-welcome-logo img {
            height: 30px;
            width: auto;
        }

        .fcom-welcome-nav {
            display: flex;
            align-items: center;
            gap: clamp(0.9rem, 2vw, 1.4rem);
        }

        .fcom-welcome-nav a {
            color: rgba(255, 255, 255, 0.82);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: color 0.2s ease;
        }

        .fcom-welcome-nav a:hover,
        .fcom-welcome-nav a:focus-visible {
            color: #fff;
        }

        .fcom-welcome-nav__cta {
            padding: 0.65rem 1.35rem;
            border-radius: 999px;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.85) 0%, rgba(255, 255, 255, 0.55) 100%);
            color: #1f2b46;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.25);
        }

        .fcom-welcome-nav__cta:hover,
        .fcom-welcome-nav__cta:focus-visible {
            color: #10172a;
        }

        @media (max-width: 720px) {
            .fcom-header-inner {
                flex-direction: column;
                align-items: stretch;
            }

            .fcom-welcome-nav {
                justify-content: space-between;
                flex-wrap: wrap;
            }

            .fcom-welcome-nav__cta {
                flex-basis: 100%;
                text-align: center;
            }
        }

        .fcom-welcome-page {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            gap: clamp(3rem, 4vw, 4rem);
            padding: clamp(3rem, 6vw, 5rem) clamp(1.5rem, 5vw, 3rem) clamp(4rem, 6vw, 5rem);
            flex: 1;
            max-width: 1180px;
            width: 100%;
            margin: 0 auto;
        }

        .fcom-welcome-hero {
            position: relative;
            overflow: hidden;
            background: var(--fcom-welcome-gradient);
            color: #fff;
            border-radius: var(--fcom-welcome-hero-radius);
            padding: clamp(3rem, 6vw, 5rem);
            box-shadow: 0 28px 80px rgba(74, 95, 224, 0.35);
        }

        .fcom-welcome-hero::after,
        .fcom-welcome-hero::before {
            content: "";
            position: absolute;
            inset: auto;
            width: 320px;
            height: 320px;
            border-radius: 50%;
            filter: blur(0px);
            opacity: 0.35;
            background: radial-gradient(circle at center, rgba(255, 255, 255, 0.75) 0%, rgba(255, 255, 255, 0) 70%);
        }

        .fcom-welcome-hero::before {
            right: -120px;
            top: -80px;
        }

        .fcom-welcome-hero::after {
            left: -140px;
            bottom: -120px;
        }

        .fcom-hero-inner {
            position: relative;
            z-index: 2;
            max-width: 720px;
        }

        .fcom-hero-eyebrow {
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.16em;
            font-weight: 600;
            opacity: 0.85;
            margin-bottom: 1rem;
        }

        .fcom-hero-title {
            font-size: clamp(2.6rem, 4vw, 3.5rem);
            line-height: 1.08;
            margin: 0 0 1.25rem;
            font-weight: 700;
        }

        .fcom-hero-subtitle {
            font-size: clamp(1.1rem, 2.1vw, 1.35rem);
            line-height: 1.55;
            max-width: 38rem;
            margin: 0 0 2rem;
            opacity: 0.92;
        }

        .fcom-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.65rem;
            padding: 0.95rem 2.2rem;
            font-weight: 600;
            font-size: 1rem;
            border-radius: 999px;
            background: linear-gradient(135deg, #ffffff 0%, rgba(255, 255, 255, 0.85) 40%, rgba(255, 255, 255, 0.65) 100%);
            color: #1f2b46;
            text-decoration: none;
            box-shadow: 0 20px 40px rgba(14, 13, 56, 0.25);
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        }

        .fcom-btn:hover,
        .fcom-btn:focus-visible {
            transform: translateY(-3px);
            box-shadow: 0 26px 54px rgba(14, 13, 56, 0.35);
        }

        .fcom-btn:focus-visible {
            outline: 3px solid rgba(255, 255, 255, 0.65);
            outline-offset: 4px;
        }

        .fcom-section-heading {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            max-width: 720px;
        }

        .fcom-section-heading h2 {
            font-size: clamp(2rem, 3vw, 2.4rem);
            font-weight: 700;
            margin: 0;
            color: var(--fcom-primary-text, #19283a);
        }

        .fcom-section-heading p {
            margin: 0;
            font-size: 1.05rem;
            color: var(--fcom-secondary-text, #525866);
            line-height: 1.6;
        }

        .fcom-product-grid {
            display: grid;
            gap: 1.75rem;
            margin-top: clamp(2rem, 3vw, 2.75rem);
        }

        @media (min-width: 768px) {
            .fcom-product-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1080px) {
            .fcom-product-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        .fcom-product-card {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            padding: 2.1rem;
            border-radius: 26px;
            background: var(--fcom-primary-bg, #ffffff);
            border: 1px solid rgba(255, 255, 255, 0.04);
            box-shadow: 0 18px 38px rgba(16, 24, 40, 0.08);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .fcom-product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 26px 60px rgba(16, 24, 40, 0.12);
        }

        .fcom-product-card__header {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .fcom-product-card__icon {
            width: 64px;
            height: 64px;
            border-radius: 18px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, rgba(74, 95, 224, 0.2), rgba(74, 95, 224, 0.1));
            color: #fff;
            font-weight: 700;
            font-size: 1.1rem;
            overflow: hidden;
        }

        .fcom-product-card__icon img {
            width: 42px;
            height: 42px;
            object-fit: contain;
            filter: drop-shadow(0 10px 18px rgba(14, 13, 56, 0.18));
        }

        .fcom-product-card__icon span {
            display: inline-block;
            padding: 0 0.15rem;
        }

        .fcom-product-card h3 {
            font-size: 1.3rem;
            margin: 0;
            color: var(--fcom-primary-text, #19283a);
        }

        .fcom-product-card p {
            margin: 0;
            color: var(--fcom-secondary-text, #525866);
            line-height: 1.65;
            font-size: 1rem;
        }

        .fcom-product-card__cta {
            margin-top: auto;
            display: inline-flex;
            align-self: flex-start;
            align-items: center;
            gap: 0.45rem;
            padding: 0.7rem 1.4rem;
            border-radius: 999px;
            border: 1px solid rgba(74, 95, 224, 0.18);
            color: var(--fcom-primary-text, #19283a);
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s ease, color 0.2s ease, transform 0.2s ease;
        }

        .fcom-product-card__cta:hover,
        .fcom-product-card__cta:focus-visible {
            background: rgba(74, 95, 224, 0.12);
            transform: translateX(4px);
        }

        .fcom-suite-summary {
            background: var(--fcom-primary-bg, #ffffff);
            border-radius: 28px;
            padding: clamp(2.5rem, 5vw, 4rem);
            box-shadow: 0 24px 56px rgba(16, 24, 40, 0.1);
            display: grid;
            gap: clamp(1.5rem, 4vw, 2.5rem);
        }

        @media (min-width: 980px) {
            .fcom-suite-summary {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                align-items: center;
            }
        }

        .fcom-suite-summary__content h3 {
            margin: 0 0 1rem;
            font-size: clamp(1.8rem, 3vw, 2.4rem);
            color: var(--fcom-primary-text, #19283a);
        }

        .fcom-suite-summary__content p {
            margin: 0 0 1.75rem;
            line-height: 1.7;
            color: var(--fcom-secondary-text, #525866);
            font-size: 1.05rem;
        }

        .fcom-suite-points {
            display: grid;
            gap: 1rem;
        }

        .fcom-suite-point {
            display: flex;
            align-items: flex-start;
            gap: 0.85rem;
        }

        .fcom-suite-point svg {
            flex-shrink: 0;
            width: 18px;
            height: 18px;
            margin-top: 0.2rem;
            color: var(--fcom-text-link, #2271b1);
        }

        .fcom-suite-point span {
            font-weight: 600;
            color: var(--fcom-primary-text, #19283a);
        }

        .fcom-suite-point p {
            margin: 0.25rem 0 0;
            color: var(--fcom-secondary-text, #525866);
            line-height: 1.6;
        }

        .fcom-welcome-product-links {
            margin-top: clamp(2.5rem, 4vw, 3rem);
            padding: 2.4rem;
            border-radius: 24px;
            background: var(--fcom-primary-bg, #ffffff);
            display: flex;
            flex-wrap: wrap;
            gap: 1rem 2rem;
            justify-content: center;
            color: var(--fcom-secondary-text, #525866);
            font-size: 0.95rem;
            box-shadow: 0 20px 50px rgba(16, 24, 40, 0.08);
        }

        .fcom-welcome-product-links a {
            color: inherit;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .fcom-welcome-product-links a:hover,
        .fcom-welcome-product-links a:focus-visible {
            color: var(--fcom-text-link, #2271b1);
        }

        .fcom-welcome-footer {
            background: rgba(10, 13, 32, 0.92);
            color: rgba(255, 255, 255, 0.78);
            padding: clamp(2.5rem, 4vw, 3.5rem) clamp(1.5rem, 5vw, 3rem);
            margin-top: auto;
        }

        .fcom-footer-inner {
            max-width: 1180px;
            margin: 0 auto;
            display: grid;
            gap: clamp(1.5rem, 3vw, 2.5rem);
        }

        @media (min-width: 900px) {
            .fcom-footer-inner {
                grid-template-columns: minmax(0, 1.5fr) minmax(0, 1fr);
                align-items: center;
            }
        }

        .fcom-footer-cta h4 {
            margin: 0 0 0.85rem;
            font-size: clamp(1.6rem, 2.5vw, 2rem);
            color: #fff;
        }

        .fcom-footer-cta p {
            margin: 0 0 1.35rem;
            font-size: 1.05rem;
        }

        .fcom-footer-links {
            display: grid;
            gap: 0.75rem;
        }

        .fcom-footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 600;
        }

        .fcom-footer-links a:hover,
        .fcom-footer-links a:focus-visible {
            color: #fff;
        }

        .fcom-footer-copy {
            margin: 0;
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.6);
        }

        @media (max-width: 599px) {
            .fcom-product-card {
                padding: 1.75rem;
            }

            .fcom-suite-summary {
                padding: 2.25rem;
            }

            .fcom-welcome-product-links {
                padding: 2rem;
            }
        }
    </style>
</head>
<body <?php body_class('fcom-welcome-body'); ?>>
<div class="fcom-welcome-layout">
    <header class="fcom-welcome-header" role="banner">
        <div class="fcom-header-inner">
            <a class="fcom-welcome-logo" href="<?php echo esc_url($portal_url); ?>">
                <?php if (!empty($logo_url)) : ?>
                    <img src="<?php echo esc_url($logo_url); ?>" alt="<?php esc_attr_e('Fluent Community', 'fluent-community'); ?>">
                <?php endif; ?>
                <span><?php esc_html_e('Fluent Community', 'fluent-community'); ?></span>
            </a>
            <nav class="fcom-welcome-nav" aria-label="<?php esc_attr_e('Fluent Community primary navigation', 'fluent-community'); ?>">
                <a href="#fcom-ecosystem"><?php esc_html_e('Products', 'fluent-community'); ?></a>
                <a href="#fcom-suite"><?php esc_html_e('Fluent Suite', 'fluent-community'); ?></a>
                <a class="fcom-welcome-nav__cta" href="<?php echo esc_url($cta_url); ?>"><?php esc_html_e('Get Fluent Suite', 'fluent-community'); ?></a>
            </nav>
        </div>
    </header>
    <main class="fcom-welcome-page" role="main">
        <section class="fcom-welcome-hero" id="fcom-hero">
        <div class="fcom-hero-inner">
            <p class="fcom-hero-eyebrow"><?php esc_html_e('Fluent Suite', 'fluent-community'); ?></p>
            <h1 class="fcom-hero-title"><?php echo esc_html($title); ?></h1>
            <p class="fcom-hero-subtitle"><?php echo esc_html($description); ?></p>
            <a class="fcom-btn" href="<?php echo esc_url($cta_url); ?>">
                <?php esc_html_e('Get Started with Fluent Suite', 'fluent-community'); ?>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                    <path d="M3.75 9H14.25" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.75 4.5L14.25 9L9.75 13.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </section>

        </section>

        <section aria-labelledby="fcom-ecosystem" class="fcom-welcome-products">
        <div class="fcom-section-heading">
            <h2 id="fcom-ecosystem"><?php esc_html_e('Powerful tools for every team', 'fluent-community'); ?></h2>
            <p><?php esc_html_e('Each Fluent product is crafted to work beautifully on its own — and even better together. Build automated funnels, deliver world-class support, and scale revenue without leaving WordPress.', 'fluent-community'); ?></p>
        </div>
        <div class="fcom-product-grid">
            <?php foreach ($products as $product) :
                $iconStyle = 'background:' . $product['accent'];
                ?>
                <article class="fcom-product-card">
                    <div class="fcom-product-card__header">
                        <div class="fcom-product-card__icon" style="<?php echo esc_attr($iconStyle); ?>">
                            <?php if (!empty($product['logo'])) : ?>
                                <img src="<?php echo esc_url($product['logo']); ?>" alt="<?php echo esc_attr($product['name']); ?> logo">
                            <?php else : ?>
                                <span><?php echo esc_html($product['initials']); ?></span>
                            <?php endif; ?>
                        </div>
                        <div>
                            <h3><?php echo esc_html($product['headline']); ?></h3>
                            <p><?php echo esc_html($product['name']); ?></p>
                        </div>
                    </div>
                    <p><?php echo esc_html($product['description']); ?></p>
                    <a class="fcom-product-card__cta" href="<?php echo esc_url($product['url']); ?>" target="_blank" rel="noopener">
                        <?php esc_html_e('Learn More', 'fluent-community'); ?>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                            <path d="M3.33398 12.6667L12.6673 3.33337" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M6 3.33337H12.6673V10" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </section>

        </section>

        <section class="fcom-suite-summary" aria-labelledby="fcom-suite">
        <div class="fcom-suite-summary__content">
            <h3 id="fcom-suite"><?php esc_html_e('The Fluent way to run your business', 'fluent-community'); ?></h3>
            <p><?php esc_html_e('From email marketing and eCommerce to bookings and affiliate management, Fluent Suite keeps every workflow inside WordPress. Automate the busy work, personalize every touchpoint, and keep your teams in sync.', 'fluent-community'); ?></p>
            <a class="fcom-btn" href="<?php echo esc_url($cta_url); ?>">
                <?php esc_html_e('Explore Fluent Suite Plans', 'fluent-community'); ?>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
                    <path d="M3.75 9H14.25" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.75 4.5L14.25 9L9.75 13.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
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
                    <p><?php esc_html_e('Consistent design language, gradients, and typography keep every touchpoint on brand.', 'fluent-community'); ?></p>
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

        </section>

        <section class="fcom-welcome-product-links">
        <span><?php esc_html_e('Explore the Fluent ecosystem:', 'fluent-community'); ?></span>
        <?php foreach ($products as $product) : ?>
            <a href="<?php echo esc_url($product['url']); ?>" target="_blank" rel="noopener">
                <?php echo esc_html($product['name']); ?>
            </a>
        <?php endforeach; ?>
        </section>
    </main>
    <footer class="fcom-welcome-footer" role="contentinfo">
        <div class="fcom-footer-inner">
            <div class="fcom-footer-cta">
                <h4><?php esc_html_e('Ready to build with Fluent?', 'fluent-community'); ?></h4>
                <p><?php esc_html_e('Join thousands of businesses using Fluent tools to automate growth and deliver standout customer experiences.', 'fluent-community'); ?></p>
                <a class="fcom-btn" href="<?php echo esc_url($cta_url); ?>">
                    <?php esc_html_e('Start Your Fluent Journey', 'fluent-community'); ?>
                </a>
            </div>
            <div class="fcom-footer-links" aria-label="<?php esc_attr_e('Fluent product links', 'fluent-community'); ?>">
                <?php foreach ($products as $product) : ?>
                    <a href="<?php echo esc_url($product['url']); ?>" target="_blank" rel="noopener">
                        <?php echo esc_html($product['name']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <p class="fcom-footer-copy">
                &copy; <?php echo esc_html(date_i18n('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'fluent-community'); ?>
            </p>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
