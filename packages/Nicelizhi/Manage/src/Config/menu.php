<?php

return [
    /**
     * Dashboard.
     */
    [
        'key'        => 'dashboard',
        'name'       => 'manage::app.components.layouts.sidebar.dashboard',
        'route'      => 'manage.dashboard.index',
        'sort'       => 1,
        'icon'       => 'icon-dashboard',
    ],

    /**
     * Sales.
     */
    [
        'key'        => 'sales',
        'name'       => 'manage::app.components.layouts.sidebar.sales',
        'route'      => 'manage.sales.orders.index',
        'sort'       => 2,
        'icon'       => 'icon-sales',
    ], [
        'key'        => 'sales.orders',
        'name'       => 'manage::app.components.layouts.sidebar.orders',
        'route'      => 'manage.sales.orders.index',
        'sort'       => 1,
        'icon'       => '',
    ], [
        'key'        => 'sales.shipments',
        'name'       => 'manage::app.components.layouts.sidebar.shipments',
        'route'      => 'manage.sales.shipments.index',
        'sort'       => 2,
        'icon'       => '',
    ], [
        'key'        => 'sales.invoices',
        'name'       => 'manage::app.components.layouts.sidebar.invoices',
        'route'      => 'manage.sales.invoices.index',
        'sort'       => 3,
        'icon'       => '',
    ], [
        'key'        => 'sales.refunds',
        'name'       => 'manage::app.components.layouts.sidebar.refunds',
        'route'      => 'manage.sales.refunds.index',
        'sort'       => 4,
        'icon'       => '',
    ], [
        'key'        => 'sales.transactions',
        'name'       => 'manage::app.components.layouts.sidebar.transactions',
        'route'      => 'manage.sales.transactions.index',
        'sort'       => 5,
        'icon'       => '',
    ],
    
    /**
     * Catalog.
     */
    [
        'key'        => 'catalog',
        'name'       => 'manage::app.components.layouts.sidebar.catalog',
        'route'      => 'manage.catalog.products.index',
        'sort'       => 3,
        'icon'       => 'icon-product',
    ], [
        'key'        => 'catalog.products',
        'name'       => 'manage::app.components.layouts.sidebar.products',
        'route'      => 'manage.catalog.products.index',
        'sort'       => 1,
        'icon'       => '',
    ], [
        'key'        => 'catalog.categories',
        'name'       => 'manage::app.components.layouts.sidebar.categories',
        'route'      => 'manage.catalog.categories.index',
        'sort'       => 2,
        'icon'       => '',
    ], [
        'key'        => 'catalog.attributes',
        'name'       => 'manage::app.components.layouts.sidebar.attributes',
        'route'      => 'manage.catalog.attributes.index',
        'sort'       => 3,
        'icon'       => '',
    ], [
        'key'        => 'catalog.families',
        'name'       => 'manage::app.components.layouts.sidebar.attribute-families',
        'route'      => 'manage.catalog.families.index',
        'sort'       => 4,
        'icon'       => '',
    ],

    /**
     * Customers.
     */
    [
        'key'        => 'customers',
        'name'       => 'manage::app.components.layouts.sidebar.customers',
        'route'      => 'manage.customers.customers.index',
        'sort'       => 4,
        'icon'       => 'icon-customer-2',
    ], [
        'key'        => 'customers.customers',
        'name'       => 'manage::app.components.layouts.sidebar.customers',
        'route'      => 'manage.customers.customers.index',
        'sort'       => 1,
        'icon'       => '',
    ], [
        'key'        => 'customers.groups',
        'name'       => 'manage::app.components.layouts.sidebar.groups',
        'route'      => 'manage.customers.groups.index',
        'sort'       => 2,
        'icon'       => '',
    ], [
        'key'        => 'customers.reviews',
        'name'       => 'manage::app.components.layouts.sidebar.reviews',
        'route'      => 'manage.customers.customers.review.index',
        'sort'       => 3,
        'icon'       => '',
    ],
    
    /**
     * CMS.
     */
    [
        'key'        => 'cms',
        'name'       => 'manage::app.components.layouts.sidebar.cms',
        'route'      => 'manage.cms.index',
        'sort'       => 5,
        'icon'       => 'icon-cms',
    ],
    

    /**
     * Marketing.
     */
    [
        'key'        => 'marketing',
        'name'       => 'manage::app.components.layouts.sidebar.marketing',
        'route'      => 'manage.marketing.promotions.catalog_rules.index',
        'sort'       => 6,
        'icon'       => 'icon-promotion',
        'icon-class' => 'promotion-icon',
    ], [
        'key'        => 'marketing.promotions',
        'name'       => 'manage::app.components.layouts.sidebar.promotions',
        'route'      => 'manage.marketing.promotions.catalog_rules.index',
        'sort'       => 1,
        'icon'       => '',
    ], [
        'key'        => 'marketing.promotions.catalog-rules',
        'name'       => 'manage::app.marketing.promotions.index.catalog-rule-title',
        'route'      => 'manage.marketing.promotions.catalog_rules.index',
        'sort'       => 1,
        'icon'       => '',
    ], [
        'key'        => 'marketing.promotions.cart-rules',
        'name'       => 'manage::app.marketing.promotions.index.cart-rule-title',
        'route'      => 'manage.marketing.promotions.cart_rules.index',
        'sort'       => 2,
        'icon'       => '',
    ], [
        'key'        => 'marketing.communications',
        'name'       => 'manage::app.components.layouts.sidebar.communications',
        'route'      => 'manage.marketing.communications.email_templates.index',
        'sort'       => 2,
        'icon'       => '',
    ], [
        'key'        => 'marketing.communications.email-templates',
        'name'       => 'manage::app.components.layouts.sidebar.email-templates',
        'route'      => 'manage.marketing.communications.email_templates.index',
        'sort'       => 1,
        'icon'       => '',
    ], [
        'key'        => 'marketing.communications.events',
        'name'       => 'manage::app.components.layouts.sidebar.events',
        'route'      => 'manage.marketing.communications.events.index',
        'sort'       => 2,
        'icon'       => '',
    ], [
        'key'        => 'marketing.communications.campaigns',
        'name'       => 'manage::app.components.layouts.sidebar.campaigns',
        'route'      => 'manage.marketing.communications.campaigns.index',
        'sort'       => 2,
        'icon'       => '',
    ], [
        'key'        => 'marketing.communications.subscribers',
        'name'       => 'manage::app.components.layouts.sidebar.newsletter-subscriptions',
        'route'      => 'manage.marketing.communications.subscribers.index',
        'sort'       => 3,
        'icon'       => '',
    ], [
        'key'        => 'marketing.sitemaps',
        'name'       => 'manage::app.components.layouts.sidebar.sitemaps',
        'route'      => 'manage.marketing.promotions.sitemaps.index',
        'sort'       => 3,
        'icon'       => '',
    ],
    
    /**
     * Reporting.
     */
    [
        'key'        => 'reporting',
        'name'       => 'manage::app.components.layouts.sidebar.reporting',
        'route'      => 'manage.reporting.sales.index',
        'sort'       => 7,
        'icon'       => 'icon-report',
        'icon-class' => 'report-icon',
    ], [
        'key'        => 'reporting.sales',
        'name'       => 'manage::app.components.layouts.sidebar.sales',
        'route'      => 'manage.reporting.sales.index',
        'sort'       => 1,
        'icon'       => '',
    ], [
        'key'        => 'reporting.customers',
        'name'       => 'manage::app.components.layouts.sidebar.customers',
        'route'      => 'manage.reporting.customers.index',
        'sort'       => 2,
        'icon'       => '',
    ], [
        'key'        => 'reporting.products',
        'name'       => 'manage::app.components.layouts.sidebar.products',
        'route'      => 'manage.reporting.products.index',
        'sort'       => 3,
        'icon'       => '',
    ],

    /**
     * Settings.
     */
    [
        'key'        => 'settings',
        'name'       => 'manage::app.components.layouts.sidebar.settings',
        'route'      => 'manage.settings.locales.index',
        'sort'       => 8,
        'icon'       => 'icon-settings',
        'icon-class' => 'settings-icon',
    ], [
        'key'        => 'settings.locales',
        'name'       => 'manage::app.components.layouts.sidebar.locales',
        'route'      => 'manage.settings.locales.index',
        'sort'       => 1,
        'icon'       => '',
    ], [
        'key'        => 'settings.currencies',
        'name'       => 'manage::app.components.layouts.sidebar.currencies',
        'route'      => 'manage.settings.currencies.index',
        'sort'       => 2,
        'icon'       => '',
    ], [
        'key'        => 'settings.exchange_rates',
        'name'       => 'manage::app.components.layouts.sidebar.exchange-rates',
        'route'      => 'manage.settings.exchange_rates.index',
        'sort'       => 3,
        'icon'       => '',
    ], [
        'key'        => 'settings.inventory_sources',
        'name'       => 'manage::app.components.layouts.sidebar.inventory-sources',
        'route'      => 'manage.settings.inventory_sources.index',
        'sort'       => 4,
        'icon'       => '',
    ], [
        'key'        => 'settings.channels',
        'name'       => 'manage::app.components.layouts.sidebar.channels',
        'route'      => 'manage.settings.channels.index',
        'sort'       => 5,
        'icon'       => '',
    ], [
        'key'        => 'settings.users',
        'name'       => 'manage::app.components.layouts.sidebar.users',
        'route'      => 'manage.settings.users.index',
        'sort'       => 6,
        'icon'       => '',
    ], [
        'key'        => 'settings.roles',
        'name'       => 'manage::app.components.layouts.sidebar.roles',
        'route'      => 'manage.settings.roles.index',
        'sort'       => 7,
        'icon'       => '',
    ], [
        'key'        => 'settings.themes',
        'name'       => 'Themes',
        'route'      => 'manage.settings.themes.index',
        'sort'       => 8,
        'icon'       => '',
    ], [
        'key'        => 'settings.taxes',
        'name'       => 'manage::app.components.layouts.sidebar.taxes',
        'route'      => 'manage.settings.taxes.categories.index',
        'sort'       => 9,
        'icon'       => '',
    ], [
        'key'        => 'settings.taxes.tax-categories',
        'name'       => 'manage::app.components.layouts.sidebar.tax-categories',
        'route'      => 'manage.settings.taxes.categories.index',
        'sort'       => 1,
        'icon'       => '',
    ], [
        'key'        => 'settings.taxes.tax-rates',
        'name'       => 'manage::app.components.layouts.sidebar.tax-rates',
        'route'      => 'manage.settings.taxes.rates.index',
        'sort'       => 2,
        'icon'       => '',
    ],

    /**
     * Configuration.
     */
    [
        'key'        => 'configuration',
        'name'       => 'manage::app.components.layouts.sidebar.configure',
        'route'      => 'manage.configuration.index',
        'sort'       => 9,
        'icon'       => 'icon-configuration',
    ]
];
