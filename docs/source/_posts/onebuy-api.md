---
title: OneBuy API
tags:
  - OneBuy
  - Api
categories:
  - Document
  - Document
  - Api
date: 2024-05-15 18:43:12
description: OneBuy API
lang: en
---
> Onebuy Api including product detail, create order etc function

# Product Detail
```
GET api/onebuy/product/detail/{slug}?currency=EUR
```
> Get Products Info, return will have product,product images,product sku, product attr etc

## Out Params
```
{
  "product": {
    "id": 3065,
    "sku": "8987102380314",
    "name": "Orthopädische Wanderschuhe",
    "description": "\u003Cp\u003E\u003Cspan data-mce-fragment=\"1\"\u003E✅ ⭐Rückgabe &gt;&gt; 100 % Geld-zurück-Garantie.\u003C/span\u003E\u003Cbr data-mce-fragment=\"1\"\u003E\u003Cspan data-mce-fragment=\"1\"\u003E✅ Versand &gt;&gt; Weltweiter Expressversand verfügbar\u003C/span\u003E\u003Cbr data-mce-fragment=\"1\"\u003E\u003Cspan data-mce-fragment=\"1\"\u003E✅ Bearbeitungszeit &gt;&gt; Versand innerhalb von 1-3 Tagen nach Zahlungseingang\u003C/span\u003E\u003Cbr data-mce-fragment=\"1\"\u003E\u003Cspan data-mce-fragment=\"1\"\u003E✅ 🔥99,2 % der Kunden kaufen 2 Sets und mehr!🔥\u003C/span\u003E\u003Cbr data-mce-fragment=\"1\"\u003E\u003Cspan data-mce-fragment=\"1\"\u003E✅ Kostenloser Versand ab €79.\u003C/span\u003E\u003C/p\u003E\r\n\u003Cp\u003E\u003Cspan data-mce-fragment=\"1\"\u003E\u003Cimg alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0838/9577/9610/files/1709114882632_480x480.png?v=1709114929\"\u003E\u003C/span\u003E\u003C/p\u003E\r\n\u003Cp\u003E\u003Cspan data-mce-fragment=\"1\"\u003E\u003Cimg src=\"https://cdn.shopify.com/s/files/1/0838/9577/9610/files/1709113264239_480x480.png?v=1709113384\" alt=\"\"\u003E\u003C/span\u003E\u003C/p\u003E\r\n\u003Cp\u003E\u003Cspan data-mce-fragment=\"1\"\u003E\u003Cimg src=\"https://cdn.shopify.com/s/files/1/0838/9577/9610/files/1709113325024_480x480.png?v=1709113448\" alt=\"\"\u003E\u003C/span\u003E\u003C/p\u003E\r\n\u003Cp\u003E\u003Cspan data-mce-fragment=\"1\"\u003E\u003Cimg src=\"https://cdn.shopify.com/s/files/1/0838/9577/9610/files/1709113340282_480x480.png?v=1709113464\" alt=\"\"\u003E\u003C/span\u003E\u003C/p\u003E\r\n\u003Cp\u003E\u003Cbr\u003E\u003C/p\u003E",
    "url_key": "8987102380314",
    "base_image": {
      "small_image_url": "https://127.0.0.1:8000/cache/small/product/3065/BY8A7477.webp",
      "medium_image_url": "https://127.0.0.1:8000/cache/medium/product/3065/BY8A7477.webp",
      "large_image_url": "https://127.0.0.1:8000/cache/large/product/3065/BY8A7477.webp",
      "original_image_url": "https://127.0.0.1:8000/cache/original/product/3065/BY8A7477.webp"
    },
    "images": [
      {
        "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
        "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
        "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
        "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
      }
    ],
    "is_new": false,
    "is_featured": false,
    "on_sale": false,
    "is_wishlist": false,
    "min_price": "45,00 €",
    "prices": {
      "regular": {
        "price": 45,
        "formatted_price": "45,00 €"
      }
    },
    "price_html": "\u003Cp class=\"text-[14px] text-[#6E6E6E] price-label\"\u003E\r\n    Ab\u003C/p\u003E\r\n\r\n\u003Cp class=\"font-semibold special-price\"\u003E\r\n    45,00 €\r\n\u003C/p\u003E",
    "avg_ratings": 0
  },
  "package_products": [
    {
      "id": 2,
      "name": "2x  Orthopädische Wanderschuhe",
      "image": "https://127.0.0.1:8000/cache/medium/product/3065/BY8A7477.webp",
      "amount": 2,
      "old_price": 120,
      "old_price_format": "€120",
      "new_price": 72,
      "new_price_format": "€72",
      "tip1": "40% ",
      "tip2": "€36",
      "shipping_fee": "9.99",
      "popup_info": {
        "name": null,
        "old_price": null,
        "new_price": null,
        "img": null
      }
    },
    {
      "id": 1,
      "name": "1x  Orthopädische Wanderschuhe",
      "image": "https://127.0.0.1:8000/cache/medium/product/3065/BY8A7477.webp",
      "amount": 1,
      "old_price": 60,
      "old_price_format": "€60",
      "new_price": 45,
      "new_price_format": "€45",
      "tip1": "25% ",
      "tip2": "€45",
      "shipping_fee": "9.99",
      "popup_info": {
        "name": null,
        "old_price": null,
        "new_price": null,
        "img": null
      }
    },
    {
      "id": 3,
      "name": "3x  Orthopädische Wanderschuhe",
      "image": "https://127.0.0.1:8000/cache/medium/product/3065/BY8A7477.webp",
      "amount": 3,
      "old_price": 180,
      "old_price_format": "€180",
      "new_price": 94.5,
      "new_price_format": "€94.5",
      "tip1": "47% ",
      "tip2": "€31.5",
      "shipping_fee": "9.99",
      "popup_info": {
        "name": null,
        "old_price": null,
        "new_price": null,
        "img": null
      }
    },
    {
      "id": 4,
      "name": "4x  Orthopädische Wanderschuhe",
      "image": "https://127.0.0.1:8000/cache/medium/product/3065/BY8A7477.webp",
      "amount": 4,
      "old_price": 240,
      "old_price_format": "€240",
      "new_price": 108,
      "new_price_format": "€108",
      "tip1": "55% ",
      "tip2": "€27",
      "shipping_fee": "9.99",
      "popup_info": {
        "name": null,
        "old_price": null,
        "new_price": null,
        "img": null
      }
    }
  ],
  "sku": "8987102380314",
  "attr": {
    "attributes": [
      {
        "id": 23,
        "code": "color",
        "label": "Farbe",
        "swatch_type": "dropdown",
        "options": [
          {
            "id": 1424,
            "label": "Khaki",
            "swatch_value": null,
            "products": [3067, 3067, 3075, 3075, 3076, 3076, 3077, 3077, 3078, 3078, 3079, 3079, 3080, 3080]
          },
          {
            "id": 1944,
            "label": "SCHWARZ",
            "swatch_value": null,
            "products": [3066, 3066, 3069, 3069, 3070, 3070, 3071, 3071, 3072, 3072, 3073, 3073, 3074, 3074]
          },
          {
            "id": 1953,
            "label": "Dunkelgrau",
            "swatch_value": null,
            "products": [3068, 3068, 3081, 3081, 3082, 3082, 3083, 3083, 3084, 3084, 3085, 3085, 3086, 3086]
          }
        ],
        "attr_sort": []
      },
      {
        "id": 24,
        "code": "size",
        "label": "Größe",
        "swatch_type": "dropdown",
        "options": [
          {
            "id": 1661,
            "label": "EU 39",
            "swatch_value": null,
            "products": [3066, 3066, 3067, 3067, 3068, 3068]
          },
          {
            "id": 1662,
            "label": "EU 40",
            "swatch_value": null,
            "products": [3069, 3069, 3075, 3075, 3081, 3081]
          },
          {
            "id": 1663,
            "label": "EU 41",
            "swatch_value": null,
            "products": [3070, 3070, 3076, 3076, 3082, 3082]
          },
          {
            "id": 1664,
            "label": "EU 42",
            "swatch_value": null,
            "products": [3071, 3071, 3077, 3077, 3083, 3083]
          },
          {
            "id": 1665,
            "label": "EU 43",
            "swatch_value": null,
            "products": [3072, 3072, 3078, 3078, 3084, 3084]
          },
          {
            "id": 1666,
            "label": "EU 44",
            "swatch_value": null,
            "products": [3073, 3073, 3079, 3079, 3085, 3085]
          },
          {
            "id": 1667,
            "label": "EU 45",
            "swatch_value": null,
            "products": [3074, 3074, 3080, 3080, 3086, 3086]
          }
        ],
        "attr_sort": []
      },
      {
        "id": 23,
        "code": "color",
        "label": "Farbe",
        "swatch_type": "dropdown",
        "options": [
          {
            "id": 1424,
            "label": "Khaki",
            "swatch_value": null,
            "products": [3067, 3067, 3075, 3075, 3076, 3076, 3077, 3077, 3078, 3078, 3079, 3079, 3080, 3080]
          },
          {
            "id": 1944,
            "label": "SCHWARZ",
            "swatch_value": null,
            "products": [3066, 3066, 3069, 3069, 3070, 3070, 3071, 3071, 3072, 3072, 3073, 3073, 3074, 3074]
          },
          {
            "id": 1953,
            "label": "Dunkelgrau",
            "swatch_value": null,
            "products": [3068, 3068, 3081, 3081, 3082, 3082, 3083, 3083, 3084, 3084, 3085, 3085, 3086, 3086]
          }
        ],
        "attr_sort": []
      },
      {
        "id": 24,
        "code": "size",
        "label": "Größe",
        "swatch_type": "dropdown",
        "options": [
          {
            "id": 1661,
            "label": "EU 39",
            "swatch_value": null,
            "products": [3066, 3066, 3067, 3067, 3068, 3068]
          },
          {
            "id": 1662,
            "label": "EU 40",
            "swatch_value": null,
            "products": [3069, 3069, 3075, 3075, 3081, 3081]
          },
          {
            "id": 1663,
            "label": "EU 41",
            "swatch_value": null,
            "products": [3070, 3070, 3076, 3076, 3082, 3082]
          },
          {
            "id": 1664,
            "label": "EU 42",
            "swatch_value": null,
            "products": [3071, 3071, 3077, 3077, 3083, 3083]
          },
          {
            "id": 1665,
            "label": "EU 43",
            "swatch_value": null,
            "products": [3072, 3072, 3078, 3078, 3084, 3084]
          },
          {
            "id": 1666,
            "label": "EU 44",
            "swatch_value": null,
            "products": [3073, 3073, 3079, 3079, 3085, 3085]
          },
          {
            "id": 1667,
            "label": "EU 45",
            "swatch_value": null,
            "products": [3074, 3074, 3080, 3080, 3086, 3086]
          }
        ],
        "attr_sort": []
      }
    ],
    "index": {
      "3066": {
        "23": 1944,
        "24": 1661,
        "sku": "8987102380314-47930439631130"
      },
      "3067": {
        "23": 1424,
        "24": 1661,
        "sku": "8987102380314-47930439860506"
      },
      "3068": {
        "23": 1953,
        "24": 1661,
        "sku": "8987102380314-47930440089882"
      },
      "3069": {
        "23": 1944,
        "24": 1662,
        "sku": "8987102380314-47930439663898"
      },
      "3070": {
        "23": 1944,
        "24": 1663,
        "sku": "8987102380314-47930439696666"
      },
      "3071": {
        "23": 1944,
        "24": 1664,
        "sku": "8987102380314-47930439729434"
      },
      "3072": {
        "23": 1944,
        "24": 1665,
        "sku": "8987102380314-47930439762202"
      },
      "3073": {
        "23": 1944,
        "24": 1666,
        "sku": "8987102380314-47930439794970"
      },
      "3074": {
        "23": 1944,
        "24": 1667,
        "sku": "8987102380314-47930439827738"
      },
      "3075": {
        "23": 1424,
        "24": 1662,
        "sku": "8987102380314-47930439893274"
      },
      "3076": {
        "23": 1424,
        "24": 1663,
        "sku": "8987102380314-47930439926042"
      },
      "3077": {
        "23": 1424,
        "24": 1664,
        "sku": "8987102380314-47930439958810"
      },
      "3078": {
        "23": 1424,
        "24": 1665,
        "sku": "8987102380314-47930439991578"
      },
      "3079": {
        "23": 1424,
        "24": 1666,
        "sku": "8987102380314-47930440024346"
      },
      "3080": {
        "23": 1424,
        "24": 1667,
        "sku": "8987102380314-47930440057114"
      },
      "3081": {
        "23": 1953,
        "24": 1662,
        "sku": "8987102380314-47930440122650"
      },
      "3082": {
        "23": 1953,
        "24": 1663,
        "sku": "8987102380314-47930440155418"
      },
      "3083": {
        "23": 1953,
        "24": 1664,
        "sku": "8987102380314-47930440188186"
      },
      "3084": {
        "23": 1953,
        "24": 1665,
        "sku": "8987102380314-47930440220954"
      },
      "3085": {
        "23": 1953,
        "24": 1666,
        "sku": "8987102380314-47930440253722"
      },
      "3086": {
        "23": 1953,
        "24": 1667,
        "sku": "8987102380314-47930440286490"
      }
    },
    "variant_prices": {
      "3066": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3067": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3068": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3069": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3070": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3071": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3072": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3073": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3074": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3075": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3076": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3077": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3078": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3079": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3080": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3081": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3082": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3083": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3084": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3085": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      },
      "3086": {
        "regular": {
          "price": 45,
          "formatted_price": "45,00 €"
        },
        "final": {
          "price": 45,
          "formatted_price": "45,00 €"
        }
      }
    },
    "variant_images": {
      "3066": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3067": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3068": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3069": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3070": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3071": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3072": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3073": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3074": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3075": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3076": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3077": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3078": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3079": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3080": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3081": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3082": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3083": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3084": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3085": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ],
      "3086": [
        {
          "small_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
          "medium_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
          "large_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
          "original_image_url": "https://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
        }
      ]
    },
    "variant_videos": {
      "3066": [],
      "3067": [],
      "3068": [],
      "3069": [],
      "3070": [],
      "3071": [],
      "3072": [],
      "3073": [],
      "3074": [],
      "3075": [],
      "3076": [],
      "3077": [],
      "3078": [],
      "3079": [],
      "3080": [],
      "3081": [],
      "3082": [],
      "3083": [],
      "3084": [],
      "3085": [],
      "3086": []
    },
    "regular": {
      "price": 45,
      "formatted_price": "45,00 €"
    }
  },
  "countries": null,
  "default_country": "DE",
  "airwallex_method": [
    "card",
    "googlepay",
    "applepay"
  ],
  "payments": {
    "airwallex_klarna": "1",
    "payal_standard": "1",
    "airwallex_credit_card": "1",
    "airwallex_dropin": 0
  },
  "payments_default": "airwallex-klarna",
  "brand": "",
  "gtag": "G-1",
  "fb_ids": "1,2,3,4",
  "ob_adv_id": null,
  "crm_channel": null,
  "quora_adv_id": "1",
  "paypal_client_id": "1",
  "env": "demo",
  "sell-points": {
        "1": "Sell Point 1",
        "2": "Sell Point 2",
        "3": "Sell Point 3",
        "4": "Sell Point 4",
        "5": "Sell Point 5"
    },
   "ads": {
        "pc": {
            "img": "http:\/\/127.0.0.1:8000\/storage\/product\/3011\/joJCiXabUkKMrlwPO36SuAvcQCpTJTyjfAJ2WULS.jpg"
        },
        "mobile": {
            "img": "http:\/\/127.0.0.1:8000\/storage\/product\/3011\/wxjLxj5K7YRzp2h3eAX7C3bVBWLD7OI164AkBSDm.jpg"
        },
        "size": {
            "img": "http:\/\/127.0.0.1:8000\/storage\/product\/3011\/V4T3Rqj8m8RNg5aHZ0Vx8ROGBy3eA48SAgifNLDA.jpg"
        }
    }
}
```
# Coupon

