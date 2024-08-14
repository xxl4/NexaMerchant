---
title: Comments API
tags:
  - Comments
  - Api
categories:
  - Document
  - Api
date: 2024-05-15 18:43:12
description: Comments API
lang: en
---
```
GET /reviews
```
| Field              | Type | required | Desc |
| :---------------- | :------: | :------:| ----: |
| per_page        |   number  | false | per_page default(10) |
| page        |   number  | false | page default(0) |
| reviewer_id        |   number | false  | reviewer_id |
| product_id           |   number | true   | product_id |
| rating           |   number | false  | rating |

```
{
  "data": {
    "reviews": {
      "264": {
        "id": 278,
        "name": "Lieselotte Thies",
        "title": "Schwarzer BH  - Größe M",
        "rating": 5,
        "comment": "Schönes Material  - angenehmes Tragen!",
        "status": "approved",
        "product_id": 3011,
        "customer_id": 278,
        "created_at": "2024-05-15T09:21:46.000000Z",
        "updated_at": "2024-05-15T09:21:46.000000Z",
        "customer": {
          "id": 278,
          "first_name": "Lieselotte Thies",
          "last_name": "",
          "gender": null,
          "date_of_birth": null,
          "image": null,
          "status": 1,
          "customer_group_id": 2,
          "subscribed_to_news_letter": false,
          "is_verified": 1,
          "is_suspended": 0,
          "token": null,
          "created_at": "2024-05-15T09:21:46.000000Z",
          "updated_at": "2024-05-15T09:21:46.000000Z",
          "image_url": null
        },
        "images": []
      },
      "267": {
        "id": 282,
        "name": "Martina Wiencke",
        "title": "Angenehmes Tragegefühl",
        "rating": 5,
        "comment": "Sehr angenehm zu tragen, hat mich überzeugt.",
        "status": "approved",
        "product_id": 3011,
        "customer_id": 282,
        "created_at": "2024-05-15T09:21:46.000000Z",
        "updated_at": "2024-05-15T09:21:46.000000Z",
        "customer": {
          "id": 282,
          "first_name": "Martina Wiencke",
          "last_name": "",
          "gender": null,
          "date_of_birth": null,
          "image": null,
          "status": 1,
          "customer_group_id": 2,
          "subscribed_to_news_letter": false,
          "is_verified": 1,
          "is_suspended": 0,
          "token": null,
          "created_at": "2024-05-15T09:21:46.000000Z",
          "updated_at": "2024-05-15T09:21:46.000000Z",
          "image_url": null
        },
        "images": []
      },
      "269": {
        "id": 285,
        "name": "Dagmar Behrendt",
        "title": "Befreiung",
        "rating": 5,
        "comment": "Kein Gefühl der Einengung. Sitzt einfach toll.",
        "status": "approved",
        "product_id": 3011,
        "customer_id": 285,
        "created_at": "2024-05-15T09:21:47.000000Z",
        "updated_at": "2024-05-15T09:21:47.000000Z",
        "customer": {
          "id": 285,
          "first_name": "Dagmar Behrendt",
          "last_name": "",
          "gender": null,
          "date_of_birth": null,
          "image": null,
          "status": 1,
          "customer_group_id": 2,
          "subscribed_to_news_letter": false,
          "is_verified": 1,
          "is_suspended": 0,
          "token": null,
          "created_at": "2024-05-15T09:21:47.000000Z",
          "updated_at": "2024-05-15T09:21:47.000000Z",
          "image_url": null
        },
        "images": []
      },
      "281": {
        "id": 298,
        "name": "Barbara Leitsch",
        "title": "Bestellung vom 8.4.24",
        "rating": 5,
        "comment": "Ich habe bis jetzt nichts erhalten!",
        "status": "approved",
        "product_id": 3011,
        "customer_id": 298,
        "created_at": "2024-05-15T09:21:49.000000Z",
        "updated_at": "2024-05-15T09:21:49.000000Z",
        "customer": {
          "id": 298,
          "first_name": "Barbara Leitsch",
          "last_name": "",
          "gender": null,
          "date_of_birth": null,
          "image": null,
          "status": 1,
          "customer_group_id": 2,
          "subscribed_to_news_letter": false,
          "is_verified": 1,
          "is_suspended": 0,
          "token": null,
          "created_at": "2024-05-15T09:21:49.000000Z",
          "updated_at": "2024-05-15T09:21:49.000000Z",
          "image_url": null
        },
        "images": []
      },
      "282": {
        "id": 299,
        "name": "Eicher Karl",
        "title": "schlechte passform geht gar nicht",
        "rating": 5,
        "comment": "gar nichr akzeptabel",
        "status": "approved",
        "product_id": 3011,
        "customer_id": 299,
        "created_at": "2024-05-15T09:21:49.000000Z",
        "updated_at": "2024-05-15T09:21:49.000000Z",
        "customer": {
          "id": 299,
          "first_name": "Eicher Karl",
          "last_name": "",
          "gender": null,
          "date_of_birth": null,
          "image": null,
          "status": 1,
          "customer_group_id": 2,
          "subscribed_to_news_letter": false,
          "is_verified": 1,
          "is_suspended": 0,
          "token": null,
          "created_at": "2024-05-15T09:21:49.000000Z",
          "updated_at": "2024-05-15T09:21:49.000000Z",
          "image_url": null
        },
        "images": []
      },
      "283": {
        "id": 300,
        "name": "Gunther Krebes",
        "title": "1stern ist zuviel, 0 ist ok",
        "rating": 5,
        "comment": "Es ist bis heute nichts angekommen und ich hoffe sie haben dis Einnahmen schon anderweitig erhalten \r\nInvestiert …",
        "status": "approved",
        "product_id": 3011,
        "customer_id": 300,
        "created_at": "2024-05-15T09:21:50.000000Z",
        "updated_at": "2024-05-15T09:21:50.000000Z",
        "customer": {
          "id": 300,
          "first_name": "Gunther Krebes",
          "last_name": "",
          "gender": null,
          "date_of_birth": null,
          "image": null,
          "status": 1,
          "customer_group_id": 2,
          "subscribed_to_news_letter": false,
          "is_verified": 1,
          "is_suspended": 0,
          "token": null,
          "created_at": "2024-05-15T09:21:50.000000Z",
          "updated_at": "2024-05-15T09:21:50.000000Z",
          "image_url": null
        },
        "images": []
      },
      "285": {
        "id": 302,
        "name": "Angelika Lang",
        "title": "Hatme Haltungskorrektur BH",
        "rating": 5,
        "comment": "Sehr gut. Habe mehrere gekauft",
        "status": "approved",
        "product_id": 3011,
        "customer_id": 302,
        "created_at": "2024-05-15T09:21:50.000000Z",
        "updated_at": "2024-05-15T09:21:50.000000Z",
        "customer": {
          "id": 302,
          "first_name": "Angelika Lang",
          "last_name": "",
          "gender": null,
          "date_of_birth": null,
          "image": null,
          "status": 1,
          "customer_group_id": 2,
          "subscribed_to_news_letter": false,
          "is_verified": 1,
          "is_suspended": 0,
          "token": null,
          "created_at": "2024-05-15T09:21:50.000000Z",
          "updated_at": "2024-05-15T09:21:50.000000Z",
          "image_url": null
        },
        "images": []
      },
      "286": {
        "id": 303,
        "name": "Gisela Böhnisch",
        "title": "Gute Qualität",
        "rating": 4,
        "comment": "Leider wurden zwei unterschiedlichen Größen geliefert. Der eine BH passt wunderbar und die Qualität ist ausgezeichnet.",
        "status": "approved",
        "product_id": 3011,
        "customer_id": 303,
        "created_at": "2024-05-15T09:21:50.000000Z",
        "updated_at": "2024-05-15T09:21:50.000000Z",
        "customer": {
          "id": 303,
          "first_name": "Gisela Böhnisch",
          "last_name": "",
          "gender": null,
          "date_of_birth": null,
          "image": null,
          "status": 1,
          "customer_group_id": 2,
          "subscribed_to_news_letter": false,
          "is_verified": 1,
          "is_suspended": 0,
          "token": null,
          "created_at": "2024-05-15T09:21:50.000000Z",
          "updated_at": "2024-05-15T09:21:50.000000Z",
          "image_url": null
        },
        "images": [
          {
            "id": 1,
            "review_id": 303,
            "type": "image",
            "mime_type": "jpeg",
            "path": "review/1/OygHorOm0xlPnfbxdOGp4H775dgcR55TlhwAqnRH.jpg",
            "url": "http://127.0.0.1:8000/storage/review/1/OygHorOm0xlPnfbxdOGp4H775dgcR55TlhwAqnRH.jpg"
          },
          {
            "id": 2,
            "review_id": 303,
            "type": "image",
            "mime_type": "jpeg",
            "path": "storage/product/3011/1715331110__17153310222652409484840428214320__original.jpg",
            "url": "http://127.0.0.1:8000/storage/storage/product/3011/1715331110__17153310222652409484840428214320__original.jpg"
          }
        ]
      },
      "326": {
        "id": 353,
        "name": "Monika Sauer",
        "title": "Gesundheit",
        "rating": 5,
        "comment": "Sehr gut und bequem",
        "status": "approved",
        "product_id": 3011,
        "customer_id": 352,
        "created_at": "2024-05-15T09:21:56.000000Z",
        "updated_at": "2024-05-15T09:21:56.000000Z",
        "customer": {
          "id": 352,
          "first_name": "Monika Sauer",
          "last_name": "",
          "gender": null,
          "date_of_birth": null,
          "image": null,
          "status": 1,
          "customer_group_id": 2,
          "subscribed_to_news_letter": false,
          "is_verified": 1,
          "is_suspended": 0,
          "token": null,
          "created_at": "2024-05-15T09:21:56.000000Z",
          "updated_at": "2024-05-15T09:21:56.000000Z",
          "image_url": null
        },
        "images": []
      },
      "331": {
        "id": 358,
        "name": "Inge Stroschke",
        "title": "BH ohne Bügel",
        "rating": 5,
        "comment": "sitzt prima und sehr bequem",
        "status": "approved",
        "product_id": 3011,
        "customer_id": 357,
        "created_at": "2024-05-15T09:21:56.000000Z",
        "updated_at": "2024-05-15T09:21:56.000000Z",
        "customer": {
          "id": 357,
          "first_name": "Inge Stroschke",
          "last_name": "",
          "gender": null,
          "date_of_birth": null,
          "image": null,
          "status": 1,
          "customer_group_id": 2,
          "subscribed_to_news_letter": false,
          "is_verified": 1,
          "is_suspended": 0,
          "token": null,
          "created_at": "2024-05-15T09:21:56.000000Z",
          "updated_at": "2024-05-15T09:21:56.000000Z",
          "image_url": null
        },
        "images": []
      }
    },
    "ratingValue": "4.7",
    "reviewCount": 45,
    "getReviewsWithRatings": [
      {
        "rating": 5,
        "total": 36
      },
      {
        "rating": 4,
        "total": 8
      },
      {
        "rating": 1,
        "total": 1
      }
    ],
    "getPercentageRating": {
      "5": 80,
      "4": 18,
      "3": 0,
      "2": 0,
      "1": 2
    },
    "getTotalRating": 213,
    "per_page": 10,
    "page": "0",
    "total": 45
  },
  "code": 200,
  "message": "success"
}
```

