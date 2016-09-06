---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](public/docs/collection.json)
<!-- END_INFO -->

#general
<!-- START_fe6242c341a4fe288b160f1ea8d4f99d -->
## Listagem de Pedidos

Sendo todos os pedidos listados de acordo com o cliente logado no aplicativo

> Example request:

```bash
curl "http://localhost/api/client/order" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/client/order",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/client/order`

`HEAD api/client/order`


<!-- END_fe6242c341a4fe288b160f1ea8d4f99d -->
<!-- START_07d6b7bf0708ce69835040bd129d185b -->
## Cadastro de Cliente

> Example request:

```bash
curl "http://localhost/api/client/order" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/client/order",
    "method": "POST",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/client/order`


<!-- END_07d6b7bf0708ce69835040bd129d185b -->
<!-- START_e0aa93dd151d4c8933c8e424896d1ca8 -->
## api/client/order/{order}

> Example request:

```bash
curl "http://localhost/api/client/order/{order}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/client/order/{order}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/client/order/{order}`

`HEAD api/client/order/{order}`


<!-- END_e0aa93dd151d4c8933c8e424896d1ca8 -->
<!-- START_283289816aa4dfb3bfb36a13bb16c75a -->
## api/client/store_avaliacao

> Example request:

```bash
curl "http://localhost/api/client/store_avaliacao" \
-H "Accept: application/json" \
    -d "order_id"="distinctio" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/client/store_avaliacao",
    "method": "POST",
    "data": {
        "order_id": "distinctio"
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/client/store_avaliacao`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    order_id | string |  required  | 

<!-- END_283289816aa4dfb3bfb36a13bb16c75a -->
<!-- START_6a0b3c43461983842075536b311bb2c2 -->
## api/client/products

> Example request:

```bash
curl "http://localhost/api/client/products" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/client/products",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
{
    "data": [
        {
            "id": 1,
            "name": "aut",
            "description": "Sit ea doloribus sunt aut debitis ad est vitae.",
            "price": "32,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 2,
            "name": "consectetur",
            "description": "Blanditiis corporis quidem corrupti est iusto aspernatur sint.",
            "price": "30,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 3,
            "name": "laudantium",
            "description": "Qui aut itaque est dolore totam praesentium et in.",
            "price": "32,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 4,
            "name": "earum",
            "description": "Eos et quaerat dolor minima iusto alias dolore.",
            "price": "33,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 5,
            "name": "tempore",
            "description": "Numquam earum rem consequatur dignissimos sunt.",
            "price": "23,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 6,
            "name": "quos",
            "description": "Dolorem qui sed consectetur reiciendis quod eligendi.",
            "price": "37,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 7,
            "name": "voluptas",
            "description": "Soluta fugiat natus animi dolorum.",
            "price": "27,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 8,
            "name": "doloribus",
            "description": "Accusantium provident sed dolores beatae quos dicta.",
            "price": "30,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 9,
            "name": "esse",
            "description": "Quae minima illo aut sint non dicta temporibus.",
            "price": "16,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 10,
            "name": "voluptas",
            "description": "Aut ut ducimus ab ea.",
            "price": "45,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 11,
            "name": "id",
            "description": "Qui sint omnis mollitia est et optio.",
            "price": "32,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 12,
            "name": "aperiam",
            "description": "Consequatur non in eum architecto officia qui aut.",
            "price": "26,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 13,
            "name": "rerum",
            "description": "Nisi dignissimos vitae rerum est sint temporibus.",
            "price": "32,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 14,
            "name": "animi",
            "description": "A molestiae error ipsa est ea delectus.",
            "price": "40,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 15,
            "name": "voluptates",
            "description": "Est quod eos suscipit illo.",
            "price": "35,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 16,
            "name": "consequatur",
            "description": "Dicta nostrum repellendus ducimus quam sed praesentium hic.",
            "price": "16,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 17,
            "name": "quia",
            "description": "Est sit distinctio quibusdam accusantium temporibus eum.",
            "price": "27,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 18,
            "name": "nemo",
            "description": "Vitae vel officiis aliquid mollitia nesciunt ut eaque.",
            "price": "28,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 19,
            "name": "qui",
            "description": "Inventore accusamus nulla at ut harum eveniet praesentium.",
            "price": "37,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 20,
            "name": "eum",
            "description": "Est eos aliquid exercitationem illum qui.",
            "price": "37,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 21,
            "name": "quo",
            "description": "Voluptas sit id voluptatem alias ipsa.",
            "price": "10,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 22,
            "name": "consequatur",
            "description": "Ut nisi nisi voluptas voluptate.",
            "price": "19,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 23,
            "name": "fuga",
            "description": "Sapiente voluptatem earum rerum adipisci.",
            "price": "32,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 24,
            "name": "veritatis",
            "description": "Qui quam eveniet ut eveniet sunt adipisci ut harum.",
            "price": "17,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 25,
            "name": "et",
            "description": "Expedita ratione consequatur id nesciunt.",
            "price": "50,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 26,
            "name": "placeat",
            "description": "Dolor voluptatem rerum magni eveniet.",
            "price": "26,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 27,
            "name": "et",
            "description": "Nostrum id odit occaecati vel reiciendis quae consequatur.",
            "price": "14,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 28,
            "name": "voluptatem",
            "description": "Delectus molestias repellendus aut beatae dolor.",
            "price": "10,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 29,
            "name": "mollitia",
            "description": "Quis qui voluptatem eius veniam ipsam.",
            "price": "29,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 30,
            "name": "ut",
            "description": "Ipsa qui facere voluptatum inventore commodi voluptatem quo.",
            "price": "38,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 31,
            "name": "ipsa",
            "description": "Iusto rerum provident perferendis aut fugit.",
            "price": "32,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 32,
            "name": "quia",
            "description": "Laborum nihil quam quae qui tenetur.",
            "price": "34,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 33,
            "name": "itaque",
            "description": "Cum id dolores aut.",
            "price": "23,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 34,
            "name": "rem",
            "description": "Aut numquam sunt ipsam dolores temporibus.",
            "price": "11,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 35,
            "name": "perferendis",
            "description": "Necessitatibus nihil dolore rerum officiis at.",
            "price": "33,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 36,
            "name": "ex",
            "description": "Nihil ut consequatur omnis.",
            "price": "23,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 37,
            "name": "accusantium",
            "description": "Magni harum excepturi quia voluptas.",
            "price": "13,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 38,
            "name": "et",
            "description": "Sint repellat hic consequatur cumque eaque.",
            "price": "43,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 39,
            "name": "nihil",
            "description": "Eos beatae sit optio cumque et.",
            "price": "17,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 40,
            "name": "voluptatem",
            "description": "Vel aliquam et et deserunt itaque quo.",
            "price": "17,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 41,
            "name": "et",
            "description": "Delectus sequi distinctio tenetur omnis eveniet reprehenderit.",
            "price": "13,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 42,
            "name": "rerum",
            "description": "Possimus fugit fugiat enim inventore ab corporis et.",
            "price": "27,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 43,
            "name": "eaque",
            "description": "Voluptas enim qui nobis dignissimos.",
            "price": "27,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 44,
            "name": "id",
            "description": "Aut ex eos sunt omnis.",
            "price": "23,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 45,
            "name": "reprehenderit",
            "description": "Est placeat porro illum ut.",
            "price": "16,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 46,
            "name": "ut",
            "description": "Minima est dolorem quis maxime laboriosam at amet.",
            "price": "11,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 47,
            "name": "est",
            "description": "Ea inventore nihil ut eum necessitatibus est.",
            "price": "28,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 48,
            "name": "sit",
            "description": "Est omnis voluptatibus laboriosam labore aut dolorem.",
            "price": "15,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 49,
            "name": "veritatis",
            "description": "Incidunt odit enim cum vel.",
            "price": "43,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 50,
            "name": "quia",
            "description": "Soluta voluptas dicta aut quaerat excepturi.",
            "price": "36,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 51,
            "name": "quam",
            "description": "Laboriosam nostrum qui et illum aut assumenda qui officia.",
            "price": "20,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 52,
            "name": "voluptates",
            "description": "Quidem quia qui et minima.",
            "price": "30,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 53,
            "name": "aut",
            "description": "Voluptates explicabo beatae fugiat molestiae deleniti architecto sint minus.",
            "price": "30,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 54,
            "name": "non",
            "description": "In sequi quo nemo velit eveniet minima aut.",
            "price": "23,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 55,
            "name": "quae",
            "description": "Debitis consequatur ut quod nihil.",
            "price": "41,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 56,
            "name": "odit",
            "description": "Quo explicabo accusamus architecto architecto.",
            "price": "40,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 57,
            "name": "quod",
            "description": "Molestiae quasi qui ut ea non.",
            "price": "19,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 58,
            "name": "labore",
            "description": "Et neque at quia ullam repellendus.",
            "price": "34,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 59,
            "name": "non",
            "description": "Magni aperiam est corporis architecto sapiente omnis.",
            "price": "35,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 60,
            "name": "voluptatibus",
            "description": "Fuga fuga quod amet omnis voluptatum aut ratione.",
            "price": "23,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 61,
            "name": "impedit",
            "description": "Sunt deleniti est quisquam rerum fugiat nihil animi eos.",
            "price": "38,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 62,
            "name": "aspernatur",
            "description": "Nemo eum perspiciatis reiciendis dolor.",
            "price": "37,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 63,
            "name": "officia",
            "description": "Molestiae dolores non velit non nobis.",
            "price": "48,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 64,
            "name": "ipsam",
            "description": "Nobis sint hic illo amet sit.",
            "price": "12,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 65,
            "name": "et",
            "description": "Neque distinctio quis aut.",
            "price": "21,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 66,
            "name": "sit",
            "description": "Fugiat qui excepturi delectus omnis et quae ipsam.",
            "price": "23,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 67,
            "name": "voluptates",
            "description": "Voluptas consequatur est velit unde nam.",
            "price": "36,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 68,
            "name": "quisquam",
            "description": "Qui sint quod quia temporibus.",
            "price": "27,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 69,
            "name": "natus",
            "description": "Vero nihil nemo laborum magnam deserunt minus repellat.",
            "price": "46,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 70,
            "name": "laborum",
            "description": "Est ex sequi quasi dolores quis possimus cumque.",
            "price": "38,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 71,
            "name": "perferendis",
            "description": "Dicta enim accusamus dolorem mollitia.",
            "price": "27,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 72,
            "name": "est",
            "description": "Ea quia est voluptatum corrupti.",
            "price": "44,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 73,
            "name": "nemo",
            "description": "Officia quis quo eaque eligendi est enim.",
            "price": "26,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 74,
            "name": "veniam",
            "description": "Provident aut sequi consequatur quasi provident.",
            "price": "23,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 75,
            "name": "ullam",
            "description": "Doloribus animi ducimus ad sapiente dolores exercitationem.",
            "price": "20,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 76,
            "name": "consequatur",
            "description": "Illo ratione aut rerum fugit ullam atque.",
            "price": "25,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 77,
            "name": "officia",
            "description": "Repudiandae quis nisi maxime sed error sed ea.",
            "price": "15,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 78,
            "name": "non",
            "description": "Cumque adipisci at veniam minus fugit et.",
            "price": "45,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 79,
            "name": "aut",
            "description": "Odio ab architecto error inventore.",
            "price": "47,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 80,
            "name": "architecto",
            "description": "Necessitatibus quasi dolor soluta itaque nostrum cumque sit dignissimos.",
            "price": "32,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 81,
            "name": "cumque",
            "description": "Qui aut qui quaerat minus voluptas.",
            "price": "21,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 82,
            "name": "est",
            "description": "Excepturi qui minus laboriosam.",
            "price": "30,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 83,
            "name": "et",
            "description": "Recusandae fugiat commodi error velit deleniti iste.",
            "price": "39,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 84,
            "name": "fugit",
            "description": "Id perspiciatis consequatur explicabo soluta voluptatibus perferendis illo et.",
            "price": "28,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 85,
            "name": "qui",
            "description": "Reprehenderit id magnam alias similique et dicta.",
            "price": "21,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 86,
            "name": "quisquam",
            "description": "Aut soluta soluta aspernatur officia laudantium iste repellendus.",
            "price": "30,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 87,
            "name": "perferendis",
            "description": "Et eius provident non in est.",
            "price": "41,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 88,
            "name": "ea",
            "description": "Excepturi ut facere reiciendis accusamus iure cumque voluptatem.",
            "price": "34,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 89,
            "name": "dolorem",
            "description": "Eius praesentium consectetur corrupti occaecati.",
            "price": "41,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 90,
            "name": "placeat",
            "description": "Eaque praesentium quasi rerum quisquam soluta sunt vero.",
            "price": "40,00",
            "created_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:13.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 91,
            "name": "ut",
            "description": "Consequatur iure suscipit eligendi ut et distinctio dolore.",
            "price": "27,00",
            "created_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 92,
            "name": "in",
            "description": "Architecto at vero quia nihil quaerat et maiores et.",
            "price": "42,00",
            "created_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 93,
            "name": "blanditiis",
            "description": "Quas aliquam non nam et iure sequi qui cum.",
            "price": "47,00",
            "created_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 94,
            "name": "eos",
            "description": "Omnis harum voluptatem accusantium voluptatem architecto quae molestiae.",
            "price": "30,00",
            "created_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 95,
            "name": "et",
            "description": "Quasi eos blanditiis enim sint.",
            "price": "46,00",
            "created_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 96,
            "name": "ex",
            "description": "Vel quo ipsam veniam inventore autem sit eum consequatur.",
            "price": "46,00",
            "created_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 97,
            "name": "adipisci",
            "description": "Et earum exercitationem esse est sunt earum aut.",
            "price": "20,00",
            "created_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 98,
            "name": "exercitationem",
            "description": "Aliquid eos similique ullam facilis ea.",
            "price": "44,00",
            "created_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 99,
            "name": "ex",
            "description": "Ipsam voluptate et aliquid laboriosam.",
            "price": "13,00",
            "created_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        },
        {
            "id": 100,
            "name": "repellendus",
            "description": "Veritatis officia deleniti ut alias perferendis iusto.",
            "price": "45,00",
            "created_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_at": {
                "date": "2016-08-26 13:43:14.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            }
        }
    ]
}
```