```
POST api/onebuy/check/coupon?currency=EUR
```
> add coupon code info  

| Field              | Type | required | Desc |
| :---------------- | :------: | :------:| ----: |
| code        |   string  | true | coupon code |


## Out Params
```
{
    "data": {
        "coupon": {
            "id": 1,
            "code": "hao123",
            "usage_limit": 0,
            "usage_per_customer": 0,
            "times_used": 1,
            "type": 0,
            "is_primary": 1,
            "expired_at": null,
            "cart_rule_id": 16,
            "created_at": "2024-04-24T10:32:13.000000Z",
            "updated_at": "2024-04-25T04:19:17.000000Z"
        },
        "couponConfig": {
            "id": 16,
            "name": "coupon",
            "description": "coupon",
            "starts_from": null,
            "ends_till": null,
            "status": 1,
            "coupon_type": 1,
            "use_auto_generation": 0,
            "usage_per_customer": 0,
            "uses_per_coupon": 0,
            "times_used": 1,
            "condition_type": 1,
            "conditions": [],
            "end_other_rules": 1,
            "uses_attribute_conditions": 0,
            "action_type": "cart_fixed",
            "discount_amount": "5.0000",
            "discount_quantity": 0,
            "discount_step": "0",
            "apply_to_shipping": 0,
            "free_shipping": 0,
            "sort_order": 5,
            "created_at": "2024-04-24T10:32:13.000000Z",
            "updated_at": "2024-04-25T04:19:17.000000Z"
        }
    },
    "message": "Coupon applied successfully."
}
```
# Countries