```
POST /reviews
```

```
PUT /reviews/{id}
```

```
GET /reviews/{id}
```

```
{
  "review": {
    "id": 111,
    "title": "Raw review title. This is not sanitized yet so do not print it out as-is in frontend.",
    "body": "Raw review body. This is not sanitized yet so do not print it out as-is in frontend.",
    "rating": 5,
    "product_external_id": 999999,
    "product_title": "Example product",
    "product_handle": "example-product",
    "reviewer": {
      "id": 111,
      "email": "john@example.com",
      "name": "John Smith",
      "phone": "+123456789",
      "tags": [
        "tag1",
        "tag2",
        "tag3"
      ],
      "accepts_marketing": true,
      "unsubscribed_at": "2020-02-20T20:20:20+00:00",
      "external_id": 999999
    },
    "source": "email",
    "curated": "ok",
    "hidden": false,
    "verified": "buyer",
    "created_at": "2019-08-24T14:15:22Z",
    "updated_at": "2019-08-24T14:15:22Z",
    "ip_address": "string",
    "has_published_pictures": false,
    "has_published_videos": false,
    "pictures": [
      {
        "hidden": true,
        "urls": {
          "small": "string",
          "compact": "string",
          "huge": "string",
          "original": "string"
        }
      }
    ]
  }
}
```