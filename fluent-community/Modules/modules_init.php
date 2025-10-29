<?php

add_action('fluent_community/portal_loaded', function ($app) {
    // Ensure module classes are available when Composer's classmap is authoritative
    $moduleFiles = [
        __DIR__ . '/Welcome/WelcomeModule.php',
    ];

    foreach ($moduleFiles as $moduleFile) {
        if (is_readable($moduleFile)) {
            require_once $moduleFile;
        }
    }

    (new \FluentCommunity\Modules\FeaturesHandler())->register($app);

    // Load the Integrations
    (new \FluentCommunity\Modules\Integrations\Integrations())->register();
    (new \FluentCommunity\Modules\Migrations\MigrationModule())->register($app);
    (new \FluentCommunity\Modules\Theming\TemplateLoader())->register();
});
