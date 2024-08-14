---
title: How to Init DB
tags:
  - MySQL
  - SQL
categories:
  - MySQL
date: 2024-05-01 09:43:12
description: How to Init DB
lang: en
---

> When you should create a new website for new business, you should copy old data to new website, but you should init the database.



```
SET FOREIGN_KEY_CHECKS = 0; 
truncate table ba_cart;
truncate table ba_addresses;
truncate table ba_orders;
truncate table ba_cart_items;
truncate table ba_order_items;
truncate table ba_cart_payment;
truncate table ba_cart_shipping_rates;
truncate table ba_invoices;
truncate table ba_invoice_items;
truncate table ba_notifications;
truncate table ba_order_transactions;
truncate table ba_order_payment;
truncate table ba_shipments;
truncate table ba_shipment_items;
truncate table ba_visits;
truncate table ba_refunds;
truncate table ba_refund_items;
truncate table ba_lps;
truncate table ba_shopify_orders;
truncate table ba_shopify_products;
SET FOREIGN_KEY_CHECKS = 1;
```