## Countries List
```
GET /template-common/checkout1/state/countries_{country}.json  
GET /template-common/checkout1/state/countries_us.json (Example)
```
> country list
| Field              | Type | required | Desc |
| :---------------- | :------: | :------:| ----: |
| country        |   string  | true | country code like us,de,gb,fr,es |
###  Out
```
[
    {
        "countryName": "United States",
        "countryNameLocalized": "United States",
        "countryCode": "US",
        "currencyCode": "USD",
        "currencyName": "United States Dollar",
        "currencySign": "US$",
        "region": "Americas",
        "codeFormat": "^\\d{5}([ \\-]\\d{4})?$",
        "phonePrefix": "+1"
    },
    {
        "countryName": "Australia",
        "countryNameLocalized": "Australia",
        "countryCode": "AU",
        "currencyCode": "AUD",
        "currencyName": "Australian Dollar",
        "currencySign": "AU$",
        "region": "Oceania",
        "codeFormat": "^\\d{4}$",
        "phonePrefix": "+61"
    },
    {
        "countryName": "Canada",
        "countryCode": "CA",
        "phonePrefix": "+1"
    },
    {
        "countryName": "United Kingdom",
        "countryCode": "GB",
        "phonePrefix": "+44"
    }
]
```

## Country
> a country zone

