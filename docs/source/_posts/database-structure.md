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
|locale       |   varchar(191)   | locale |
|channel     |   varchar(191)   | channel |
|text_value     |   varchar(191)   | text_value |
|boolean_value     |   tinyint(1)   | boolean_value |
|integer_value     |   int(10)   | integer_value |
|float_value     |   float   | float_value |
|datetime_value     |   datetime   | datetime_value |
|date_value     |   date   | date_value |
|json_value     |   json   | json_value |
|product_id     |   int(10)   | product_id |
|attribute_id     |   int(10)   | attribute_id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_bundle_options
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|product_id        |   int(10)   | product_id |
|type        |   varchar(191)   | type |
|is_required        |   tinyint(1)   | is_required |
|sort_order        |   int(10)   | sort_order |
## product_bundle_option_products
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|product_id        |   int(10)   | product_id |
|product_bundle_option_id        |   int(10)   | product_bundle_option_id |
|qty       |   int(10)   | qty |
|is_user_defined        |   tinyint(1)   | is_user_defined |
|is_default        |   tinyint(1)   | is_default |
|sort_order        |   int(10)   | sort_order |
## product_bundle_option_translations
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|locale        |   varchar(191)   | locale |
|label        |   varchar(191)   | label |
|product_bundle_option_id        |   int(10)   | product_bundle_option_id |
## product_categories
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| product_id        |   int(10)   | product_id |
|category_id        |   int(10)   | category_id |
## product_cross_sells
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| parent_id        |   int(10)   | parent_id |
| child_id        |   int(10)   | child_id |
## product_customer_group_prices
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|qty         |   int(10)   | qty |
|value_type         |   varchar(191)   | value_type |
|value         |   decimal(12,4)   | value |
|product_id         |   int(10)   | product_id |
|customer_group_id         |   int(10)   | customer_group_id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_downloadable_links
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|product_id       |   int(10)   | product_id |
|url       |   varchar(191)   | url |
|file       |   varchar(191)   | file |
|file_name       |   varchar(191)   | file_name |
|type       |   varchar(191)   | type |
|price      |   decimal(12,4)   | price |
|sample_url       |   varchar(191)   | sample_url |
|sample_file_name       |   varchar(191)   | sample_file_name |
|sample_type       |   varchar(191)   | sample_type |
|downloads       |   int(10)   | downloads |
|sort_order       |   int(10)   | sort_order |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_downloadable_link_translations
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|product_downloadable_link_id       |   int(10)   | product_downloadable_link_id |
|locale       |   varchar(191)   | locale |
|title       |   varchar(191)   | title |
## product_downloadable_samples
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|product_id       |   int(10)   | product_id |
| url       |   varchar(191)   | url |
|file       |   varchar(191)   | file |
|file_name       |   varchar(191)   | file_name |
|type       |   varchar(191)   | type |
|sort_order       |   int(10)   | sort_order |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_downloadable_samples_translations
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|product_downloadable_sample_id       |   int(10)   | product_downloadable_sample_id |
|locale       |   varchar(191)   | locale |
|title       |   varchar(191)   | title |
## product_flat
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| sku           |   varchar(191)   | sku |
| type    |  varchar(191)   | prduct type |
| product_number       |   int(10)   | product_number |
|name       |   varchar(191)   | name |
|short_description       |   varchar(191)   | short_description |
|description       |   varchar(191)   | description |
|url_key       |   varchar(191)   | url_key |
|new       |   tinyint(1)   | new |
|featured       |   tinyint(1)   | featured |
|status       |   tinyint(1)   | status |
|meta_title       |   varchar(191)   | meta_title |
|meta_keywords       |   varchar(191)   | meta_keywords |
|meta_description       |   varchar(191)   | meta_description |
|price       |   decimal(12,4)   | price |
|special_price       |   decimal(12,4)   | special_price |
|special_price_from       |   datetime   | special_price_from |
|special_price_to       |   datetime   | special_price_to |
|weight       |   decimal(12,4)   | weight |
|locale      |   varchar(191)   | locale |
|channel       |   varchar(191)   | channel |
|attribute_family_id       |   int(10)   | attribute_family_id |
|product_id       |   int(10)   | product_id |
|parent_id       |   int(10)   | parent_id |
|visible_individually       |   tinyint(1)   | visible_individually |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_grouped_products
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|product_id        |   int(10)   | product_id |
|associated_product_id        |   int(10)   | associated_product_id |
|qty        |   int(10)   | qty |
|sort_order       |   int(10)   | sort_order |
## product_images
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|type       |   varchar(191)   | type |
|path       |   varchar(191)   | path |
|product_id        |   int(10)   | product_id |
|position       |   int(10)   | position |
## product_inventories
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|qty         |   int(10)   | qty |
|product_id        |   int(10)   | product_id |
|vendor_id        |   int(10)   | vendor_id |
|inventory_source_id        |   int(10)   | inventory_source_id |
## product_inventory_indices
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|qty         |   int(10)   | qty |
|product_id        |   int(10)   | product_id |
|channel_id        |   int(10)   | channel_id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_ordered_inventories
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|qty         |   int(10)   | qty |
|product_id        |   int(10)   | product_id |
|channel_id        |   int(10)   | channel_id |
## product_price_indices
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|product_id        |   int(10)   | product_id |
|customer_group_id        |   int(10)   | customer_group_id |
|min_price        |   decimal(12,4)   | min_price |
|regular_min_price        |   decimal(12,4)   | regular_price |
|max_price        |   decimal(12,4)   | max_price |
|regular_max_price        |   decimal(12,4)   | regular_max_price |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_relations
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| parent_id        |   int(10)   | parent_id |
| child_id        |   int(10)   | child_id |
## product_reviews
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|name        |   varchar(191)   | name |
|title        |   varchar(191)   | title |
|rating        |   int(10)   | rating |
|comment        |   varchar(191)   | comment |
|status        |   varchar(191)   | status |
|product_id        |   int(10)   | product_id |
|customer_id        |   int(10)   | customer_id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## product_review_attachments
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|review_id        |   int(10)   | review_id |
|type        |   varchar(191)   | type |
|mime_type        |   varchar(191)   | mime_type |
|path        |   varchar(191)   | path |
## product_super_attributes
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| product_id        |   int(10)   | product_id |
|attribute_id        |   int(10)   | attribute_id |
## product_up_sells
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| parent_id        |   int(10)   | parent_id |
|child_id        |   int(10)   | child_id |
## product_videos
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|product_id        |   int(10)   | product_id |
|type        |   varchar(191)   | type |
|path        |   varchar(191)   | path |
|position        |   int(10)   | position |

