---
title: Shopify API
tags:
  - Shopify
  - Api
categories:
  - Document
  - Api
date: 2024-05-17 09:43:12
description: Shopify API
lang: en
---
> Shopify Api


```
GET /shopify/v1/api/images/{product_id}
```
> get images use shopify product_id
```
{
  "data": {
    "images": [
      {
        "id": 44857594151194,
        "product_id": 9038970290458,
        "position": 1,
        "created_at": "2024-03-18T17:57:35+08:00",
        "updated_at": "2024-03-18T18:02:41+08:00",
        "alt": null,
        "width": 1000,
        "height": 1000,
        "src": "https://cdn.shopify.com/s/files/1/0838/9577/9610/products/3910dc8f49d55c83a089e81b8cb1c840.jpg?v=1710755855",
        "variant_ids": [],
        "admin_graphql_api_id": "gid://shopify/ProductImage/44857594151194"
      },
      {
        "id": 44857594315034,
        "product_id": 9038970290458,
        "position": 2,
        "created_at": "2024-03-18T17:57:35+08:00",
        "updated_at": "2024-03-18T18:02:41+08:00",
        "alt": null,
        "width": 800,
        "height": 800,
        "src": "https://cdn.shopify.com/s/files/1/0838/9577/9610/products/1_b038c8b8-35d7-4281-b573-4be8513d9d52.jpg?v=1710755855",
        "variant_ids": [],
        "admin_graphql_api_id": "gid://shopify/ProductImage/44857594315034"
      },
      {
        "id": 44857594380570,
        "product_id": 9038970290458,
        "position": 3,
        "created_at": "2024-03-18T17:57:35+08:00",
        "updated_at": "2024-03-18T18:02:41+08:00",
        "alt": null,
        "width": 800,
        "height": 800,
        "src": "https://cdn.shopify.com/s/files/1/0838/9577/9610/products/2_67947d05-de1e-4add-b827-9d18884dfd43.jpg?v=1710755855",
        "variant_ids": [],
        "admin_graphql_api_id": "gid://shopify/ProductImage/44857594380570"
      },
      {
        "id": 44857594478874,
        "product_id": 9038970290458,
        "position": 4,
        "created_at": "2024-03-18T17:57:35+08:00",
        "updated_at": "2024-03-18T18:02:41+08:00",
        "alt": null,
        "width": 800,
        "height": 800,
        "src": "https://cdn.shopify.com/s/files/1/0838/9577/9610/products/3_f6ddb8c1-3de4-4e84-af73-a8ca378fdc17.jpg?v=1710755855",
        "variant_ids": [],
        "admin_graphql_api_id": "gid://shopify/ProductImage/44857594478874"
      },
      {
        "id": 44857594544410,
        "product_id": 9038970290458,
        "position": 5,
        "created_at": "2024-03-18T17:57:35+08:00",
        "updated_at": "2024-03-18T18:02:41+08:00",
        "alt": null,
        "width": 800,
        "height": 800,
        "src": "https://cdn.shopify.com/s/files/1/0838/9577/9610/products/1_942cabd4-d5bf-4a38-b391-4e11e6836844.jpg?v=1710755855",
        "variant_ids": [],
        "admin_graphql_api_id": "gid://shopify/ProductImage/44857594544410"
      },
      {
        "id": 45321360965914,
        "product_id": 9038970290458,
        "position": 6,
        "created_at": "2024-04-16T10:42:38+08:00",
        "updated_at": "2024-04-16T10:42:40+08:00",
        "alt": null,
        "width": 800,
        "height": 800,
        "src": "https://cdn.shopify.com/s/files/1/0838/9577/9610/files/Hatme_3bff4976-b737-4827-9048-e5a4cf13f416.jpg?v=1713235360",
        "variant_ids": [48092816310554, 48092816343322, 48092816376090, 48092816408858],
        "admin_graphql_api_id": "gid://shopify/ProductImage/45321360965914"
      },
      {
        "id": 45321360933146,
        "product_id": 9038970290458,
        "position": 7,
        "created_at": "2024-04-16T10:42:38+08:00",
        "updated_at": "2024-04-16T10:42:39+08:00",
        "alt": null,
        "width": 800,
        "height": 800,
        "src": "https://cdn.shopify.com/s/files/1/0838/9577/9610/files/Hatme_1e98f9fe-6007-43a3-80ec-7f480e8cdb67.jpg?v=1713235359",
        "variant_ids": [48092816605466, 48092816638234, 48092816671002, 48092816703770],
        "admin_graphql_api_id": "gid://shopify/ProductImage/45321360933146"
      },
      {
        "id": 45321360900378,
        "product_id": 9038970290458,
        "position": 8,
        "created_at": "2024-04-16T10:42:38+08:00",
        "updated_at": "2024-04-16T10:42:39+08:00",
        "alt": null,
        "width": 800,
        "height": 800,
        "src": "https://cdn.shopify.com/s/files/1/0838/9577/9610/files/Hatme_958b2878-3d78-4360-8650-b6d85fd4e3d4.jpg?v=1713235359",
        "variant_ids": [48092816441626, 48092816507162, 48092816539930, 48092816572698],
        "admin_graphql_api_id": "gid://shopify/ProductImage/45321360900378"
      }
    ]
  },
  "code": 200,
  "message": "success"
}
```