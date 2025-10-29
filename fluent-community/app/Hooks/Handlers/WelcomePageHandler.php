<?php

namespace FluentCommunity\App\Hooks\Handlers;

use FluentCommunity\App\App;
use FluentCommunity\App\Vite;

class WelcomePageHandler
{
    public function register()
    {
        add_action('init', [$this, 'addRewriteRule']);

        add_filter('query_vars', function ($vars) {
            $vars[] = 'fcom_welcome';
            return $vars;
        });

        add_action('template_redirect', [$this, 'maybeRender']);
    }

    public function addRewriteRule()
    {
        add_rewrite_rule('^welcome/?$', 'index.php?fcom_welcome=1', 'top');
    }

    protected function isWelcomeRoute(): bool
    {
        if (get_query_var('fcom_welcome')) {
            return true;
        }

        global $wp;
        if (!empty($wp->request) && trim($wp->request, '/') === 'welcome') {
            return true;
        }

        return false;
    }

    public function maybeRender()
    {
        if (!$this->isWelcomeRoute()) {
            return;
        }

        status_header(200);
        nocache_headers();

        do_action('fluent_community/enqueue_global_assets', true);
        Vite::enqueueStaticStyle('fluent_community_welcome_page', 'welcome.css', ['fluent_community_global'], FLUENT_COMMUNITY_PLUGIN_VERSION);

        $heroTitle = __('Run Your Entire Business the Fluent Way', 'fluent-community');
        $heroDescription = __('Powerful WordPress tools built to automate, grow, and support your business seamlessly.', 'fluent-community');

        $products = [
            [
                'key'         => 'crm',
                'name'        => 'FluentCRM',
                'headline'    => __('Convert, nurture, and retain effortlessly', 'fluent-community'),
                'description' => __('Automate your marketing with visual funnels, deep segmentation, and tight integrations with WooCommerce, LMS plugins, and Fluent Forms.', 'fluent-community'),
                'url'         => 'https://fluentcrm.com',
            ],
            [
                'key'         => 'support',
                'name'        => 'Fluent Support',
                'headline'    => __('Deliver agile, proactive support', 'fluent-community'),
                'description' => __('Manage email, chat, and support tickets in one unified inbox with automations that keep your customers delighted.', 'fluent-community'),
                'url'         => 'https://fluentsupport.com',
            ],
            [
                'key'         => 'auth',
                'name'        => 'FluentAuth',
                'headline'    => __('Secure logins without friction', 'fluent-community'),
                'description' => __('Protect WordPress with passwordless magic links, social login, and security policies that instantly sync with your Fluent user base.', 'fluent-community'),
                'url'         => 'https://fluentauth.com',
            ],
            [
                'key'         => 'affiliate',
                'name'        => 'Fluent Affiliate',
                'headline'    => __('Grow with partners who love your brand', 'fluent-community'),
                'description' => __('Launch high-performing affiliate programs, track payouts precisely, and sync data with FluentCRM and WooCommerce in real time.', 'fluent-community'),
                'url'         => 'https://fluentsupport.com/fluent-affiliate',
            ],
            [
                'key'         => 'booking',
                'name'        => 'Fluent Booking',
                'headline'    => __('Schedule experiences customers remember', 'fluent-community'),
                'description' => __('Offer beautiful booking flows, automated reminders, and CRM-powered follow-ups that keep your calendar full.', 'fluent-community'),
                'url'         => 'https://fluentbooking.com',
            ],
            [
                'key'         => 'cart',
                'name'        => 'FluentCart',
                'headline'    => __('Sell smarter inside WordPress', 'fluent-community'),
                'description' => __('Build conversion-optimized checkouts, run order bumps and upsells, and sync every purchase with your Fluent automation stack.', 'fluent-community'),
                'url'         => 'https://fluentcart.com',
            ],
        ];

        $footerLinks = array_map(function ($product) {
            return [
                'label' => $product['name'],
                'url'   => $product['url'],
            ];
        }, $products);

        $viewData = [
            'title'           => $heroTitle,
            'description'     => $heroDescription,
            'url'             => home_url('/welcome'),
            'hero_cta_url'    => 'https://fluentcrm.com/fluent-suite/',
            'hero_cta_label'  => __('Get Started with Fluent Suite', 'fluent-community'),
            'hero_title'      => $heroTitle,
            'hero_subtitle'   => $heroDescription,
            'products'        => $products,
            'footer_links'    => $footerLinks,
        ];

        App::make('view')->render('welcome_page', $viewData);
        exit;
    }
}
