---
title: Database Structure
tags:
  - MySQL
  - SQL
categories:
  - MySQL
date: 2024-03-26 09:43:12
description: Database Structure
lang: en
---

# Product
## products

| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| sku           |   varchar(191)   | sku |
| type    |  varchar(191)   | prduct type |
| parent_id |  int(10)   | product parent id |
| attribute_family_id |  int(10)   | attribute family id  |
| additional |  json   | additional |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

## product_attribute_values
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_bundle_options
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_bundle_option_products
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_bundle_option_translations
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_categories
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_cross_sells
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_customer_group_prices
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_downloadable_links
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_downloadable_link_translations
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_downloadable_samples
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_downloadable_samples_translations
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_flat
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| sku           |   varchar(191)   | sku |
| type    |  varchar(191)   | prduct type |
| Field              | Type | Desc |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_grouped_products
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_images
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_inventories
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_inventory_indices
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_ordered_inventories
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_price_indices
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_relations
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_reviews
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_review_attachments
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_super_attributes
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_up_sells
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_videos
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |



# Order

## orders
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| increment_id        |   int(10)   | increment id |
| status        |   varchar(191)   | status ['pending','processing','closed','completed','canceled'] |
| channel_name        |   varchar(191)   | id |
| is_guest        |   tinyint(1)   | id |
| customer_email        |   int(10)   | id |
| customer_last_name        |   int(10)   | id |
| customer_first_name        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

## order_comments
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

## order_items
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

## order_payment
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

## order_transactions
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| transaction_id        |   varchar   | transaction id |
| status        |   varchar   |  |
| type        |   varchar   |  |
| amount        |   decimal(12,4)   |  |
| payment_method        |  varchar   |  |
| data        |  json   |  |
| invoice_id        |  int   |  |
| order_id        |  int   |  |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

# Address

## addresses
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|address_type        |   varchar(191)   | address type |
|customer_id        |   int(10)   | customer id |
|cart_id        |   int(10)   | cart id |
|order_id        |   int(10)   | order id |
|first_name        |   varchar(191)   | first name |
|last_name        |   varchar(191)   | last name |
|gender        |   varchar(191)   | gender |
|company_name        |   varchar(191)   | company name |
|address1        |   varchar(191)   | address1 |
|address2        |   varchar(191)   | address2 |
|city        |   varchar(191)   | city |
|state        |   varchar(191)   | state |
|postcode        |   varchar(191)   | postcode |
|country        |   varchar(191)   | country |
|email        |   varchar(191)   | email |
|phone        |   varchar(191)   | phone |
|vat_id        |   varchar(191)   | vat id |
|default_address        |   tinyint(1)   | default address |
|additional        |   json   | additional |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

# Refund

## Refund
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| increment_id        |   varchar(191)   | increment ID |
| state        |   varchar(191)   | state |
| email_sent        |   tinyint(1)   | email sent |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

## RefundItem
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

# Attributes

## attributes
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|code        |   varchar(191)   | code |
|admin_name        |   varchar(191)   | admin name |
|type        |   varchar(191)   | type |
|swatch_type        |   varchar(191)   | swatch type |
|validation        |   varchar(191)   | validation |
|regex        |   varchar(191)   | regex |
|position        |   int(10)   | position |
|is_required        |   tinyint(1)   | is required |
|is_unique        |   tinyint(1)   | is unique |
|is_filterable        |   tinyint(1)   | is filterable |
|is_comparable        |   tinyint(1)   | is comparable |
|is_configurable        |   tinyint(1)   | is configurable |
|is_user_defined        |   tinyint(1)   | is user defined |
|is_visible_on_front        |   tinyint(1)   | is visible on front |
|value_per_locale       |   tinyint(1)   | value per locale |
|value_per_channel       |   tinyint(1)   | value per channel |
|default_value        |   varchar(191)   | default value |
|enable_wysiwyg        |   tinyint(1)   | enable wysiwyg |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## attribute_families
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| code        |   varchar(191)   | code |
| name        |   varchar(191)   | name |
| is_user_defined        |   tinyint(1)   | is user defined |
|status        |   tinyint(1)   | status |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## attribute_groups
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| attribute_family_id        |   int(10)   | attribute family id |
|name        |   varchar(191)   | name |
|column        |   tinyint(1)   | column |
|position        |   int(10)   | position |
|is_user_defined        |   tinyint(1)   | is user defined |
## attribute_groups_mappings
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| attribute_id        |   int(10)   | attribute_id |
| attribute_group_id        |   int(10)   | attribute group id |
|position        |   int(10)   | position |
## attribute_options
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|attribute_id        |   int(10)   | attribute id |
|admin_name        |   varchar(191)   | admin name |
|sort_order        |   int(10)   | sort order |
|swatch_value        |   varchar(191)   | swatch value |
## attribute_option_translations
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|attribute_option_id        |   int(10)   | attribute id |
|locale        |   varchar(191)   | locale |
|name        |   varchar(191)   | name |
## attribute_translations
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|attribute_id        |   int(10)   | attribute id |
|locale        |   varchar(191)   | locale |
|name        |   varchar(191)   | name |

