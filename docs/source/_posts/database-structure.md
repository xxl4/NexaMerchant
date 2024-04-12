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
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

# Attributes

## attributes
## attribute_families
## attribute_groups
## attribute_groups_mappings
## attribute_options
## attribute_option_translations
## attribute_translations

# Cart

## cart
## cart_items
## cart_item_inventories
## cart_payment
## cart_shipping_rates

# Invoices

# Marketing

# Report

# Channel

# CMS

# Category

# Customer

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
## tax_categories_tax_rates
## tax_rates

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

# Roles

# Shopify
