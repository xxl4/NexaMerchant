---
title: OneBuy API
tags:
  - OneBuy
  - Api
categories:
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
    "id": 3011,
    "sku": "8924785377562",
    "name": "Brand Haltungskorrektur-BH",
    "description": "\u003Cdiv class=\"_am_site-content-title-cell\" title=\"70-jährige Ingenieurin entwirft BH, der das Leben von Frauen verändern!\" _ngcontent-kmf-c468=\"\"\u003E\u003Cstrong\u003EVon Gynäkologen empfohlene BHs erobern Deutschland im Sturm\u003C/strong\u003E\u003C/div\u003E\n\u003Cdiv class=\"_am_site-content-title-cell\" title=\"70-jährige Ingenieurin entwirft BH, der das Leben von Frauen verändern!\" _ngcontent-kmf-c468=\"\"\u003E\n\u003Cem\u003E\u003Cstrong\u003EDer erste Push-up-BH, der speziell für Frauen\u003C/strong\u003E\u003C/em\u003E und ihre Bedürfnisse entwickelt wurde und eine bessere Körperhaltung und bessere Push-up-Ergebnisse garantiert. Jetzt mit 50 % Rabatt erhältlich.\u003C/div\u003E\n\u003Cdiv class=\"_am_site-content-title-cell\" title=\"70-jährige Ingenieurin entwirft BH, der das Leben von Frauen verändern!\" _ngcontent-kmf-c468=\"\"\u003E\u003Cem\u003E\u003Cstrong\u003E\u003Cimg src=\"https://offer.wexiy.com/de/m9/bh03-2/images/1.webp\"\u003E\u003C/strong\u003E\u003C/em\u003E\u003C/div\u003E\n\u003Cdiv class=\"_am_site-content-title-cell\" title=\"70-jährige Ingenieurin entwirft BH, der das Leben von Frauen verändern!\" _ngcontent-kmf-c468=\"\"\u003EEin neuer BH verändert vollständig unsere Art, Unterwäsche zu betrachten.Sind Sie es leid, unbequeme BHs zu tragen, die keinerlei Unterstützung bieten? Suchen Sie nach einem BH, der genauso schön ist wie ein BH mit einem großen Markennamen, aber gleichzeitig komfortabler und vor allem erschwinglicher? Möchten Sie sich jeden Tag wohl und frei von Schweiß fühlen? Heute ist Ihr Glückstag! Ein revolutionärer neuer BH wurde gerade auf den Markt gebracht und dieser ist einfach atemberaubend!\u003C/div\u003E\n\u003Cdiv class=\"_am_site-content-title-cell\" title=\"70-jährige Ingenieurin entwirft BH, der das Leben von Frauen verändern!\" _ngcontent-kmf-c468=\"\"\u003E\n\u003Cimg src=\"https://cdn.shopify.com/s/files/1/0838/9577/9610/files/00027_480x480.jpg?v=1709792025\" alt=\"\"\u003E\u003Cimg alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0838/9577/9610/files/00023_480x480.jpg?v=1709792068\" data-mce-src=\"https://cdn.shopify.com/s/files/1/0838/9577/9610/files/00023_480x480.jpg?v=1709792068\" data-mce-fragment=\"1\"\u003E\u003Cimg height=\"708\" width=\"466\" alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0838/9577/9610/files/00026_480x480.jpg?v=1709792088\" data-mce-src=\"https://cdn.shopify.com/s/files/1/0838/9577/9610/files/00026_480x480.jpg?v=1709792088\" data-mce-fragment=\"1\"\u003E\n\u003C/div\u003E\n\u003Cp data-mce-fragment=\"1\"\u003E\u003Cimg alt=\"\" src=\"https://cdn.shopify.com/s/files/1/0771/1411/4355/files/111111111111111-1_1024x1024.webp?v=1698650286\" data-mce-src=\"https://cdn.shopify.com/s/files/1/0771/1411/4355/files/111111111111111-1_1024x1024.webp?v=1698650286\" data-mce-fragment=\"1\"\u003E\u003C/p\u003E\n\u003Ch2 data-mce-fragment=\"1\"\u003EUNSERE GARANTIE\u003C/h2\u003E\n\u003Cul data-mce-fragment=\"1\"\u003E\n\u003Cli data-mce-fragment=\"1\"\u003E\n\u003Cspan data-mce-fragment=\"1\"\u003E⭐\u003C/span\u003E\u003Cstrong data-mce-fragment=\"1\"\u003ESichere Zahlung&gt;&gt;\u003C/strong\u003E\u003Cspan data-mce-fragment=\"1\"\u003E \u003C/span\u003EWir verwenden modernste sichere SSL-Verschlüsselung, um Ihre persönlichen und finanziellen Informationen zu 100% zu\u003C/li\u003E\n\u003Cli data-mce-fragment=\"1\"\u003E\n\u003Cspan data-mce-fragment=\"1\"\u003E⭐\u003C/span\u003E\u003Cstrong data-mce-fragment=\"1\"\u003Eschützen.Rückgabe&gt;&gt;\u003C/strong\u003E\u003Cspan data-mce-fragment=\"1\"\u003E \u003C/span\u003E100% Geld-zurück-Garantie.Versand&gt;&gt;Weltweiter\u003C/li\u003E\n\u003Cli data-mce-fragment=\"1\"\u003E\n\u003Cspan data-mce-fragment=\"1\"\u003E⭐\u003C/span\u003E\u003Cstrong data-mce-fragment=\"1\"\u003EExpressversand verfügbarBearbeitungszeit &gt;&gt;\u003C/strong\u003E\u003Cspan data-mce-fragment=\"1\"\u003E \u003C/span\u003EVersand innerhalb von 1-3 Tagen nach Zahlungseingang\u003C/li\u003E\n\u003C/ul\u003E\n\u003Ch2 data-mce-fragment=\"1\"\u003E\u003Cimg data-loaded=\"true\" src=\"https://img-va.myshopline.com/image/store/2000679021/1648015513052/f38b40b0c7784f3cb188972dc08c76da.png?w=640&amp;h=221&amp;t=webp\" height=\"84\" width=\"322\" alt=\"\" data-src=\"https://img-va.myshopline.com/image/store/2000679021/1648015513052/f38b40b0c7784f3cb188972dc08c76da.png?w=640&amp;h=221&amp;t=webp\" class=\"lozad lazyloaded lazyloaded\" referrerpolicy=\"same-origin\" data-mce-src=\"https://img-va.myshopline.com/image/store/2000679021/1648015513052/f38b40b0c7784f3cb188972dc08c76da.png?w=640&amp;h=221&amp;t=webp\" data-mce-fragment=\"1\"\u003E\u003C/h2\u003E",
    "url_key": "8924785377562",
    "base_image": {
      "small_image_url": "http://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
      "medium_image_url": "http://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
      "large_image_url": "http://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
      "original_image_url": "http://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
    },
    "images": [
      {
        "small_image_url": "http://127.0.0.1:8000/themes/shop/default/build/assets/small-product-placeholder-64b7f208.webp",
        "medium_image_url": "http://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
        "large_image_url": "http://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp",
        "original_image_url": "http://127.0.0.1:8000/themes/shop/default/build/assets/large-product-placeholder-13b8a96b.webp"
      }
    ],
    "is_new": true,
    "is_featured": true,
    "on_sale": false,
    "is_wishlist": false,
    "min_price": "29,98 €",
    "prices": {
      "regular": {
        "price": 29.98,
        "formatted_price": "29,98 €"
      }
    },
    "price_html": "\u003Cp class=\"text-[14px] text-[#6E6E6E] price-label\"\u003E\r\n    Ab\u003C/p\u003E\r\n\r\n\u003Cp class=\"font-semibold special-price\"\u003E\r\n    29,98 €\r\n\u003C/p\u003E",
    "avg_ratings": 5
  },
  "package_products": [
    {
      "id": 2,
      "name": "2x Brand Haltungskorrektur-BH",
      "image": "http://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
      "amount": 2,
      "old_price": 99.92,
      "old_price_format": "€99.92",
      "new_price": 47.968,
      "new_price_format": "€47.97",
      "tip1": "52% ",
      "tip2": "€23.98",
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
      "name": "1x Brand Haltungskorrektur-BH",
      "image": "http://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
      "amount": 1,
      "old_price": 49.96,
      "old_price_format": "€49.96",
      "new_price": 29.98,
      "new_price_format": "€29.98",
      "tip1": "40% ",
      "tip2": "€29.98",
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
      "name": "3x Brand Haltungskorrektur-BH",
      "image": "http://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
      "amount": 3,
      "old_price": 149.88,
      "old_price_format": "€149.88",
      "new_price": 62.958,
      "new_price_format": "€62.96",
      "tip1": "58% ",
      "tip2": "€20.99",
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
      "name": "4x Brand Haltungskorrektur-BH",
      "image": "http://127.0.0.1:8000/themes/shop/default/build/assets/medium-product-placeholder-3b1a7b7d.webp",
      "amount": 4,
      "old_price": 199.84,
      "old_price_format": "€199.84",
      "new_price": 71.952,
      "new_price_format": "€71.95",
      "tip1": "64% ",
      "tip2": "€17.99",
      "shipping_fee": "9.99",
      "popup_info": {
        "name": null,
        "old_price": null,
        "new_price": null,
        "img": null
      }
    }
  ],
  "sku": "8924785377562",
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
            "products": [3015, 3034, 3035, 3036, 3037, 3038, 3039]
          },
          {
            "id": 1943,
            "label": "DUNKELBLAU",
            "swatch_value": null,
            "products": [3012, 3016, 3017, 3018, 3019, 3020, 3021]
          },
          {
            "id": 1944,
            "label": "SCHWARZ",
            "swatch_value": null,
            "products": [3013, 3022, 3023, 3024, 3025, 3026, 3027]
          },
          {
            "id": 1945,
            "label": "BLAU",
            "swatch_value": null,
            "products": [3014, 3028, 3029, 3030, 3031, 3032, 3033]
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
            "id": 1946,
            "label": "M (40-50KG)",
            "swatch_value": null,
            "products": [3012, 3013, 3014, 3015]
          },
          {
            "id": 1947,
            "label": "L (50-60KG)",
            "swatch_value": null,
            "products": [3016, 3022, 3028, 3034]
          },
          {
            "id": 1948,
            "label": "2L (60-70KG)",
            "swatch_value": null,
            "products": [3017, 3023, 3029, 3035]
          },
          {
            "id": 1949,
            "label": "3L (70-80kg)",
            "swatch_value": null,
            "products": [3018, 3024, 3030, 3036]
          },
          {
            "id": 1950,
            "label": "4L (80-90KG)",
            "swatch_value": null,
            "products": [3019, 3025, 3031, 3037]
          },
          {
            "id": 1951,
            "label": "5L (90-100KG）",
            "swatch_value": null,
            "products": [3020, 3026, 3032, 3038]
          },
          {
            "id": 1952,
            "label": "6L (100-110KG)",
            "swatch_value": null,
            "products": [3021, 3027, 3033, 3039]
          }
        ],
        "attr_sort": []
      }
    ],
    "index": {
      "3012": {
        "23": 1943,
        "24": 1946
      },
      "3013": {
        "23": 1944,
        "24": 1946
      },
      "3014": {
        "23": 1945,
        "24": 1946
      },
      "3015": {
        "23": 1424,
        "24": 1946
      },
      "3016": {
        "23": 1943,
        "24": 1947
      },
      "3017": {
        "23": 1943,
        "24": 1948
      },
      "3018": {
        "23": 1943,
        "24": 1949
      },
      "3019": {
        "23": 1943,
        "24": 1950
      },
      "3020": {
        "23": 1943,
        "24": 1951
      },
      "3021": {
        "23": 1943,
        "24": 1952
      },
      "3022": {
        "23": 1944,
        "24": 1947
      },
      "3023": {
        "23": 1944,
        "24": 1948
      },
      "3024": {
        "23": 1944,
        "24": 1949
      },
      "3025": {
        "23": 1944,
        "24": 1950
      },
      "3026": {
        "23": 1944,
        "24": 1951
      },
      "3027": {
        "23": 1944,
        "24": 1952
      },
      "3028": {
        "23": 1945,
        "24": 1947
      },
      "3029": {
        "23": 1945,
        "24": 1948
      },
      "3030": {
        "23": 1945,
        "24": 1949
      },
      "3031": {
        "23": 1945,
        "24": 1950
      },
      "3032": {
        "23": 1945,
        "24": 1951
      },
      "3033": {
        "23": 1945,
        "24": 1952
      },
      "3034": {
        "23": 1424,
        "24": 1947
      },
      "3035": {
        "23": 1424,
        "24": 1948
      },
      "3036": {
        "23": 1424,
        "24": 1949
      },
      "3037": {
        "23": 1424,
        "24": 1950
      },
      "3038": {
        "23": 1424,
        "24": 1951
      },
      "3039": {
        "23": 1424,
        "24": 1952
      }
    },
    "variant_prices": {
      "3012": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3013": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3014": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3015": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3016": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3017": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3018": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3019": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3020": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3021": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3022": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3023": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3024": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3025": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3026": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3027": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3028": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3029": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3030": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3031": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3032": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3033": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3034": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3035": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3036": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3037": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3038": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      },
      "3039": {
        "regular": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        },
        "final": {
          "price": 29.98,
          "formatted_price": "29,98 €"
        }
      }
    },
    "variant_images": {
      "3012": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3012/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3012/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3012/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3012/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3012/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3012/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3012/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3012/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3012/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3012/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3012/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3012/1709004734537.webp"
        }
      ],
      "3013": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3013/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3013/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3013/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3013/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3013/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3013/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3013/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3013/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3013/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3013/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3013/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3013/1709004734537.webp"
        }
      ],
      "3014": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3014/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3014/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3014/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3014/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3014/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3014/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3014/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3014/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3014/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3014/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3014/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3014/1709004734537.webp"
        }
      ],
      "3015": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3015/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3015/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3015/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3015/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3015/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3015/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3015/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3015/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3015/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3015/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3015/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3015/1709004734537.webp"
        }
      ],
      "3016": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3016/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3016/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3016/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3016/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3016/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3016/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3016/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3016/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3016/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3016/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3016/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3016/1709004734537.webp"
        }
      ],
      "3017": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3017/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3017/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3017/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3017/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3017/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3017/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3017/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3017/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3017/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3017/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3017/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3017/1709004734537.webp"
        }
      ],
      "3018": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3018/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3018/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3018/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3018/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3018/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3018/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3018/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3018/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3018/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3018/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3018/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3018/1709004734537.webp"
        }
      ],
      "3019": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3019/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3019/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3019/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3019/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3019/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3019/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3019/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3019/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3019/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3019/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3019/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3019/1709004734537.webp"
        }
      ],
      "3020": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3020/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3020/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3020/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3020/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3020/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3020/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3020/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3020/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3020/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3020/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3020/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3020/1709004734537.webp"
        }
      ],
      "3021": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3021/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3021/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3021/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3021/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3021/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3021/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3021/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3021/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3021/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3021/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3021/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3021/1709004734537.webp"
        }
      ],
      "3022": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3022/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3022/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3022/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3022/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3022/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3022/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3022/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3022/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3022/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3022/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3022/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3022/1709004734537.webp"
        }
      ],
      "3023": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3023/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3023/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3023/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3023/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3023/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3023/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3023/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3023/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3023/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3023/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3023/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3023/1709004734537.webp"
        }
      ],
      "3024": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3024/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3024/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3024/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3024/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3024/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3024/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3024/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3024/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3024/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3024/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3024/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3024/1709004734537.webp"
        }
      ],
      "3025": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3025/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3025/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3025/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3025/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3025/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3025/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3025/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3025/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3025/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3025/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3025/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3025/1709004734537.webp"
        }
      ],
      "3026": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3026/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3026/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3026/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3026/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3026/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3026/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3026/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3026/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3026/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3026/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3026/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3026/1709004734537.webp"
        }
      ],
      "3027": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3027/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3027/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3027/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3027/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3027/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3027/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3027/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3027/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3027/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3027/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3027/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3027/1709004734537.webp"
        }
      ],
      "3028": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3028/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3028/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3028/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3028/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3028/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3028/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3028/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3028/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3028/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3028/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3028/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3028/1709004734537.webp"
        }
      ],
      "3029": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3029/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3029/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3029/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3029/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3029/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3029/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3029/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3029/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3029/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3029/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3029/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3029/1709004734537.webp"
        }
      ],
      "3030": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3030/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3030/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3030/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3030/1709004734537.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3030/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3030/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3030/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3030/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3030/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3030/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3030/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3030/1709004734546.webp"
        }
      ],
      "3031": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3031/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3031/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3031/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3031/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3031/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3031/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3031/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3031/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3031/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3031/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3031/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3031/1709004734537.webp"
        }
      ],
      "3032": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3032/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3032/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3032/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3032/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3032/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3032/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3032/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3032/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3032/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3032/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3032/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3032/1709004734537.webp"
        }
      ],
      "3033": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3033/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3033/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3033/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3033/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3033/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3033/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3033/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3033/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3033/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3033/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3033/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3033/1709004734537.webp"
        }
      ],
      "3034": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3034/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3034/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3034/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3034/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3034/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3034/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3034/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3034/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3034/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3034/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3034/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3034/1709004734537.webp"
        }
      ],
      "3035": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3035/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3035/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3035/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3035/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3035/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3035/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3035/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3035/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3035/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3035/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3035/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3035/1709004734537.webp"
        }
      ],
      "3036": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3036/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3036/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3036/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3036/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3036/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3036/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3036/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3036/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3036/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3036/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3036/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3036/1709004734537.webp"
        }
      ],
      "3037": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3037/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3037/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3037/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3037/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3037/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3037/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3037/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3037/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3037/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3037/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3037/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3037/1709004734537.webp"
        }
      ],
      "3038": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3038/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3038/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3038/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3038/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3038/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3038/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3038/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3038/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3038/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3038/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3038/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3038/1709004734537.webp"
        }
      ],
      "3039": [
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3039/1709004734513.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3039/1709004734513.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3039/1709004734513.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3039/1709004734513.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3039/1709004734546.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3039/1709004734546.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3039/1709004734546.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3039/1709004734546.webp"
        },
        {
          "small_image_url": "http://127.0.0.1:8000/cache/small/product/3039/1709004734537.webp",
          "medium_image_url": "http://127.0.0.1:8000/cache/medium/product/3039/1709004734537.webp",
          "large_image_url": "http://127.0.0.1:8000/cache/large/product/3039/1709004734537.webp",
          "original_image_url": "http://127.0.0.1:8000/cache/original/product/3039/1709004734537.webp"
        }
      ]
    },
    "variant_videos": {
      "3012": [],
      "3013": [],
      "3014": [],
      "3015": [],
      "3016": [],
      "3017": [],
      "3018": [],
      "3019": [],
      "3020": [],
      "3021": [],
      "3022": [],
      "3023": [],
      "3024": [],
      "3025": [],
      "3026": [],
      "3027": [],
      "3028": [],
      "3029": [],
      "3030": [],
      "3031": [],
      "3032": [],
      "3033": [],
      "3034": [],
      "3035": [],
      "3036": [],
      "3037": [],
      "3038": [],
      "3039": []
    },
    "regular": {
      "price": 29.98,
      "formatted_price": "29,98 €"
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
  "brand": "brand",
  "gtag": "111",
  "fb_ids": "0,1,2,3",
  "ob_adv_id": null,
  "crm_channel": null,
  "quora_adv_id": "1",
  "paypal_client_id": "1111"
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

# Create an Order Use Other Payment
```
POST api/onebuy/order/add/sync?currency=EUR
```
> order create
## Input Params
```
{
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
  "domain_name": "shop.hatmeo.com",
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
  "domain_name": "shop.hatmeo.com",
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