```
GET /template-common/checkout1/state/{country}_{locale}.json  
GET /template-common/checkout1/state/us_en.json (Example)
```
| Field              | Type | required | Desc |
| :---------------- | :------: | :------:| ----: |
| country        |   string  | true | country code like us,de,gb,fr,es |
| locale        |   string  | true | locale code like us,de,gb,fr,es |

```
[
	{  
      "CountryCode":"US",
      "StateCode":"A",
      "StateName":"Armed Forces Africa"
   },
   {  
      "CountryCode":"US",
      "StateCode":"AA",
      "StateName":"Armed Forces Americas"
   },
   {  
      "CountryCode":"US",
      "StateCode":"AK",
      "StateName":"Alaska"
   },
   {  
      "CountryCode":"US",
      "StateCode":"AL",
      "StateName":"Alabama"
   },
   {  
      "CountryCode":"US",
      "StateCode":"AP",
      "StateName":"Armed Forces Pacific"
   },
   {  
      "CountryCode":"US",
      "StateCode":"AR",
      "StateName":"Arkansas"
   },
   {  
      "CountryCode":"US",
      "StateCode":"AS",
      "StateName":"American Samoa"
   },
   {  
      "CountryCode":"US",
      "StateCode":"AZ",
      "StateName":"Arizona"
   },
   {  
      "CountryCode":"US",
      "StateCode":"C",
      "StateName":"Armed Forces Canada"
   },
   {  
      "CountryCode":"US",
      "StateCode":"CA",
      "StateName":"California"
   },
   {  
      "CountryCode":"US",
      "StateCode":"CO",
      "StateName":"Colorado"
   },
   {  
      "CountryCode":"US",
      "StateCode":"CT",
      "StateName":"Connecticut"
   },
   {  
      "CountryCode":"US",
      "StateCode":"DC",
      "StateName":"Districtof Columbia"
   },
   {  
      "CountryCode":"US",
      "StateCode":"DE",
      "StateName":"Delaware"
   },
   {  
      "CountryCode":"US",
      "StateCode":"E",
      "StateName":"Armed Forces Europe"
   },
   {  
      "CountryCode":"US",
      "StateCode":"FL",
      "StateName":"Florida"
   },
   {  
      "CountryCode":"US",
      "StateCode":"FM",
      "StateName":"Federated Statesof Micronesia"
   },
   {  
      "CountryCode":"US",
      "StateCode":"GA",
      "StateName":"Georgia"
   },
   {  
      "CountryCode":"US",
      "StateCode":"GU",
      "StateName":"Guam"
   },
   {  
      "CountryCode":"US",
      "StateCode":"HI",
      "StateName":"Hawaii"
   },
   {  
      "CountryCode":"US",
      "StateCode":"IA",
      "StateName":"Iowa"
   },
   {  
      "CountryCode":"US",
      "StateCode":"ID",
      "StateName":"Idaho"
   },
   {  
      "CountryCode":"US",
      "StateCode":"IL",
      "StateName":"Illinois"
   },
   {  
      "CountryCode":"US",
      "StateCode":"IN",
      "StateName":"Indiana"
   },
   {  
      "CountryCode":"US",
      "StateCode":"KS",
      "StateName":"Kansas"
   },
   {  
      "CountryCode":"US",
      "StateCode":"KY",
      "StateName":"Kentucky"
   },
   {  
      "CountryCode":"US",
      "StateCode":"LA",
      "StateName":"Louisiana"
   },
   {  
      "CountryCode":"US",
      "StateCode":"M",
      "StateName":"Armed Forces Middle East"
   },
   {  
      "CountryCode":"US",
      "StateCode":"MA",
      "StateName":"Massachusetts"
   },
   {  
      "CountryCode":"US",
      "StateCode":"MD",
      "StateName":"Maryland"
   },
   {  
      "CountryCode":"US",
      "StateCode":"ME",
      "StateName":"Maine"
   },
   {  
      "CountryCode":"US",
      "StateCode":"MH",
      "StateName":"Republicof Marshall Islands"
   },
   {  
      "CountryCode":"US",
      "StateCode":"MI",
      "StateName":"Michigan"
   },
   {  
      "CountryCode":"US",
      "StateCode":"MN",
      "StateName":"Minnesota"
   },
   {  
      "CountryCode":"US",
      "StateCode":"MO",
      "StateName":"Missouri"
   },
   {  
      "CountryCode":"US",
      "StateCode":"MP",
      "StateName":"Northern Mariana Islands"
   },
   {  
      "CountryCode":"US",
      "StateCode":"MS",
      "StateName":"Mississippi"
   },
   {  
      "CountryCode":"US",
      "StateCode":"MT",
      "StateName":"Montana"
   },
   {  
      "CountryCode":"US",
      "StateCode":"NC",
      "StateName":"North Carolina"
   },
   {  
      "CountryCode":"US",
      "StateCode":"ND",
      "StateName":"North Dakota"
   },
   {  
      "CountryCode":"US",
      "StateCode":"NE",
      "StateName":"Nebraska"
   },
   {  
      "CountryCode":"US",
      "StateCode":"NH",
      "StateName":"New Hampshire"
   },
   {  
      "CountryCode":"US",
      "StateCode":"NJ",
      "StateName":"New Jersey"
   },
   {  
      "CountryCode":"US",
      "StateCode":"NM",
      "StateName":"New Mexico"
   },
   {  
      "CountryCode":"US",
      "StateCode":"NV",
      "StateName":"Nevada"
   },
   {  
      "CountryCode":"US",
      "StateCode":"NY",
      "StateName":"New York"
   },
   {  
      "CountryCode":"US",
      "StateCode":"OH",
      "StateName":"Ohio"
   },
   {  
      "CountryCode":"US",
      "StateCode":"OK",
      "StateName":"Oklahoma"
   },
   {  
      "CountryCode":"US",
      "StateCode":"OR",
      "StateName":"Oregon"
   },
   {  
      "CountryCode":"US",
      "StateCode":"PA",
      "StateName":"Pennsylvania"
   },
   {  
      "CountryCode":"US",
      "StateCode":"PR",
      "StateName":"Puerto Rico"
   },
   {  
      "CountryCode":"US",
      "StateCode":"RI",
      "StateName":"Rhode Island"
   },
   {  
      "CountryCode":"US",
      "StateCode":"SC",
      "StateName":"South Carolina"
   },
   {  
      "CountryCode":"US",
      "StateCode":"SD",
      "StateName":"South Dakota"
   },
   {  
      "CountryCode":"US",
      "StateCode":"TN",
      "StateName":"Tennessee"
   },
   {  
      "CountryCode":"US",
      "StateCode":"TX",
      "StateName":"Texas"
   },
   {  
      "CountryCode":"US",
      "StateCode":"UT",
      "StateName":"Utah"
   },
   {  
      "CountryCode":"US",
      "StateCode":"VA",
      "StateName":"Virginia"
   },
   {  
      "CountryCode":"US",
      "StateCode":"VI",
      "StateName":"Virgin Islands"
   },
   {  
      "CountryCode":"US",
      "StateCode":"VT",
      "StateName":"Vermont"
   },
   {  
      "CountryCode":"US",
      "StateCode":"WA",
      "StateName":"Washington"
   },
   {  
      "CountryCode":"US",
      "StateCode":"WI",
      "StateName":"Wisconsin"
   },
   {  
      "CountryCode":"US",
      "StateCode":"WV",
      "StateName":"West Virginia"
   },
   {  
      "CountryCode":"US",
      "StateCode":"WY",
      "StateName":"Wyoming"
   }
]
```