# Order
## orders
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| increment_id        |   int(10)   | increment id |
| status        |   varchar(191)   | status ['pending','processing','closed','completed','canceled'] |
| channel_name        |   varchar(191)   | channel_name |
| is_guest        |   tinyint(1)   | is_guest |
|customer_email        |   varchar(191)   | customer_email |
|customer_first_name        |   varchar(191)   | customer_first_name |
|customer_last_name        |   varchar(191)   | customer_last_name |
|shipping_method        |   varchar(191)   | shipping_method |
|shipping_title        |   varchar(191)   | shipping_title |
|shipping_description        |   varchar(191)   | shipping_description |
|coupon_code        |   varchar(191)   | coupon_code |
|is_gift        |   tinyint(1)   | is_gift |
|total_item_count        |   int(10)   | total_item_count |
|total_qty_ordered        |   int(10)   | total_qty_ordered |
|base_currency_code        |   varchar(191)   | base_currency_code |
|channel_currency_code        |   varchar(191)   | channel_currency_code |
|order_currency_code        |   varchar(191)   | order_currency_code |
|grand_total        |   decimal(12,4)   | grand_total |
|base_grand_total        |   decimal(12,4)   | base_grand_total |
|grand_total_invoiced        |   decimal(12,4)   | grand_total_invoiced |
|base_grand_total_invoiced        |   decimal(12,4)   | base_grand_total_invoiced |
|grand_total_refunded        |   decimal(12,4)   | grand_total_refunded |
|base_grand_total_refunded        |   decimal(12,4)   | base_grand_total_refunded |
|sub_total        |   decimal(12,4)   | sub_total |
|base_sub_total        |   decimal(12,4)   | base_sub_total |
|sub_total_invoiced        |   decimal(12,4)   | sub_total_invoiced |
|base_sub_total_invoiced        |   decimal(12,4)   | base_sub_total_invoiced |
|sub_total_refunded        |   decimal(12,4)   | sub_total_refunded |
|base_sub_total_refunded        |   decimal(12,4)   | base_sub_total_refunded |
|discount_percent        |   decimal(12,4)   | discount_percent |
|discount_amount        |   decimal(12,4)   | discount_amount |
|base_discount_amount        |   decimal(12,4)   | base_discount_amount |
|discount_invoiced        |   decimal(12,4)   | discount_invoiced |
|base_discount_invoiced        |   decimal(12,4)   | base_discount_invoiced |
|discount_refunded        |   decimal(12,4)   | discount_refunded |
|base_discount_refunded        |   decimal(12,4)   | base_discount_refunded |
|tax_amount        |   decimal(12,4)   | tax_amount |
|base_tax_amount        |   decimal(12,4)   | base_tax_amount |
|tax_amount_invoiced        |   decimal(12,4)   | tax_amount_invoiced |
|base_tax_amount_invoiced        |   decimal(12,4)   | base_tax_amount_invoiced |
|tax_amount_refunded        |   decimal(12,4)   | tax_amount_refunded |
|base_tax_amount_refunded        |   decimal(12,4)   | base_tax_amount_refunded |
|shipping_amount        |   decimal(12,4)   | shipping_amount |
|base_shipping_amount        |   decimal(12,4)   | base_shipping_amount |
|shipping_invoiced        |   decimal(12,4)   | shipping_invoiced |
|base_shipping_invoiced        |   decimal(12,4)   | base_shipping_invoiced |
|shipping_refunded        |   decimal(12,4)   | shipping_refunded |
|base_shipping_refunded        |   decimal(12,4)   | base_shipping_refunded |
|shipping_discount_amount        |   decimal(12,4)   | shipping_discount_amount |
|base_shipping_discount_amount        |   decimal(12,4)   | base_shipping_discount_amount |
|customer_id        |   int(10)   | customer_id |
|customer_type        |   varchar(191)   | customer_type |
|channel_id        |   int(10)   | channel_id |
|channel_type        |   varchar(191)   | channel_type |
|cart_id        |   int(10)   | cart_id |
|applied_cart_rule_ids        |   varchar(191)    | applied_cart_rule_ids |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## order_comments
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|order_id        |   int(10)   | id |
|comment        |   varchar(191)   | comment |
|customer_notified       |   tinyint(1)   | customer_notified |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## order_items
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|order_id        |   int(10)   | id |
|sku        |   varchar(191)   | sku |
|type        |   varchar(191)   | type |
|name        |   varchar(191)   | name |
|coupon_code        |   varchar(191)   | coupon_code |
|weight        |   decimal(12,4)   | weight |
|total_weight        |   decimal(12,4)   | weight |
|qty_ordered        |   int(10)   | qty_ordered |
|qty_shipped        |   int(10)   | qty_shipped |
|qty_invoiced        |   int(10)   | qty_invoiced |
|qty_canceled        |   int(10)   | qty_canceled |
|qty_refunded        |   int(10)   | qty_refunded |
|price        |   decimal(12,4)   | price |
|base_price        |   decimal(12,4)   | base_price |
|total        |   decimal(12,4)   | total |
|base_total        |   decimal(12,4)   | base_total |
|total_invoiced        |   decimal(12,4)   | total_invoiced |
|base_total_invoiced        |   decimal(12,4)   | base_total_invoiced |
|amount_refunded        |   decimal(12,4)   | amount_refunded |
|base_amount_refunded        |   decimal(12,4)   | base_amount_refunded |
|discount_percent        |   decimal(12,4)   | discount_percent |
|discount_amount        |   decimal(12,4)   | discount_amount |
|base_discount_amount        |   decimal(12,4)   | base_discount_amount |
|discount_invoiced        |   decimal(12,4)   | discount_invoiced |
|base_discount_invoiced        |   decimal(12,4)   | base_discount_invoiced |
|discount_refunded        |   decimal(12,4)   | discount_refunded |
|base_discount_refunded        |   decimal(12,4)   | base_discount_refunded |
|tax_percent        |   decimal(12,4)   | tax_percent |
|tax_amount        |   decimal(12,4)   | tax_amount |
|base_tax_amount        |   decimal(12,4)   | base_tax_amount |
|tax_amount_invoiced        |   decimal(12,4)   | tax_amount_invoiced |
|base_tax_amount_invoiced        |   decimal(12,4)   | base_tax_amount_invoiced |
|tax_amount_refunded        |   decimal(12,4)   | tax_amount_refunded |
|base_tax_amount_refunded        |   decimal(12,4)   | base_tax_amount_refunded |
|product_id        |   int(10)   | product_id |
|product_type        |   varchar(191)   | product_type |
|order_id        |   int(10)   | order_id |
|tax_category_id        |   int(10)   | tax_category_id |
|parent_id        |   int(10)   | parent_id |
|additional       |   json   | additional |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## order_payment
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|order_id        |   int(10)   | order_id |
|method        |   varchar(191)   | method |
|method_title        |   varchar(191)   | method_title |
|additional       |   json   | additional |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## order_transactions
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| transaction_id        |   varchar   | transaction id |
| status        |   varchar   | status  |
| type        |   varchar   | amount |
| amount        |   decimal(12,4)   |  |
| payment_method        |  varchar   | payment_method  |
| data        |  json   | data |
| invoice_id        |  int   | invoice_id |
| order_id        |  int   | order_id |
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
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|customer_email        |   varchar(191)   | customer email |
|customer_first_name        |   varchar(191)   | customer first name |
|customer_last_name        |   varchar(191)   | customer last name |
|shipping_method        |   varchar(191)   | shipping method |
|coupon_code        |   varchar(191)   | coupon code |
|is_gift        |   tinyint(1)   | is gift |
|items_count        |   int(10)   | items count |
|items_qty        |   decimal(12,4)   | items qty |
|exchange_rate        |   decimal(12,4)   | exchange rate |
|global_currency_code        |   varchar(191)   | global currency code |
|base_currency_code        |   varchar(191)   | base currency code |
|channel_currency_code        |   varchar(191)   | channel currency code |
|cart_currency_code        |   varchar(191)   | cart currency code |
|grand_total        |   decimal(12,4)   | grand total |
|base_grand_total        |   decimal(12,4)   | base grand total |
|sub_total        |   decimal(12,4)   | sub total |
|base_sub_total        |   decimal(12,4)   | base sub total |
|tax_total        |   decimal(12,4)   | tax total |
|base_tax_total        |   decimal(12,4)   | base tax total |
|discount_amount        |   decimal(12,4)   | discount amount |
|base_discount_amount        |   decimal(12,4)   | base discount amount |
|checkout_method        |   varchar(191)   | checkout method |
|is_guest        |   tinyint(1)   | is guest |
|is_active        |   tinyint(1)   | is active |
|applied_cart_rule_ids        |   varchar(191)   | applied cart rule ids |
|customer_id        |   int(10)   | customer id |
|channel_id        |   int(10)   | channel id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## cart_items
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|quantity        |   int(10)   | quantity |
|sku        |   varchar(191)   | sku |
|type        |   varchar(191)   | type |
|name        |   varchar(191)   | name |
|coupon_code        |   varchar(191)   | coupon code |
|weight        |   decimal(12,4)   | weight |
|total_weight        |   decimal(12,4)   | total weight |
|base_total_weight        |   decimal(12,4)   | base total weight |
|price        |   decimal(12,4)   | price |
|base_price        |   decimal(12,4)   | base price |
|custom_price        |   decimal(12,4)   | custom price |
|total        |   decimal(12,4)   | total |
|base_total        |   decimal(12,4)   | base total |
|tax_percent        |   decimal(12,4)   | tax percent |
|tax_amount        |   decimal(12,4)   | tax amount |
|base_tax_amount        |   decimal(12,4)   | base tax amount |
|discount_percent        |   decimal(12,4)   | discount percent |
|discount_amount        |   decimal(12,4)   | discount amount |
|base_discount_amount        |   decimal(12,4)   | base discount amount |
|parent_id        |   int(10)   | parent id |
|product_id        |   int(10)   | product id |
|cart_id        |   int(10)   | cart id |
|tax_category_id        |   int(10)   | tax category id |
|applied_cart_rule_ids        |   varchar(191)   | applied cart rule ids |
|additional        |   json   | additional |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## cart_item_inventories
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|qty        |   int(10)   | qty |
|inventory_source_id        |   int(10)   | inventory source id |
|cart_item_id        |   int(10)   | cart item id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## cart_payment
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|method        |   varchar(191)   | method |
|method_title        |   varchar(191)   | method title |
|cart_id        |   int(10)   | cart id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## cart_shipping_rates
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|carrier        |   varchar(191)   | carrier |
|carrier_title        |   varchar(191)   | carrier title |
|method        |   varchar(191)   | method |
|method_title        |   varchar(191)   | method title |
|method_description        |   varchar(191)   | method description |
|price        |   decimal(12,4)   | price |
|base_price        |   decimal(12,4)   | base price |
|discount        |   decimal(12,4)   | discount |
|base_discount        |   decimal(12,4)   | base discount |
|is_calculate_tax        |   tinyint(1)   | is calculate tax |
|cart_address_id        |   int(10)   | cart address id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