### HTTP Request
`GET api/client/products`

`HEAD api/client/products`


<!-- END_6a0b3c43461983842075536b311bb2c2 -->
<!-- START_4b3aa055eaba6bfb99b56acce6812b86 -->
## Display a listing of the resource.

> Example request:

```bash
curl "http://localhost/api/client/estabelecimentos" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/client/estabelecimentos",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/client/estabelecimentos`

`HEAD api/client/estabelecimentos`


<!-- END_4b3aa055eaba6bfb99b56acce6812b86 -->
<!-- START_281d514ee1435cfc5ad1f43b955ce48d -->
## api/deliveryman/order/order

> Example request:

```bash
curl "http://localhost/api/deliveryman/order/order" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/deliveryman/order/order",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/deliveryman/order/order`

`HEAD api/deliveryman/order/order`


<!-- END_281d514ee1435cfc5ad1f43b955ce48d -->
<!-- START_94c46c9af72aa2e3fc5b5242702f78d9 -->
## api/deliveryman/order/order/create

> Example request:

```bash
curl "http://localhost/api/deliveryman/order/order/create" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/deliveryman/order/order/create",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/deliveryman/order/order/create`

`HEAD api/deliveryman/order/order/create`


<!-- END_94c46c9af72aa2e3fc5b5242702f78d9 -->
<!-- START_f42b6bfcfa2a30080df162ae590907b2 -->
## api/deliveryman/order/order