# Create an Order Use Other Payment
```
POST api/onebuy/order/add/sync?currency=EUR
```
> order create
## Input Params
```
{
  "refer": "default",
  "return_insurance": 1,
  "first_name": "Anna",
  "second_name": "Freitag",
  "email": "customer@email.de",
  "phone_full": "01761428434",
  "country": "US",
  "city": "Hickory",
  "province": "E",
  "address": "2025 McVaney Road",
  "code": "37197",
  "product_delivery": "9.99",
  "currency": "USD",
  "coupon_code": "hao123",
  "product_price": 59.184000000000005,
  "total": "69.17",
  "amount": 2,
  "payment_return_url": "/template-common/en/thankyou1/?",
  "payment_cancel_url": "/onebuy/8472767791334",
  "phone_prefix": "",
  "payment_method": "paypal_stand",
  "products": [
    {
      "img": "/cache/large/product/3171/NQMLFQhd1wBr5L6MHQ3mUI6HKhF5ce0r1DbWmbXV.webp",
      "price": "29.5920",
      "amount": 2,
      "description": "Variant 4 1443",
      "product_id": "3167",
      "product_sku": "8472767791334-44387808018662",
      "variant_id": 3171,
      "attribute_name": "US 5,Black",
      "attr_id": "24_4,23_1443"
    }
  ],
  "logo_image": "",
  "brand": "Hatmeo",
  "description": "2x Hatmeo Women's Breathable Orthotic Shoes",
  "shopify_store_name": "",
  "produt_amount_base": "1",
  "domain_name": "",
  "price_template": "$price",
  "omnisend": "",
  "payment_account": "",
  "shipping_address": "",
  "bill_first_name": "",
  "bill_second_name": "",
  "bill_country": null,
  "bill_city": "",
  "bill_province": null,
  "bill_address": "",
  "bill_code": "",
  "error": false
}
```
## Output Params
```

```