# Invoices
## invoices
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| increment_id        |   varchar(191)   | increment ID |
| state        |   varchar(191)   | state |
| email_sent        |   tinyint(1)   | email sent |
| total_qty        |   int(10)   | total qty |
|base_currency_code       |   varchar(191)   | base currency code |
|channel_currency_code       |   varchar(191)   | channel currency code |
|order_currency_code       |   varchar(191)   | order currency code |
|sub_total        |   decimal(12,4)   | sub total |
|base_sub_total        |   decimal(12,4)   | base sub total |
|grand_total        |   decimal(12,4)   | grand total |
|base_grand_total        |   decimal(12,4)   | base grand total |
|shipping_amount        |   decimal(12,4)   | shipping amount |
|base_shipping_amount        |   decimal(12,4)   | base shipping amount |
|tax_amount        |   decimal(12,4)   | tax amount |
|base_tax_amount        |   decimal(12,4)   | base tax amount |
|discount_amount        |   decimal(12,4)   | discount amount |
|base_discount_amount        |   decimal(12,4)   | base discount amount |
|order_id        |   int(10)   | order id |
|transaction_id        |   varchar(191)   | transaction id |
|reminders        |   tinyint(1)   | reminders |
|next_reminder_at        |   timestamp   | next reminder at |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## invoice_items
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| parent_id        |   int(10)   | parent id |
| name        |   varchar(191)   | name |
|description        |   varchar(191)   | description |
|sku        |   varchar(191)   | sku |
|qty        |   int(10)   | qty |
|price        |   decimal(12,4)   | price |
|base_price        |   decimal(12,4)   | base price |
|total        |   decimal(12,4)   | total |
|base_total        |   decimal(12,4)   | base total |
|tax_amount        |   decimal(12,4)   | tax amount |
|base_tax_amount        |   decimal(12,4)   | base tax amount |
|discount_amount        |   decimal(12,4)   | discount amount |
|discount_percent        |   decimal(12,4)   | discount percent |
|base_discount_amount        |   decimal(12,4)   | base discount amount |
|product_id        |   int(10)   | product id |
|product_type        |   varchar(191)   | product type |
|order_item_id        |   int(10)   | order item id |
|invoice_id        |   int(10)   | invoice id |
|additional        |   varchar(191)   | additional |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## inventory_sources
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|code        |   varchar(191)   | code |
|name        |   varchar(191)   | name |
|description        |   varchar(191)   | description |
|contact_name        |   varchar(191)   | contact_name |
|contact_email        |   varchar(191)   | contact_email |
|contact_number        |   varchar(191)   | contact_number |
|contact_fax        |   varchar(191)   | contact_fax |
|country        |   varchar(191)   | country |
|state        |   varchar(191)   | state |
|city        |   varchar(191)   | city |
|street        |   varchar(191)   | street |
|postcode        |   varchar(191)   | postcode |
|priority        |   int(10)   | priority |
|latitude        |   varchar(191)   | latitude |
|longitude        |   varchar(191)   | longitude |
|status        |   tinyint(1)   | status |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
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
|channel_id        |   int(10)   | channel_id |
|inventory_source_id        |   int(10)   | inventory_source_id |
# CMS
## cms_pages
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|layout        |   varchar(191)   | layout |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## cms_page_translations
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|page_title        |   varchar(191)   | page_title |
|url_key        |   varchar(191)   | url_key |
|html_content        |   text   | html_content |
|meta_title        |   varchar(191)   | meta_title |
|meta_description        |   varchar(191)   | meta_description |
|meta_keywords        |   varchar(191)   | meta_keywords |
|locale        |   varchar(191)   | locale |
|cms_page_id        |   int(10)   | cms_page_id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## cms_page_channels
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| cms_page_id        |   int(10)   | cms_page_id |
|channel_id        |   int(10)   | channel_id |
# Category
## categories
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|position        |   int(10)   | position |
|logo_path        |   varchar(191)   | logo_path |
|status        |   tinyint(1)   | status |
|display_mode        |   varchar(191)   | display_mode |
|_lft        |   int(10)   | _lft |
|_rgt        |   int(10)   | _rgt |
|parent_id        |   int(10)   | parent_id |
|additional        |   varchar(191)   | additional |
|banner_path        |   varchar(191)   | banner_path |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## category_filterable_attributes
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| category_id        |   int(10)   | category_id |
|attribute_id        |   int(10)   | attribute_id |
## category_translations
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|category_id        |   int(10)   | category_id |
|name        |   varchar(191)   | name |
|slug        |   varchar(191)   | slug |
|url_path        |   varchar(191)   | url_path |
|description        |   varchar(191)   | description |
|meta_title        |   varchar(191)   | meta_title |
|meta_description        |   varchar(191)   | meta_description |
|meta_keywords        |   varchar(191)   | meta_keywords |
|locale_id       |   int(10)   | locale_id |
|locale        |   varchar(191)   | locale |

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
## Countries
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|code        |   varchar(191)   | code |
|name        |   varchar(191)   | name |
## country_states
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|country_id        |   int(10)   | country_id |
|country_code        |   varchar(191)   | country_code |
|code        |   varchar(191)   | code |
|default_name        |   varchar(191)   | default_name |
## country_states_translations
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|country_state_id        |   int(10)   | country_state_id |
|locale        |   varchar(191)   | locale |
|default_name        |   varchar(191)   | default_name |
## country_translations
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|country_id        |   int(10)   | country_id |
|locale        |   varchar(191)   | locale |
|name        |   varchar(191)   | name |

