WAP Dev Client Api Listener

Входяща точка на приложението за тестване на Localhost Server:
http://localhost/ApiListener-master/public/

P.S.
Project Directory може да е с различно име от Apilistener-master, което е по default при download на проекта в .zip формат от GitHub

Линк към проекта в GitHub:
https://github.com/ceccy13/ApiListener

Пътищата до основните файловете с кода на проекта:

Models
App\Token.php;
App\Api.php;
App\StringResponseParser.php;
App\Converter.php;
App\Database.php;

Controller
App\Http\Controllers\ApiController.php

Views
Resources\views\header.php
Resources\views\footer.php
Resources\views\home.php
Resources\views\products.php
Resources\views\orders.php

Http Routes
Routes\web.php

файл с база данни - api_db.sql (в директорията на проекта)
Database default setting for localhost test
Server: localhost
Database api_db
user: root
Pass:

Home Directory
.env - за допълнителни настройки


Тези данни от response-a са с дублирани id – та, които по условие на заданието трябва да са уникални, затова се записва само първия от дублираните в Database

"order:id{1004871}||total{10.46}||shipping_total{2.4}||create_time{1579866242}||timezone{Asia\/Singapore}"
"order:id{1004871}||total{10.46}||shipping_total{2.4}||create_time{1579867242}||timezone{Europe\/London}"
"order:id{1004872}||total{10.46}||shipping_total{2.4}||create_time{1579866222}||timezone{Asia\/Singapore}"
"order:id{1004872}||total{10.46}||shipping_total{2.4}||create_time{1579866342}||timezone{Europe\/Berlin}"
"order:id{1004875}||total{10.46}||shipping_total{2.4}||create_time{1579866242}||timezone{Europe\/Sofia}"
"order:id{1004875}||total{10.46}||shipping_total{2.4}||create_time{1579896242}||timezone{Europe\/Berlin}"
"order:id{1004879}||total{10.46}||shipping_total{2.4}||create_time{1579856242}||timezone{Asia\/Singapore}"
"order:id{1004879}||total{10.46}||shipping_total{2.4}||create_time{1579866242}||timezone{Europe\/London}"
"product:title{Demo8}||SKU{DEMOSK002}||image\\base64;jpeg{\/9j\/4AAQSkZJRgABAQAAAQABAAD\/2wCEAAkGBxAPEBAPDxAPEBAVDw8SDw8PDw8PDw8OF
"product:title{Demo2}||SKU{DEMOSK002}||image\\base64;jpeg{\/9j\/4AAQSkZJRgABAQAAAQABAAD\/2wBDAAsICAgICAsICAsQCwkLEBMOCwsOExYSEhMSE
"product:title{Demo7}||SKU{DEMOSK001}||image\\base64;jpeg{\/9j\/4AAQSkZJRgABAQAAAQABAAD\/2wCEAAkGBxAPEBAPDxAPEBAVDw8SDw8PDw8PDw8OF
"product:title{Demo1}||SKU{DEMOSK001}||image\\base64;jpeg{\/9j\/4AAQSkZJRgABAQAAAQABAAD\/2wBDAAsICAgICAsICAsQCwkLEBMOCwsOExYSEhMSE