## Order confirm
```
POST api/onebuy/order/confirm?currency=EUR
```
> paypal order confirm

```

```

# Paypal Order Status
> When Paypal done payment,will post data to check the payment status

```
POST api/onebuy/order/status?currency=EUR
```
> order create by airwallex and not paypal other

## Input Params
```
{
  "client_secret": "7T7370604S9341820",
  "id": "7T7370604S9341820",
  "orderData": {
    "paymentID": "7T7370604S9341820",
    "orderID": "7T7370604S9341820"
  },
  "data": {
    "orderID": "7T7370604S9341820",
    "payerID": "JX393NB7E96WW",
    "paymentID": "7T7370604S9341820",
    "billingToken": null,
    "facilitatorAccessToken": "A21AALb65icg25L9JFq-ghlO8ikRrP0DBh4TnMM09OUaEOI3JiObWTWBchXgcDC0bpD3kLzvf21315Y-5kIfE84B9ovqgd3QQ",
    "paymentSource": "paypal"
  }
}
```
## Output Params
```
{
  success: true
}
```

# Create an Order use Paypal Payment (Quick payment)
```
POST api/onebuy/order/addr/after?currency=EUR
```
> order create by paypal(only)
## Input Params
```
{
  "refer": "default",
  "return_insurance": 1,
  "first_name": "Anna",
  "second_name": "Freitag",
  "email": "customer@email.de",
  "phone_full": "01761428434",
  "country": "US",
  "city": "Hickory",
  "province": "E",
  "address": "2025 McVaney Road",
  "code": "37197",
  "product_delivery": "9.99",
  "currency": "USD",
  "coupon_code": "hao123",
  "product_price": 59.184000000000005,
  "total": "69.17",
  "amount": 2,
  "payment_return_url": "/template-common/en/thankyou1/?",
  "payment_cancel_url": "/onebuy/8472767791334",
  "phone_prefix": "",
  "payment_method": "paypal_stand",
  "products": [
    {
      "img": "/cache/large/product/3171/NQMLFQhd1wBr5L6MHQ3mUI6HKhF5ce0r1DbWmbXV.webp",
      "price": "29.5920",
      "amount": 2,
      "description": "Variant 4 1443",
      "product_id": "3167",
      "product_sku": "8472767791334-44387808018662",
      "variant_id": 3171,
      "attribute_name": "US 5,Black",
      "attr_id": "24_4,23_1443"
    }
  ],
  "logo_image": "",
  "brand": "Hatmeo",
  "description": "2x Hatmeo Women's Breathable Orthotic Shoes",
  "shopify_store_name": "",
  "produt_amount_base": "1",
  "domain_name": "",
  "price_template": "$price",
  "omnisend": "",
  "payment_account": "",
  "shipping_address": "",
  "bill_first_name": "",
  "bill_second_name": "",
  "bill_country": null,
  "bill_city": "",
  "bill_province": null,
  "bill_address": "",
  "bill_code": "",
  "error": false
}
```
## Out Params
```
{
    "statusCode": 201,
    "result": {
        "id": "3D692807623889146",
        "intent": "CAPTURE",
        "status": "CREATED",
        "purchase_units": [
            {
                "reference_id": "default",
                "amount": {
                    "currency_code": "EUR",
                    "value": "89.35",
                    "breakdown": {
                        "item_total": {
                            "currency_code": "EUR",
                            "value": "99.20"
                        },
                        "shipping": {
                            "currency_code": "EUR",
                            "value": "9.99"
                        },
                        "tax_total": {
                            "currency_code": "EUR",
                            "value": "0.00"
                        },
                        "discount": {
                            "currency_code": "EUR",
                            "value": "19.84"
                        }
                    }
                },
                "payee": {
                    "email_address": "xxxxx",
                    "merchant_id": "xxxxx"
                },
                "items": [
                    {
                        "name": "Brand Orthop\u00e4dische Wanderschuhe",
                        "unit_amount": {
                            "currency_code": "EUR",
                            "value": "49.60"
                        },
                        "quantity": "2",
                        "sku": "8976974938394",
                        "category": "PHYSICAL_GOODS"
                    }
                ]
            }
        ],
        "create_time": "2024-05-17T06:02:24Z",
        "links": [
            {
                "href": "https:\/\/api.paypal.com\/v2\/checkout\/orders\/3D692807623889146",
                "rel": "self",
                "method": "GET"
            },
            {
                "href": "https:\/\/www.paypal.com\/checkoutnow?token=3D692807623889146",
                "rel": "approve",
                "method": "GET"
            },
            {
                "href": "https:\/\/api.paypal.com\/v2\/checkout\/orders\/3D692807623889146",
                "rel": "update",
                "method": "PATCH"
            },
            {
                "href": "https:\/\/api.paypal.com\/v2\/checkout\/orders\/3D692807623889146\/capture",
                "rel": "capture",
                "method": "POST"
            }
        ]
    },
    "headers": {
        "": "",
        "content-type": "application\/json",
        "content-length": "1092",
        "date": "Fri, 17 May 2024 06",
        "access-control-expose-headers": "Server-Timing",
        "application_id": "APP-8SG22180H3042913C",
        "cache-control": "max-age=0, no-cache, no-store, must-revalidate",
        "caller_acct_num": "EFPTK2PBPE2PY",
        "paypal-debug-id": "e77e9a4eeb8bc",
        "server-timing": "traceparent;desc=\"00-0000000000000000000e77e9a4eeb8bc-a92ea7c6eb5cbe9a-01\"",
        "set-cookie": "l7_az=ccg14.slc; Path=\/; Domain=paypal.com; Expires=Fri, 17 May 2024 06",
        "traceparent": "00-0000000000000000000e77e9a4eeb8bc-57536a1d5dc8ce0f-01",
        "vary": "Accept-Encoding",
        "strict-transport-security": "max-age=31536000; includeSubDomains"
    }
}
```

# FAQ Api
> Get FAQ list
```
GET api/onebuy/faq
```
## Out Params
```
{
    "data": [
        {
            "q": "What is the return policy?",
            "a": "We have a 30-day return policy, which means you have 30 days after receiving your item to request a return. To be eligible for a return, your item must be in the same condition that you received it, unworn or unused, with tags, and in its original packaging. You’ll also need the receipt or proof of purchase. To start a return, you can contact us at'
        },
        {
            "q": "What is the return policy?",
            "a": "We have a 30-day return policy, which means you have 30 days after receiving your item to request a return. To be eligible for a return, your item must be in the same condition that you received it, unworn or unused, with tags, and in its original packaging. You’ll also need the receipt or proof of purchase. To start a return, you can contact us at"
        },
    ]
}
```