# Rule
## Cart Rule
### cart_rules
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|name        |   varchar(191)   | name |
|description        |   varchar(191)   | description |
|startstarts_from        |   date   | starts_from |
|ends_till        |   date   | ends_till |
|status        |   tinyint(1)   | status |
|coupon_type        |   varchar(191)   | coupon_type |
|use_auto_generation        |   tinyint(1)   | use_auto_generation |
|usage_per_customer        |   int(10)   | usage_per_customer |
|uses_per_coupon        |   int(10)   | uses_per_coupon |
|times_used        |   int(10)   | times_used |
|condition_type        |   varchar(191)   | condition_type |
|conditions        |   json   | conditions |
|end_other_rules        |   tinyint(1)   | end_other_rules |
|uses_attribute_conditions       |   tinyint(1)    | uses_attribute_conditions |
|action_type        |   varchar(191)   | action_type |
|discount_amount        |   decimal(12,4)   | discount_amount |
|discount_quantity        |   int(10)   | discount_quantity |
|discount_step        |   int(10)   | discount_step |
|apply_to_shipping_amount        |   tinyint(1)   | apply_to_shipping_amount |
|free_shipping        |   tinyint(1)   | free_shipping |
|sort_order        |   int(10)   | sort_order |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
### cart_rule_channels
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| cart_rule_id        |   int(10)   | cart_rule_id |
| channel_id        |   int(10)   | channel_id |
### cart_rule_coupons
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
| code        |   varchar(191)   | code |
| usage_limit        |   int(10)   | usage_limit |
| usage_per_customer       |   int(10)   | usage_per_customer |
|times_used        |   int(10)   | times_used |
|type        |   int(10)    | type |
|is_primary        |   tinyint(1)   | is_primary |
|expired_at        |   date   | expired_at |
|cart_rule_id        |   int(10)   | cart_rule_id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
### cart_rule_coupon_usage
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|times_used        |   int(10)   | times_used |
|cart_rule_coupon_id        |   int(10)   | cart_rule_coupon_id |
|customer_id        |   int(10)   | customer_id |
### cart_rule_customers
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|times_used        |   int(10)   | times_used |
|customer_id        |   int(10)   | customer_id |
|cart_rule_id        |   int(10)   | cart_rule_id |
### cart_rule_customer_groups
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| cart_rule_id        |   int(10)   | cart_rule_id |
| customer_group_id        |   int(10)   | customer_group_id |
### cart_rule_translations
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|locale        |   varchar(191)   | locale |
|label        |   varchar(191)   | label |
|cart_rule_id        |   int(10)   | cart_rule_id |

