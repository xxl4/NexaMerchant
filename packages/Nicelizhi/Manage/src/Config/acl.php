<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    |
    | All ACLs related to dashboard will be placed here.
    |
    */
    [
        'key'   => 'dashboard',
        'name'  => 'manage::app.acl.dashboard',
        'route' => 'manage.dashboard.index',
        'sort'  => 1,
    ],

    /*
    |--------------------------------------------------------------------------
    | Sales
    |--------------------------------------------------------------------------
    |
    | All ACLs related to sales will be placed here.
    |
    */
    [
        'key'   => 'sales',
        'name'  => 'manage::app.acl.sales',
        'route' => 'manage.sales.orders.index',
        'sort'  => 2,
    ], [
        'key'   => 'sales.orders',
        'name'  => 'manage::app.acl.orders',
        'route' => 'manage.sales.orders.index',
        'sort'  => 1,
    ], [
        'key'   => 'sales.orders.view',
        'name'  => 'manage::app.acl.view',
        'route' => 'manage.sales.orders.view',
        'sort'  => 1,
    ], [
        'key'   => 'sales.orders.cancel',
        'name'  => 'manage::app.acl.cancel',
        'route' => 'manage.sales.orders.cancel',
        'sort'  => 2,
    ], [
        'key'   => 'sales.invoices',
        'name'  => 'manage::app.acl.invoices',
        'route' => 'manage.sales.invoices.index',
        'sort'  => 2,
    ], [
        'key'   => 'sales.invoices.view',
        'name'  => 'manage::app.acl.view',
        'route' => 'manage.sales.invoices.view',
        'sort'  => 1,
    ], [
        'key'   => 'sales.invoices.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.sales.invoices.create',
        'sort'  => 2,
    ], [
        'key'   => 'sales.shipments',
        'name'  => 'manage::app.acl.shipments',
        'route' => 'manage.sales.shipments.index',
        'sort'  => 3,
    ], [
        'key'   => 'sales.shipments.view',
        'name'  => 'manage::app.acl.view',
        'route' => 'manage.sales.shipments.view',
        'sort'  => 1,
    ], [
        'key'   => 'sales.shipments.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.sales.shipments.create',
        'sort'  => 2,
    ], [
        'key'   => 'sales.refunds',
        'name'  => 'manage::app.acl.refunds',
        'route' => 'manage.sales.refunds.index',
        'sort'  => 4,
    ], [
        'key'   => 'sales.refunds.view',
        'name'  => 'manage::app.acl.view',
        'route' => 'manage.sales.refunds.view',
        'sort'  => 1,
    ], [
        'key'   => 'sales.refunds.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.sales.refunds.create',
        'sort'  => 2,
    ], [
        'key'   => 'sales.transactions',
        'name'  => 'manage::app.acl.transactions',
        'route' => 'manage.sales.transactions.index',
        'sort'  => 5,
    ],[
        'key'   => 'sales.transactions.view',
        'name'  => 'manage::app.acl.view',
        'route' => 'manage.sales.transactions.view',
        'sort'  => 1,
    ],

    /*
    |--------------------------------------------------------------------------
    | Catalog
    |--------------------------------------------------------------------------
    |
    | All ACLs related to catalog will be placed here.
    |
    */
    [
        'key'   => 'catalog',
        'name'  => 'manage::app.acl.catalog',
        'route' => 'manage.catalog.index',
        'sort'  => 3,
    ], [
        'key'   => 'catalog.products',
        'name'  => 'manage::app.acl.products',
        'route' => 'manage.catalog.products.index',
        'sort'  => 1,
    ], [
        'key'   => 'catalog.products.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.catalog.products.create',
        'sort'  => 1,
    ], [
        'key'   => 'catalog.products.copy',
        'name'  => 'manage::app.acl.copy',
        'route' => 'manage.catalog.products.copy',
        'sort'  => 2,
    ], [
        'key'   => 'catalog.products.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.catalog.products.edit',
        'sort'  => 3,
    ], [
        'key'   => 'catalog.products.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.catalog.products.delete',
        'sort'  => 4,
    ], [
        'key'   => 'catalog.products.mass-update',
        'name'  => 'manage::app.acl.mass-update',
        'route' => 'manage.catalog.products.mass_update',
        'sort'  => 5,
    ], [
        'key'   => 'catalog.products.mass-delete',
        'name'  => 'manage::app.acl.mass-delete',
        'route' => 'manage.catalog.products.mass_delete',
        'sort'  => 6,
    ], [
        'key'   => 'catalog.categories',
        'name'  => 'manage::app.acl.categories',
        'route' => 'manage.catalog.categories.index',
        'sort'  => 2,
    ], [
        'key'   => 'catalog.categories.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.catalog.categories.create',
        'sort'  => 1,
    ], [
        'key'   => 'catalog.categories.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.catalog.categories.edit',
        'sort'  => 2,
    ], [
        'key'   => 'catalog.categories.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.catalog.categories.delete',
        'sort'  => 3,
    ], [
        'key'   => 'catalog.categories.mass-delete',
        'name'  => 'manage::app.acl.mass-delete',
        'route' => 'manage.catalog.categories.mass_delete',
        'sort'  => 4,
    ], [
        'key'   => 'catalog.categories.mass-update',
        'name'  => 'manage::app.acl.mass-update',
        'route' => 'manage.catalog.categories.mass_update',
        'sort'  => 4,
    ], [
        'key'   => 'catalog.attributes',
        'name'  => 'manage::app.acl.attributes',
        'route' => 'manage.catalog.attributes.index',
        'sort'  => 3,
    ], [
        'key'   => 'catalog.attributes.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.catalog.attributes.create',
        'sort'  => 1,
    ], [
        'key'   => 'catalog.attributes.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.catalog.attributes.edit',
        'sort'  => 2,
    ], [
        'key'   => 'catalog.attributes.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.catalog.attributes.delete',
        'sort'  => 3,
    ], [
        'key'   => 'catalog.attributes.mass-delete',
        'name'  => 'manage::app.acl.mass-delete',
        'route' => 'manage.catalog.attributes.mass_delete',
        'sort'  => 4,
    ], [
        'key'   => 'catalog.families',
        'name'  => 'manage::app.acl.attribute-families',
        'route' => 'manage.catalog.families.index',
        'sort'  => 4,
    ], [
        'key'   => 'catalog.families.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.catalog.families.create',
        'sort'  => 1,
    ], [
        'key'   => 'catalog.families.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.catalog.families.edit',
        'sort'  => 2,
    ], [
        'key'   => 'catalog.families.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.catalog.families.delete',
        'sort'  => 3,
    ],

    /*
    |--------------------------------------------------------------------------
    | Customers
    |--------------------------------------------------------------------------
    |
    | All ACLs related to customers will be placed here.
    |
    */
    [
        'key'   => 'customers',
        'name'  => 'manage::app.acl.customers',
        'route' => 'manage.customers.customers.index',
        'sort'  => 4,
    ], [
        'key'   => 'customers.customers',
        'name'  => 'manage::app.acl.customers',
        'route' => 'manage.customers.customers.index',
        'sort'  => 1,
    ], [
        'key'   => 'customers.customers.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.customer.create',
        'sort'  => 1,
    ], [
        'key'   => 'customers.customers.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.customers.customers.edit',
        'sort'  => 2,
    ], [
        'key'   => 'customers.customers.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.customers.customers.delete',
        'sort'  => 3,
    ], [
        'key'   => 'customers.customers.mass-update',
        'name'  => 'manage::app.acl.mass-update',
        'route' => 'manage.customers.customers.mass_update',
        'sort'  => 4,
    ], [
        'key'   => 'customers.customers.mass-delete',
        'name'  => 'manage::app.acl.mass-delete',
        'route' => 'manage.customers.customers.mass_delete',
        'sort'  => 5,
    ], [
        'key'   => 'customers.addresses',
        'name'  => 'manage::app.acl.addresses',
        'route' => 'manage.customers.customers.addresses.index',
        'sort'  => 2,
    ], [
        'key'   => 'customers.addresses.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.customers.customers.addresses.create',
        'sort'  => 1,
    ], [
        'key'   => 'customers.addresses.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.customers.customers.addresses.edit',
        'sort'  => 2,
    ], [
        'key'   => 'customers.addresses.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.customers.customers.addresses.delete',
        'sort'  => 3,
    ], [
        'key'   => 'customers.note',
        'name'  => 'manage::app.acl.note',
        'route' => 'manage.customer.note.create',
        'sort'  => 3,
    ], [
        'key'   => 'customers.groups',
        'name'  => 'manage::app.acl.groups',
        'route' => 'manage.customers.groups.index',
        'sort'  => 4,
    ], [
        'key'   => 'customers.groups.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.groups.create',
        'sort'  => 1,
    ], [
        'key'   => 'customers.groups.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.customers.groups.update',
        'sort'  => 2,
    ], [
        'key'   => 'customers.groups.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.customers.groups.delete',
        'sort'  => 3,
    ], [
        'key'   => 'customers.reviews',
        'name'  => 'manage::app.acl.reviews',
        'route' => 'manage.customers.customers.review.index',
        'sort'  => 5,
    ], [
        'key'   => 'customers.reviews.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.customers.customers.review.edit',
        'sort'  => 1,
    ], [
        'key'   => 'customers.reviews.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.customers.customers.review.delete',
        'sort'  => 2,
    ], [
        'key'   => 'customers.reviews.mass-update',
        'name'  => 'manage::app.acl.mass-update',
        'route' => 'manage.customers.customers.review.mass_update',
        'sort'  => 3,
    ], [
        'key'   => 'customers.reviews.mass-delete',
        'name'  => 'manage::app.acl.mass-delete',
        'route' => 'manage.customers.customers.review.mass_delete',
        'sort'  => 4,
    ], [
        'key'   => 'customers.orders',
        'name'  => 'manage::app.acl.orders',
        'route' => 'manage.customers.customers.orders.data',
        'sort'  => 7,
    ],

    /*
    |--------------------------------------------------------------------------
    | Marketing
    |--------------------------------------------------------------------------
    |
    | All ACLs related to marketing will be placed here.
    |
    */
    [
        'key'   => 'marketing',
        'name'  => 'manage::app.acl.marketing',
        'route' => 'manage.marketing.promotions.cart_rules.index',
        'sort'  => 6,
    ], [
        'key'   => 'marketing.promotions',
        'name'  => 'manage::app.acl.promotions',
        'route' => 'manage.marketing.promotions.cart_rules.index',
        'sort'  => 1,
    ], [
        'key'   => 'marketing.promotions.cart-rules',
        'name'  => 'manage::app.acl.cart-rules',
        'route' => 'manage.marketing.promotions.cart_rules.index',
        'sort'  => 1,
    ], [
        'key'   => 'marketing.promotions.cart-rules.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.marketing.promotions.cart_rules.create',
        'sort'  => 1,
    ], [
        'key'   => 'marketing.promotions.cart-rules.copy',
        'name'  => 'manage::app.acl.copy',
        'route' => 'manage.marketing.promotions.cart_rules.copy',
        'sort'  => 1,
    ], [
        'key'   => 'marketing.promotions.cart-rules.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.marketing.promotions.cart_rules.edit',
        'sort'  => 2,
    ], [
        'key'   => 'marketing.promotions.cart-rules.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.marketing.promotions.cart_rules.delete',
        'sort'  => 3,
    ], [
        'key'   => 'marketing.promotions.catalog-rules',
        'name'  => 'manage::app.acl.catalog-rules',
        'route' => 'manage.marketing.promotions.catalog_rules.index',
        'sort'  => 1,
    ], [
        'key'   => 'marketing.promotions.catalog-rules.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.marketing.promotions.catalog_rules.index',
        'sort'  => 1,
    ], [
        'key'   => 'marketing.promotions.catalog-rules.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.marketing.promotions.catalog_rules.edit',
        'sort'  => 2,
    ], [
        'key'   => 'marketing.promotions.catalog-rules.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.marketing.promotions.catalog_rules.delete',
        'sort'  => 3,
    ], [
        'key'   => 'marketing.communications',
        'name'  => 'manage::app.acl.communications',
        'route' => 'manage.marketing.communications.email_templates.index',
        'sort'  => 2,
    ], [
        'key'   => 'marketing.communications.email-templates',
        'name'  => 'manage::app.acl.email-templates',
        'route' => 'manage.marketing.communications.email_templates.index',
        'sort'  => 1,
    ], [
        'key'   => 'marketing.communications.email-templates.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.marketing.communications.email_templates.create',
        'sort'  => 2,
    ], [
        'key'   => 'marketing.communications.email-templates.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.marketing.communications.email_templates.edit',
        'sort'  => 3,
    ], [
        'key'   => 'marketing.communications.email-templates.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.marketing.communications.email_templates.delete',
        'sort'  => 4,
    ], [
        'key'   => 'marketing.communications.events',
        'name'  => 'manage::app.acl.events',
        'route' => 'manage.marketing.communications.events.index',
        'sort'  => 2,
    ], [
        'key'   => 'marketing.communications.events.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.marketing.communications.events.update',
        'sort'  => 1,
    ], [
        'key'   => 'marketing.communications.events.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.marketing.communications.events.edit',
        'sort'  => 2,
    ], [
        'key'   => 'marketing.communications.events.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.marketing.communications.events.delete',
        'sort'  => 3,
    ], [
        'key'   => 'marketing.communications.campaigns',
        'name'  => 'manage::app.acl.campaigns',
        'route' => 'manage.marketing.communications.campaigns.index',
        'sort'  => 3,
    ], [
        'key'   => 'marketing.communications.campaigns.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.marketing.communications.campaigns.create',
        'sort'  => 1,
    ], [
        'key'   => 'marketing.communications.campaigns.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.marketing.communications.campaigns.edit',
        'sort'  => 2,
    ], [
        'key'   => 'marketing.communications.campaigns.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.marketing.communications.campaigns.delete',
        'sort'  => 3,
    ], [
        'key'   => 'marketing.communications.subscribers',
        'name'  => 'manage::app.acl.subscribers',
        'route' => 'manage.marketing.communications.subscribers.index',
        'sort'  => 3,
    ], [
        'key'   => 'marketing.communications.subscribers.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.marketing.communications.subscribers.edit',
        'sort'  => 1,
    ], [
        'key'   => 'marketing.communications.subscribers.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.marketing.communications.subscribers.delete',
        'sort'  => 2,
    ], [
        'key'   => 'marketing.sitemaps',
        'name'  => 'manage::app.acl.sitemaps',
        'route' => 'manage.marketing.promotions.sitemaps.index',
        'sort'  => 3,
    ], [
        'key'   => 'marketing.sitemaps.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.marketing.promotions.sitemaps.update',
        'sort'  => 1,
    ], [
        'key'   => 'marketing.sitemaps.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.marketing.promotions.sitemaps.update',
        'sort'  => 2,
    ], [
        'key'   => 'marketing.sitemaps.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.marketing.promotions.sitemaps.delete',
        'sort'  => 3,
    ],

    /*
    |--------------------------------------------------------------------------
    | Reporting
    |--------------------------------------------------------------------------
    |
    | All Reporting related to reporting will be placed here.
    |
    */
    [
        'key'   => 'reporting',
        'name'  => 'manage::app.acl.reporting',
        'route' => 'manage.reporting.sales.index',
        'sort'  => 6,
    ], [
        'key'   => 'reporting.sales',
        'name'  => 'manage::app.acl.sales',
        'route' => 'manage.reporting.sales.index',
        'sort'  => 1,
    ], [
        'key'   => 'reporting.customers',
        'name'  => 'manage::app.acl.customers',
        'route' => 'manage.reporting.customers.index',
        'sort'  => 2,
    ], [
        'key'   => 'reporting.products',
        'name'  => 'manage::app.acl.products',
        'route' => 'manage.reporting.products.index',
        'sort'  => 3,
    ],

    /*
    |--------------------------------------------------------------------------
    | CMS
    |--------------------------------------------------------------------------
    |
    | All ACLs related to cms will be placed here.
    |
    */
    [
        'key'   => 'cms',
        'name'  => 'manage::app.acl.cms',
        'route' => 'manage.cms.index',
        'sort'  => 7,
    ], [
        'key'   => 'cms.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.cms.create',
        'sort'  => 1,
    ], [
        'key'   => 'cms.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.cms.edit',
        'sort'  => 2,
    ], [
        'key'   => 'cms.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.cms.delete',
        'sort'  => 3,
    ], [
        'key'   => 'cms.mass-delete',
        'name'  => 'manage::app.acl.mass-delete',
        'route' => 'manage.cms.mass_delete',
        'sort'  => 4,
    ],

    /*
    |--------------------------------------------------------------------------
    | Settings
    |--------------------------------------------------------------------------
    |
    | All ACLs related to settings will be placed here.
    |
    */
    [
        'key'   => 'settings',
        'name'  => 'manage::app.acl.settings',
        'route' => 'manage.settings.users.index',
        'sort'  => 8,
    ], [
        'key'   => 'settings.locales',
        'name'  => 'manage::app.acl.locales',
        'route' => 'manage.settings.locales.index',
        'sort'  => 1,
    ], [
        'key'   => 'settings.locales.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.settings.locales.create',
        'sort'  => 1,
    ], [
        'key'   => 'settings.locales.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.settings.locales.edit',
        'sort'  => 2,
    ], [
        'key'   => 'settings.locales.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.settings.locales.delete',
        'sort'  => 3,
    ], [
        'key'   => 'settings.currencies',
        'name'  => 'manage::app.acl.currencies',
        'route' => 'manage.settings.currencies.index',
        'sort'  => 2,
    ], [
        'key'   => 'settings.currencies.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.settings.currencies.create',
        'sort'  => 1,
    ], [
        'key'   => 'settings.currencies.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.settings.currencies.edit',
        'sort'  => 2,
    ], [
        'key'   => 'settings.currencies.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.settings.currencies.delete',
        'sort'  => 3,
    ], [
        'key'   => 'settings.exchange_rates',
        'name'  => 'manage::app.acl.exchange-rates',
        'route' => 'manage.settings.exchange_rates.index',
        'sort'  => 3,
    ], [
        'key'   => 'settings.exchange_rates.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.settings.exchange_rates.create',
        'sort'  => 1,
    ], [
        'key'   => 'settings.exchange_rates.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.settings.exchange_rates.edit',
        'sort'  => 2,
    ], [
        'key'   => 'settings.exchange_rates.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.settings.exchange_rates.delete',
        'sort'  => 3,
    ], [
        'key'   => 'settings.inventory_sources',
        'name'  => 'manage::app.acl.inventory-sources',
        'route' => 'manage.settings.inventory_sources.index',
        'sort'  => 4,
    ], [
        'key'   => 'settings.inventory_sources.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.settings.inventory_sources.create',
        'sort'  => 1,
    ], [
        'key'   => 'settings.inventory_sources.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.settings.inventory_sources.edit',
        'sort'  => 2,
    ], [
        'key'   => 'settings.inventory_sources.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.settings.inventory_sources.delete',
        'sort'  => 3,
    ], [
        'key'   => 'settings.channels',
        'name'  => 'manage::app.acl.channels',
        'route' => 'manage.settings.channels.index',
        'sort'  => 5,
    ], [
        'key'   => 'settings.channels.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.settings.channels.create',
        'sort'  => 1,
    ], [
        'key'   => 'settings.channels.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.settings.channels.edit',
        'sort'  => 2,
    ], [
        'key'   => 'settings.channels.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.settings.channels.delete',
        'sort'  => 3,
    ], [
        'key'   => 'settings.users',
        'name'  => 'manage::app.acl.users',
        'route' => 'manage.settings.users.index',
        'sort'  => 6,
    ], [
        'key'   => 'settings.users.users',
        'name'  => 'manage::app.acl.users',
        'route' => 'manage.settings.users.index',
        'sort'  => 1,
    ], [
        'key'   => 'settings.users.users.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.settings.users.store',
        'sort'  => 1,
    ], [
        'key'   => 'settings.users.users.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.settings.users.edit',
        'sort'  => 2,
    ], [
        'key'   => 'settings.users.users.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.settings.users.delete',
        'sort'  => 3,
    ], [
        'key'   => 'settings.roles',
        'name'  => 'manage::app.acl.roles',
        'route' => 'manage.settings.roles.index',
        'sort'  => 7,
    ], [
        'key'   => 'settings.roles.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.settings.roles.create',
        'sort'  => 1,
    ], [
        'key'   => 'settings.roles.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.settings.roles.edit',
        'sort'  => 2,
    ], [
        'key'   => 'settings.roles.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.settings.roles.delete',
        'sort'  => 3,
    ], [
        'key'   => 'settings.themes',
        'name'  => 'manage::app.acl.themes',
        'route' => 'manage.settings.themes.index',
        'sort'  => 8,
    ], [
        'key'   => 'settings.themes.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.settings.themes.store',
        'sort'  => 1,
    ], [
        'key'   => 'settings.themes.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.settings.themes.edit',
        'sort'  => 2,
    ], [
        'key'   => 'settings.themes.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.settings.themes.delete',
        'sort'  => 3,
    ], [
        'key'   => 'settings.taxes',
        'name'  => 'manage::app.acl.taxes',
        'route' => 'manage.settings.taxes.categories.index',
        'sort'  => 9,
    ], [
        'key'   => 'settings.taxes.tax-categories',
        'name'  => 'manage::app.acl.tax-categories',
        'route' => 'manage.settings.taxes.categories.index',
        'sort'  => 1,
    ], [
        'key'   => 'settings.taxes.tax-categories.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.settings.taxes.tax_categories.create',
        'sort'  => 1,
    ], [
        'key'   => 'settings.taxes.tax-categories.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.settings.taxes.categories.edit',
        'sort'  => 2,
    ], [
        'key'   => 'settings.taxes.tax-categories.delete',
        'name'  => 'manage::app.acl.delete',
        'route' => 'manage.settings.taxes.categories.delete',
        'sort'  => 3,
    ], [
        'key'   => 'settings.taxes.tax-rates',
        'name'  => 'manage::app.acl.tax-rates',
        'route' => 'manage.settings.taxes.rates.index',
        'sort'  => 2,
    ], [
        'key'   => 'settings.taxes.tax-rates.create',
        'name'  => 'manage::app.acl.create',
        'route' => 'manage.settings.taxes.rates.create',
        'sort'  => 1,
    ], [
        'key'   => 'settings.taxes.tax-rates.edit',
        'name'  => 'manage::app.acl.edit',
        'route' => 'manage.settings.taxes.rates.edit',
        'sort'  => 2,
    ],

    /*
    |--------------------------------------------------------------------------
    | Configuration
    |--------------------------------------------------------------------------
    |
    | All ACLs related to configuration will be placed here.
    |
    */
    [
        'key'   => 'configuration',
        'name'  => 'manage::app.acl.configure',
        'route' => 'manage.configuration.index',
        'sort'  => 9,
    ]
];