> Example request:

```bash
curl "http://localhost/api/deliveryman/order/order" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/deliveryman/order/order",
    "method": "POST",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/deliveryman/order/order`


<!-- END_f42b6bfcfa2a30080df162ae590907b2 -->
<!-- START_3baf0b1af6385b7e31bf433172e85dba -->
## api/deliveryman/order/order/{order}

> Example request:

```bash
curl "http://localhost/api/deliveryman/order/order/{order}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/deliveryman/order/order/{order}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/deliveryman/order/order/{order}`

`HEAD api/deliveryman/order/order/{order}`


<!-- END_3baf0b1af6385b7e31bf433172e85dba -->
<!-- START_b2ab4bc23eab07d9fab6043bb8c770cf -->
## api/deliveryman/order/order/{id}/update-status

> Example request:

```bash
curl "http://localhost/api/deliveryman/order/order/{id}/update-status" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/deliveryman/order/order/{id}/update-status",
    "method": "PATCH",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`PATCH api/deliveryman/order/order/{id}/update-status`


<!-- END_b2ab4bc23eab07d9fab6043bb8c770cf -->
<!-- START_1fd8146a6e81087d44a08a3c2831490b -->
## api/deliveryman/order/order/{id}/geo

> Example request:

```bash
curl "http://localhost/api/deliveryman/order/order/{id}/geo" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/deliveryman/order/order/{id}/geo",
    "method": "POST",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST api/deliveryman/order/order/{id}/geo`


<!-- END_1fd8146a6e81087d44a08a3c2831490b -->
<!-- START_a93cbd004875aa6f79ed87b673205d7d -->
## api/authenticated

> Example request:

```bash
curl "http://localhost/api/authenticated" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/authenticated",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/authenticated`

`HEAD api/authenticated`


<!-- END_a93cbd004875aa6f79ed87b673205d7d -->
<!-- START_4a34c87a67cc32bdc8a10e39f4e20af9 -->
## api/cupom/{code}

> Example request:

```bash
curl "http://localhost/api/cupom/{code}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/cupom/{code}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/cupom/{code}`

`HEAD api/cupom/{code}`


<!-- END_4a34c87a67cc32bdc8a10e39f4e20af9 -->
<!-- START_13ad5f703b223aabf816bb58061f23c1 -->
## api/order

> Example request:

```bash
curl "http://localhost/api/order" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost/api/order",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET api/order`

`HEAD api/order`


<!-- END_13ad5f703b223aabf816bb58061f23c1 -->