## Catelog Rule
### catalog_rules
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|name        |   varchar(191)   | name |
|description        |   varchar(191)   | description |
|starts_from        |   date   | starts_from |
|ends_till        |   date   | ends_till |
|status        |   tinyint(1)   | status |
|condition_type        |   varchar(191)   | condition_type |
|conditions        |   json   | conditions |
|end_other_rules        |   tinyint(1)   | end_other_rules |
|action_type        |   varchar(191)   | action_type |
|discount_amount        |   decimal(12,4)   | discount_amount |
|sort_order        |   int(10)   | sort_order |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
### catalog_rule_channels
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| catalog_rule_id        |   int(10)   | catalog_rule_id |
| channel_id        |   int(10)   | channel_id |
### catalog_rule_customer_groups
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| catalog_rule_id        |   int(10)   | catalog_rule_id |
| customer_group_id        |   int(10)   | customer_group_id |
### catalog_rule_products
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|starts_from        |   date   | starts_from |
|ends_till        |   date   | ends_till |
|end_other_rules        |   tinyint(1)   | end_other_rules |
|action_type        |   varchar(191)   | action_type |
|discount_amount        |   decimal(12,4)   | discount_amount |
|sort_order        |   int(10)   | sort_order |
|product_id        |   int(10)   | product_id |
|customer_group_id        |   int(10)   | customer_group_id |
|catalog_rule_id        |   int(10)   | catalog_rule_id |
|channel_id        |   int(10)   | channel_id |
### catalog_rule_product_prices
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|price        |   decimal(12,4)   | price |
|rule_date        |   date   | rule_date |
|starts_from        |   date   | starts_from |
|ends_till        |   date   | ends_till |
|product_id        |   int(10)   | product_id |
|customer_group_id        |   int(10)   | customer_group_id |
|catalog_rule_id        |   int(10)   | catalog_rule_id |
|channel_id        |   int(10)   | channel_id |