# Cart

## cart
## cart_items
## cart_item_inventories
## cart_payment
## cart_shipping_rates

# Invoices

# Marketing

## Marketing Compaigns
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|name        |   varchar(191)   | name |
|subject        |   varchar(191)   | subject |
|status        |   varchar(191)   | status |
|type        |   varchar(191)   | type |
|mail_to        |   varchar(191)   | mail_to |
|spooling        |   tinyint(1)   | spooling |
|channel_id        |   int(10)   | channel_id |
|customer_group_id        |   int(10)   | customer_group_id |
|marketing_template_id        |   int(10)   | marketing_template_id |
|marketing_event_id        |   int(10)   | marketing_event_id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

## Marketing Events
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|name        |   varchar(191)   | name |
|description        |   varchar(191)   | description |
|date        |   varchar(191)   | date |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## Marketing Templates
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|name        |   varchar(191)   | name |
|status        |   varchar(191)   | status |
|content        |   varchar(191)   | content |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
# Report

# Channel

## Channels
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|code        |   varchar(191)   | code |
|timezone        |   varchar(191)   | timezone |
|theme        |   varchar(191)   | theme |
|hostname        |   varchar(191)   | hostname |
|logo        |   varchar(191)   | logo |
|favicon        |   varchar(191)   | favicon |
|home_seo       |   varchar(191)   | home_seo |
|is_maintenance_on  
|allowed_ips     |   varchar(191)   | allowed_ips |
|root_category_id     |   varchar(191)   | root_category_id |
|default_locale_id     |   varchar(191)   | default_locale_id |
|base_currency_id     |   varchar(191)   | base_currency_id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## Channel_currencies
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
|channel_id        |   int(10)   | channel_id |
|currency_id        |   int(10)   | currency_id |
## Channel inventory sources
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
|channel_id        |   int(10)   | channel_id |
|locale_id        |   int(10)   | locale_id |
## Channel Locales
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|channel_id        |   int(10)   | channel_id |
|locale        |   varchar(191)   | locale |
|name        |   varchar(191)   | name |
|description        |   varchar(191)   | description |
|maintenance_mode_text        |   varchar(191)   | maintenance_mode_text |
|home_seo        |   varchar(191)   | home_seo |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## Channel translations
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| :---------------- | :------: | ----: |
|channel_id        |   int(10)   | channel_id |
|inventory_source_id        |   int(10)   | inventory_source_id |
# CMS

# Category

# Customer

## Customers
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| first_name        |   varchar(191)   | first_name |
| last_name        |   varchar(191)   | last_name |
| email        |   varchar(191)   | email |
| gender        |   varchar(191)   | gender |
| date_of_birth        |   varchar(191)   | date_of_birth |
| phone        |   varchar(191)   | phone |
| image        |   varchar(191)   | image |
| status        |   int   | status |
| password        |   varchar(191)   | password |
|api_token       | varchar(191) |  | api_token  |
|customer_group_id       | int   |  | customer_group_id  |
|subscribed_to_news_letter       | tinyint   |  | subscribed_to_news_letter  |
|is_verified       | tinyint   |  | is_verified  |
|is_suspended       | tinyint   |  | is_suspended  |
|token         | varchar(191)   |  | token  |
|remember_token       | varchar(191)   |  | remember_token  |
 |  timestamp   | create time |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

