<?php

namespace FluentCommunity\Modules\Welcome;

use FluentCommunity\App\App;
use FluentCommunity\App\Functions\Utility;

class WelcomeModule
{
    public function register($app)
    {
        add_filter('fluent_community/app_route_paths', [$this, 'registerRoute']);

        add_action('fluent_community/rendering_path_ssr_welcome', function ($segments = []) {
            $this->renderWelcomePage();
        }, 10, 1);
    }

    public function registerRoute($routes)
    {
        $routes[] = 'welcome';

        return array_values(array_unique($routes));
    }

    protected function renderWelcomePage()
    {
        $title = __('Run Your Entire Business the Fluent Way', 'fluent-community');
        $description = __('Powerful WordPress tools built to automate, grow, and support your business seamlessly.', 'fluent-community');

        $assetsBase = trailingslashit(FLUENT_COMMUNITY_PLUGIN_URL . 'assets/images/brands');

        $products = [
            [
                'name'        => 'FluentCRM',
                'headline'    => __('Automate customer journeys effortlessly', 'fluent-community'),
                'description' => __('Centralize email marketing, segmentation, and automation directly inside WordPress.', 'fluent-community'),
                'url'         => 'https://fluentcrm.com/',
                'logo'        => $assetsBase . 'fluentcrm.svg',
                'accent'      => 'linear-gradient(135deg, #4A5FE0 0%, #6A5BFF 100%)',
                'initials'    => 'FC',
            ],
            [
                'name'        => 'Fluent Support',
                'headline'    => __('Deliver real-time support experiences', 'fluent-community'),
                'description' => __('Manage tickets, automations, and customer communications from a unified helpdesk.', 'fluent-community'),
                'url'         => 'https://fluentsupport.com/',
                'logo'        => $assetsBase . 'fluent-support.svg',
                'accent'      => 'linear-gradient(135deg, #2EB6FF 0%, #4A5FE0 100%)',
                'initials'    => 'FS',
            ],
            [
                'name'        => 'FluentAuth',
                'headline'    => __('Secure logins without friction', 'fluent-community'),
                'description' => __('Protect membership access with passwordless magic links, social login, and 2FA.', 'fluent-community'),
                'url'         => 'https://fluentauth.com/',
                'logo'        => '',
                'accent'      => 'linear-gradient(135deg, #2B2E33 0%, #4A5FE0 100%)',
                'initials'    => 'FA',
            ],
            [
                'name'        => 'Fluent Affiliate',
                'headline'    => __('Launch high-converting affiliate programs', 'fluent-community'),
                'description' => __('Reward partners, track referrals, and automate payouts with deep FluentCRM syncing.', 'fluent-community'),
                'url'         => 'https://fluentaffiliate.com/',
                'logo'        => '',
                'accent'      => 'linear-gradient(135deg, #7F56DA 0%, #FF77C8 100%)',
                'initials'    => 'FAl',
            ],
            [
                'name'        => 'Fluent Booking',
                'headline'    => __('Book appointments that stay in sync', 'fluent-community'),
                'description' => __('Create branded scheduling flows that sync with calendars and trigger CRM automations.', 'fluent-community'),
                'url'         => 'https://fluentbooking.com/',
                'logo'        => '',
                'accent'      => 'linear-gradient(135deg, #4A5FE0 0%, #2EB6FF 100%)',
                'initials'    => 'FB',
            ],
            [
                'name'        => 'FluentCart',
                'headline'    => __('Sell and upsell products in minutes', 'fluent-community'),
                'description' => __('Build high-converting checkout funnels with native CRM, email, and affiliate integrations.', 'fluent-community'),
                'url'         => 'https://fluentcart.com/',
                'logo'        => '',
                'accent'      => 'linear-gradient(135deg, #FF915C 0%, #FF5FA2 100%)',
                'initials'    => 'FCT',
            ],
        ];

        $ctaUrl = 'https://fluentcrm.com/fluent-suite/';

        $viewData = [
            'title'       => $title,
            'description' => $description,
            'cta_url'     => $ctaUrl,
            'products'    => $products,
            'color_css'   => Utility::getColorCssVariables(),
        ];

        status_header(200);
        App::make('view')->render('welcome.index', $viewData);
        exit;
    }
}