# Tax
## tax_categories
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|code        |   varchar(191)   | code |
|name        |   varchar(191)   | name |
|description        |   varchar(191)   | description |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## tax_categories_tax_rates
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|tax_category_id        |   int(10)   | tax_category_id |
|tax_rate_id        |   int(10)   | tax_rate_id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## tax_rates
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|identifier        |   varchar(191)   | identifier |
|is_zip        |   tinyint(1)   | is_zip |
|zip_code        |   varchar(191)   | zip_code |
|zip_from        |   varchar(191)   | zip_from |
|zip_to        |   varchar(191)   | zip_to |
|state        |   varchar(191)   | state |
|country        |   varchar(191)   | country |
|tax_rate        |   decimal(12,4)   | tax_rate |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

# Theme
## theme_customizations
## theme_customization_translations

# Wishlist
## wishlist
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|channel_id        |   int(10)   | channel_id |
|product_id        |   int(10)   | product_id |
|customer_id        |   int(10)   | customer_id |
|item_options        |   json   | item_options |
|moved_to_cart        |   tinyint(1)   | moved_to_cart |
|shared        |   tinyint(1)   | shared |
|time_of_moving |  timestamp   | time_of_moving |
|additional        |   json   | additional |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## wishlist_items
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|channel_id        |   int(10)   | channel_id |
|product_id        |   int(10)   | product_id |
|customer_id        |   int(10)   | customer_id |
|additional        |   json   | additional |
|moved_to_cart        |   tinyint(1)   | moved_to_cart |
|shared        |   tinyint(1)   | shared |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
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

