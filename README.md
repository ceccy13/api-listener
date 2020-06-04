# api-listener
Api-Listener Project


-- Paths To My Project Files --

-- Controller --

./api-listener-master/app/Http/Controllers/ApiController.php

-- Models --

./api-listener-master/app/Traits/ProcessTrait.php

./api-listener-master/app/Api.php

./api-listener-master/app/Converter.php

./api-listener-master/app/DBTableRecordFactory.php

./api-listener-master/app/Order.php

./api-listener-master/app/Product.php

./api-listener-master/app/StringResponseParser.php

./api-listener-master/app/Token.php

./api-listener-master/app/iDatabaseInterface.php

-- Views/includes --

./api-listener-master/resources/views/includes/footer.php

./api-listener-master/resources/views/includes/header.php

-- Views --

./api-listener-master/resources/views/home.php

./api-listener-master/resources/views/orders.php

./api-listener-master/resources/views/products.php


-- Route --

./api-listener-master/routes/web.php

-- JavaScript --

./js/code.js

-- CSS --

./css/style.css

-- Database File Settings --

./api-listener-master/.env

WAP Dev Client Api Listener Task

Integrate to the provided API. The Postman collection is to get familiar and to test the API.

The Authentication is a standard OAuth2 with Client Credentials Grant. The token from the

response is valid for one hour. The username and password needed are provided in the

Postman collection.

The request to get the feed info requires for you to be authenticated. The response will either

be about an order or a product. And it will be encoded in this way:

[order,product]:[fieldName1](\\fieldEncoding1){[fieldValue1]}||
[fieldName2](\\fieldEncoding2){[fieldValue2]}…

The part in the () is optional. You need to parse this string and save it in a database.

The unique field for the order is `id` and for the product is `SKU`.

{
	"info": {
		"_postman_id": "b60d9720-1363-4c74-8e96-22c34bba0eb3",
		"name": "WAP Dev Interview",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json"
	},
	"item": [
		{
			"name": "Autheticate",
			"request": {
				"method": "POST",
				"header": [],
				"body": {
					"mode": "formdata",
					"formdata": [
						{
							"key": "client_id",
							"value": "vladislav.stratonikov@wearepentagon.com",
							"type": "text"
						},
						{
							"key": "client_secret",
							"value": "password",
							"type": "text"
						}
					]
				},
				"url": {
					"raw": "https://apptest.wearepentagon.com/devInterview/API/en/access-token",
					"protocol": "https",
					"host": [
						"apptest",
						"wearepentagon",
						"com"
					],
					"path": [
						"devInterview",
						"API",
						"en",
						"access-token"
					]
				}
			},
			"response": []
		},
		{
			"name": "Get feed",
			"request": {
				"auth": {
					"type": "bearer",
					"bearer": [
						{
							"key": "token",
							"value": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjdkMzA4N2NhMjM0MTgyZTBmMDE5YjU2ZWU3ODI3OWFjMWE5YjczN2RjMjVlZDkyZjk4ZjY5ZTQ0NDc1M2ZmZjk1YWQxMWNlOWJkMTczNjI1In0.eyJhdWQiOiJ2bGFkaXNsYXYuc3RyYXRvbmlrb3ZAd2VhcmVwZW50YWdvbi5jb20iLCJqdGkiOiI3ZDMwODdjYTIzNDE4MmUwZjAxOWI1NmVlNzgyNzlhYzFhOWI3MzdkYzI1ZWQ5MmY5OGY2OWU0NDQ3NTNmZmY5NWFkMTFjZTliZDE3MzYyNSIsImlhdCI6MTU3OTg2Nzc0MiwibmJmIjoxNTc5ODY3NzQyLCJleHAiOjE1Nzk4NzEzNDIsInN1YiI6IiIsInNjb3BlcyI6W119.Sr_6-0AHRX_bPUT5oEAJOWbcE4QSaxBxYegxTfJCxHnbGsTQZ2S6ujUZC5mD7-bOKGHEvK5I4uUvRYR8ND_v78IGLv54eP0GlPcap47hTvzqNglmQ04VAVcp94GoTpsk8ZYZy_o7FKcnQ9jWj_429HOtlOMmW5GOxEuVnGILbpe9R-bqf69cSs1UBcrnWM9CjzITtqyuXhpj2X93LnnXALLezTzVIgnHy0whpyN0rkvXUpBOdJy4MyNdNuWqlsGVXhQLFOcOl5dSOopFWIONI9rJpaHqdX3MrkG0uDKKChIlIgtjQpEwXAfmOwjYeqb_zUnOFeU89HMJsAQdlBNNyQ",
							"type": "string"
						}
					]
				},
				"method": "GET",
				"header": [],
				"url": {
					"raw": "https://apptest.wearepentagon.com/devInterview/API/en/get-random-test-feed",
					"protocol": "https",
					"host": [
						"apptest",
						"wearepentagon",
						"com"
					],
					"path": [
						"devInterview",
						"API",
						"en",
						"get-random-test-feed"
					]
				}
			},
			"response": []
		}
	],
	"protocolProfileBehavior": {}
}
