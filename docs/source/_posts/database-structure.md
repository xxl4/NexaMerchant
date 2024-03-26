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

# Cart

# Invoices

# Marketing

# Report

# Rule

# Shopify