## Customer Groups
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|code        |   varchar(191)   | code |
|name        |   varchar(191)   | name |
|is_user_defined        |   tinyint(1)   | is_user_defined |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## Customer notes
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## Customer password resets
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| email        |   varchar(191)   | email |
| token        |   varchar(191)   | token |
| created_at |  timestamp   | create time |
## Customer social accounts
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| customer_id        |   int(10)   | customer_id |
| provider_name        |   varchar(191)   | provider |
| provider_id        |   varchar(191)   | provider_id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

# Countries

# Rule

## Cart Rule

### cart_rules
### cart_rule_channels
### cart_rule_coupons
### cart_rule_coupon_usage
### cart_rule_customers
### cart_rule_customer_groups
### cart_rule_translations

## Catelog Rule

### catalog_rules
### catalog_rule_channels
### catalog_rule_customer_groups
### catalog_rule_products
### catalog_rule_product_prices

# Tax
## tax_categories
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## tax_categories_tax_rates
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## tax_rates
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

# Theme
## theme_customizations
## theme_customization_translations

# Refund
## refunds
## refund_items

# Wishlist
## wishlist
## wishlist_items

# Visits
## visits
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|method        |   varchar(191)   | method |
|request_url        |   varchar(191)   | request_url |
|url        |   varchar(191)   | url |
|referer        |   varchar(191)   | referer |
|lanagues        |   varchar(191)   | lanagues |
|useragent        |   varchar(191)   | useragent |
|headers        |   varchar(191)   | headers |
|device        |   varchar(191)   | device |
|platform        |   varchar(191)   | platform |
|browser        |   varchar(191)   | browser |
|ip        |   varchar(191)   | ip |
|visitable_type        |   varchar(191)   | visitable_type |
|visitable_id        |   int(10)   | visitable_id |
|visitor_type        |   varchar(191)   | visitor_type |
|visitor_id        |   int(10)   | visitor_id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

# Roles
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|name        |   varchar(191)   | name |
|description        |   varchar(191)   | description |
|permissions        |   varchar(191)   | permissions |
|permissions_type        |   varchar(191)   | permissions_type |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

# Shopify