# Lps
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   bigint(20)   | id |
|name        |   varchar(191)   | name |
|slug        |   varchar(191)   | slug |
|status        |   tinyint(4)   | status |
|html        |   longtext   | html |
|goto_url        |   varchar(191)   | goto_url |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

# compare_items
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|product_id        |   int(10)   | product_id |
|customer_id        |   int(10)   | customer_id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

# currency
## currencies
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|code        |   varchar(191)   | code |
|name        |   varchar(191)   | name |
|symbol        |   varchar(191)   | symbol |
|decimal        |   tinyint(1)   | decimal |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## currency_exchange_rates
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|rate        |   double   | rate |
|target_currency        |   varchar(191)   | target_currency |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

# downloadable_link_purchased
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|product_name        |   varchar(191)   | product_name |
|name        |   varchar(191)   | name |
|url        |   varchar(191)   | url |
|file        |   varchar(191)   | file |
|file_name        |   varchar(191)   | file_name |
|type        |   varchar(191)   | type |
|download_bought        |   int(10)   | download_bought |
|download_used        |   int(10)   | download_used |
|status        |   tinyint(1)   | status |
|customer_id        |   int(10)   | customer_id |
|order_id        |   int(10)   | order_id |
|order_item_id        |   int(10)   | order_item_id |
|download_canceled        |   int(10)   | download_canceled |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

# notifications
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|type        |   varchar(191)   | type |
|read        |   tinyint(1)   | read |
|order_id        |   int(10)   | order_id |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |

# shipment 
## Shipments
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|status        |   tinyint(4)   | status |
|total_qty        |   int(10)   | total_qty |
|total_weight        |   double   | total_weight |
|carrier_code        |   varchar(191)   | carrier_code |
|carrier_title        |   varchar(191)   | carrier_title |
|track_number        |   varchar(191)   | track_number |
|email_sent        |   tinyint(1)   | email_sent |
|customer_id        |   int(10)   | customer_id |
|customer_type        |   varchar(191)   | customer_type |
|order_id        |   int(10)   | order_id |
|order_address_id        |   int(10)   | order_address_id |
|inventory_source_id        |   int(10)   | inventory_source_id |
|inventory_source_name        |   varchar(191)   | inventory_source_name |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |
## Shipment Items
| Field              | Type | Desc |
| :---------------- | :------: | ----: |
| id        |   int(10)   | id |
|name        |   varchar(191)   | name |
|description        |   varchar(191)   | description |
|sku        |   varchar(191)   | sku |
|qty        |   int(10)   | qty |
|weight        |   double   | weight |
|price        |   double   | price |
|base_price        |   double   | base_price |
|product_id        |   int(10)   | product_id |
|product_type |   varchar(191)   | product_type |
|order_item_id        |   int(10)   | order_item_id |
|shipment_id        |   int(10)   | shipment_id |
|additional        |   text   | additional |
| created_at |  timestamp   | create time |
| updated_at |  timestamp   | update time |