## Shopify Store
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|shopify_store_id        |   varchar(191)   | shopify_store_id |
|shopify_app_host_name        |   varchar(191)   | shopify_app_host_name |
|shopify_admin_access_token        |   varchar(191)   | shopify_admin_access_token |
|shopify_client_id       |   varchar(191)   | shopify_client_id |
|shopify_client_secret       |   varchar(191)   | shopify_client_secret |
|status       |   tinyint(1)   | status |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## Shopify Product
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|shopify_store_id        |   varchar(191)   | shopify_store_id |
|product_id        |   varchar(191)   | product_id |
|title        |   varchar(191)   | title |
|product_type       |   varchar(191)   | product_type |
|body_html       |   varchar(191)   | body_html |
|vendor       |   varchar(191)   | vendor |
|handle       |   varchar(191)   | handle |
|published_at       |   varchar(191)   | published_at |
|template_suffix       |   varchar(191)   | template_suffix |
|published_scope       |   varchar(191)   | published_scope |
|tags       |   varchar(191)   | tags |
|status     |   varchar(191)   | status |
|admin_graphql_api_id       |   varchar(191)   | admin_graphql_api_id |
|variants       |   varchar(191)   | variants |
|options       |   varchar(191)   | options |
|images       |   varchar(191)   | images |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## Shopify Order
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|shopify_store_id        |   varchar(191)   | shopify_store_id |
|shopify_order_id        |   varchar(191)   | shopify_order_id |
|order_id        |   int(10)   | order_id |
|admin_graphql_api_id        |   varchar(191)   | admin_graphql_api_id |
|app_id        |   varchar(191)   | app_id |
|browser_ip        |   varchar(191)   | browser_ip |
|buyer_accepts_marketing        |   varchar(191)   | buyer_accepts_marketing |
|cancel_reason        |   varchar(191)   | cancel_reason |
|cancelled_at        |   varchar(191)   | cancelled_at |
|cart_token        |   varchar(191)   | cart_token |
|checkout_id        |   varchar(191)   | checkout_id |
|checkout_token        |   varchar(191)   | checkout_token |
|closed_at        |   varchar(191)   | closed_at |
|company        |   varchar(191)   | company |
|confirmation_number        |   varchar(191)   | confirmation_number |
|confirmed        |   varchar(191)   | confirmed |
|contact_email        |   varchar(191)   | contact_email |
|currency        |   varchar(191)   | currency |
|current_subtotal_price        |   varchar(191)   | current_subtotal_price |
|current_subtotal_price_set        |   varchar(191)   | current_subtotal_price_set |
|current_total_additional_fees_set        |   varchar(191)   | current_total_additional_fees_set |
|current_total_discounts        |   varchar(191)   | current_total_discounts |
|current_total_discounts_set        |   varchar(191)   | current_total_discounts_set |
|current_total_duties_set        |   varchar(191)   | current_total_duties_set |
|current_total_price        |   varchar(191)   | current_total_price |
|current_total_price_set        |   varchar(191)   | current_total_price_set |
|current_total_tax        |   varchar(191)   | current_total_tax |
|current_total_tax_set        |   varchar(191)   | current_total_tax_set |
|customer_locale        |   varchar(191)   | customer_locale |
|device_id        |   varchar(191)   | device_id |
|discount_codes        |   varchar(191)   | discount_codes |
|email        |   varchar(191)   | email |
|estimate_taxes        |   varchar(191)   | estimate_taxes |
|financial_status        |   varchar(191)   | financial_status |
|fulfillment_status        |   varchar(191)   | fulfillment_status |
|landing_site        |   varchar(191)   | landing_site |
|landing_site_ref        |   varchar(191)   | landing_site_ref |
|location_id        |   varchar(191)   | location_id |
|merchant_of_record_app_id        |   varchar(191)   | merchant_of_record_app_id |
|name        |   varchar(191)   | name |
|note        |   varchar(191)   | note |
|note_attributes        |   varchar(191)   | note_attributes |
|number        |   varchar(191)   | number |
|order_number        |   varchar(191)   | order_number |
|order_status_url        |   varchar(191)   | order_status_url |
|original_total_additional_fees_set        |   varchar(191)   | original_total_additional_fees_set |
|original_total_duties_set        |   varchar(191)   | original_total_duties_set |
|payment_gateway_names        |   varchar(191)   | payment_gateway_names |
|phone        |   varchar(191)   | phone |
|po_number        |   varchar(191)   | po_number |
|presentment_currency        |   varchar(191)   | presentment_currency |
|processed_at        |   varchar(191)   | processed_at |
|reference        |   varchar(191)   | reference |
|referring_site        |   varchar(191)   | referring_site |
|source_identifier        |   varchar(191)   | source_identifier |
|source_name        |   varchar(191)   | source_name |
|source_url        |   varchar(191)   | source_url |
|subtotal_price        |   varchar(191)   | subtotal_price |
|subtotal_price_set        |   varchar(191)   | subtotal_price_set |
|tags        |   varchar(191)   | tags |
|tax_exempt        |   varchar(191)   | tax_exempt |
|tax_lines        |   varchar(191)   | tax_lines |
|taxes_included        |   varchar(191)   | taxes_included |
|test        |   varchar(191)   | test |
|token        |   varchar(191)   | token |
|total_discounts        |   varchar(191)   | total_discounts |
|total_discounts_set        |   varchar(191)   | total_discounts_set |
|total_line_items_price        |   varchar(191)   | total_line_items_price |
|total_line_items_price_set        |   varchar(191)   | total_line_items_price_set |
|total_outstanding        |   varchar(191)   | total_outstanding |
|total_price        |   varchar(191)   | total_price |
|total_price_set        |   varchar(191)   | total_price_set |
|total_shipping_set        |   varchar(191)   | total_shipping_set |
|total_tax        |   varchar(191)   | total_tax |
|total_tax_set        |   varchar(191)   | total_tax_set |
|total_tip_received        |   varchar(191)   | total_tip_received |
|total_weight        |   varchar(191)   | total_weight |
|user_id        |   varchar(191)   | user_id |
|billing_address        |   varchar(191)   | billing_address |
|customer        |   varchar(191)   | customer |
|discount_applications        |   varchar(191)   | discount_applications |
|fulfillments        |   varchar(191)   | fulfillments |
|line_items        |   varchar(191)   | line_items |
|payment_terms        |   varchar(191)   | payment_terms |
|refunds        |   varchar(191)   | refunds |
|shipping_address        |   varchar(191)   | shipping_address |
|shipping_lines        |   varchar(191)   | shipping_lines |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## Shopify Customer
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|cus_id       |   varchar(191)   | cus_id |
|email       |   varchar(191)   | email |
|first_name       |   varchar(191)   | first_name |
|last_name       |   varchar(191)   | last_name |
|orders_count       |   varchar(191)   | orders_count |
|state       |   varchar(191)   | state |
|total_spent       |   varchar(191)   | total_spent |
|last_order_id       |   varchar(191)   | last_order_id |
|note       |   varchar(191)   | note |
|verfied_email       |   varchar(191)   | verified_email |
|multipass_identifier       |   varchar(191)   | multipass_identifier |
|tax_exempt       |   varchar(191)   | tax_exempt |
|tags      |   varchar(191)   | tags |
|last_order_name       |   varchar(191)   | last_order_name |
|currency       |   varchar(191)   | currency |
|phone       |   varchar(191)   | phone |
|addresses       |   varchar(191)   | addresses |
|accepts_markeing     |   varchar(191)   | accepts_marketing |
|accepts_marketing_updated_at       |   varchar(191)   | accepts_marketing_updated_at |
|marketing_opt_in_level       |   varchar(191)   | marketing_opt_in_level |
|tax_exemptions      |   varchar(191)   | tax_exemptions |
|email_marketing_consent       |   varchar(191)   | email_marketing_consent |
|sms_marketing_consent       |   varchar(191)   | sms_marketing_consent |
|admin_graphql_api_id       |   varchar(191)   | admin_graphql_api_id |
|default_address       |   varchar(191)   | default_address |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## Shopify address
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## Shopify connection products
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## Shopify custom collection products
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|shopify_store_id        |   varchar(191)   | shopify_store_id |
|collection_id        |   varchar(191)   | collection_id |
|product_id        |   varchar(191)   | product_id |
|position        |   varchar(191)   | position |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## Shopify custom collections
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|shopify_store_id        |   varchar(191)   | shopify_store_id |
|collection_id        |   varchar(191)   | collection_id |
|title        |   varchar(191)   | title |
|handle        |   varchar(191)   | handle |
|body_html        |   varchar(191)   | body_html |
|sprt_order        |   varchar(191)   | sprt_order |
|published_scope        |   varchar(191)   | published_scope |
|template_suffix        |   varchar(191)   | template_suffix |
|admin_graphql_api_id        |   varchar(191)   | admin_graphql_api_id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

# Locales
## locales
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| code        |   varchar(191)   | code |
| name        |   varchar(191)   | name |
| direction        |   varchar(191)   | direction |
|logo_path        |   varchar(191)   | logo_path |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

# Admin

## Admins
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| name        |   varchar(191)   | name |
|email        |   varchar(191)   | email |
|password        |   varchar(191)   | password |
|api_token        |   varchar(191)   | api_token |
|status        |   varchar(191)   | status |
|role_id        |   varchar(191)   | role_id |
|image        |   varchar(191)   | image |
|remember_token        |   varchar(191)   | remember_token |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

## Admin Operation Log
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|user_id        |   varchar(191)   | user_id |
|path        |   varchar(191)   | path |
|method        |   varchar(191)   | method |
|ip        |   varchar(191)   | ip |
|input        |   varchar(191)   | input |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

## Admin Password Resets
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| email        |   varchar(191)   | email |
|token        |   varchar(191)   | token |
| created_at |  timestamp   | create time |


# Core Config
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|code        |   varchar(191)   | code |
|value        |   varchar(191)   | value |
|channel_code        |   varchar(191)   | channel_code |
|locale_code        |   varchar(191)   | locale_code |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |