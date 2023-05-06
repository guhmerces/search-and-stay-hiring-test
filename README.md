# <b>SE VOCÊ ESTÁ VENDO ESSE REPOSITÓRIO E FARÁ TESTES PARA ESSA EMPRESA, USE DESIGN PATTERNS. SIM, EU SEI, É UM SIMPLES CRUD E DEVERIA SER FEITO SEM COMPLICAÇÕES. PORÉM, NÃO DEIXAM CLARO NO TESTE QUE QUEREM UM PROGRAMADOR CARGO CULT.</b>

# Book CRUD - Search and Stay 2023 Dev Team Test - Backend

<b>** To access the requirements for this challange, click [here](https://github.com/guhmerces/search-and-stay-hiring-test/blob/master/challenge/SAS-Backend-Task.docx)</b>

Hi! I'm [Gustavo](https://github.com/guhmerces) and this repository contains my implementation for the backend technical challenge proposed by Search and Stay.

## Setup

This project does not come with a Dockerfile ready. To run this project, make sure you have PHP8 and MYSQL installed.

Please follow the instructions below:


Clone the repository
```sh
git clone https://github.com/guhmerces/search-and-stay-hiring-test.git
```

Access the new created directory


Create the .env file
```sh
cp .env.example .env
```


Set environment variables related to Database access in .env
```dosini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=<database name>
DB_USERNAME=<username>
DB_PASSWORD=<password>
```

Install dependencies
```sh
composer install
```

Run database migrations
```sh
php artisan migrate
```

Generate application key
```sh
php artisan key:generate
```

Run tests
```sh
php artisan test
```

Serve the application
```sh
php artisan serve
```

The process will be vailable at port 8000 by default.


## Using the API (Please include <i>Accept: application/json</i> to request headers)

### Registering a user

The first operation you will most likely do is to register a User. This can be done in a post in <b>/api/register</b> request without any authorization headers:

```
POST /api/register HTTP/1.1
Accept: application/json, */*;q=0.5
Accept-Encoding: gzip, deflate
Connection: keep-alive
Content-Length: 87
Content-Type: application/json
Host: localhost:8000
User-Agent: HTTPie/2.6.0

{
    "email": "foo@email.com",
    "password": "12345678",
    "password_confirmation": "12345678"
}


HTTP/1.1 201 Created
Access-Control-Allow-Origin: *
Cache-Control: no-cache, private
Connection: close
Content-Type: text/html; charset=UTF-8
Date: Sat, 29 Apr 2023 15:11:39 GMT, Sat, 29 Apr 2023 15:11:39 GMT
Host: localhost:8000
X-Powered-By: PHP/8.2.0
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59

```

### Get a access token with user credentials (Bearer token)

Example:

```
POST /api/login HTTP/1.1
Accept: application/json, */*;q=0.5
Accept-Encoding: gzip, deflate
Connection: keep-alive
Content-Length: 50
Content-Type: application/json
Host: localhost:8000
User-Agent: HTTPie/2.6.0

{
    "email": "foo@email.com",
    "password": "12345678"
}


HTTP/1.1 200 OK
Access-Control-Allow-Origin: *
Cache-Control: no-cache, private
Connection: close
Content-Type: application/json
Date: Sat, 29 Apr 2023 15:14:23 GMT, Sat, 29 Apr 2023 15:14:23 GMT
Host: localhost:8000
X-Powered-By: PHP/8.2.0
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 58

{
    "data": {
        "token": "12|X91YFKiRJt569FZmjHInloLZHtx9R5TOn5w9tE1R"
    }
}

```

### Create a book (with Bearer token included to the HTTP request header)

```
POST /api/books HTTP/1.1
Accept: application/json, */*;q=0.5
Accept-Encoding: gzip, deflate
Authorization: Bearer 12|X91YFKiRJt569FZmjHInloLZHtx9R5TOn5w9tE1R
Connection: keep-alive
Content-Length: 73
Content-Type: application/json
Host: localhost:8000
User-Agent: HTTPie/2.6.0

{
    "name": "Programming Erlang",
    "isbn": "9781937785536",
    "value": "39.48"
}


HTTP/1.1 201 Created
Access-Control-Allow-Origin: *
Cache-Control: no-cache, private
Connection: close
Content-Type: text/html; charset=UTF-8
Date: Sat, 29 Apr 2023 15:19:04 GMT, Sat, 29 Apr 2023 15:19:04 GMT
Host: localhost:8000
X-Powered-By: PHP/8.2.0
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59

```
### Get a list of created books (Bearer token included to the HTTP request header)

```
GET /api/books HTTP/1.1
Accept: application/json, */*;q=0.5
Accept-Encoding: gzip, deflate
Authorization: Bearer 12|X91YFKiRJt569FZmjHInloLZHtx9R5TOn5w9tE1R
Connection: keep-alive
Content-Type: application/json
Host: localhost:8000
User-Agent: HTTPie/2.6.0



HTTP/1.1 200 OK
Access-Control-Allow-Origin: *
Cache-Control: no-cache, private
Connection: close
Content-Type: application/json
Date: Sat, 29 Apr 2023 15:24:44 GMT, Sat, 29 Apr 2023 15:24:44 GMT
Host: localhost:8000
X-Powered-By: PHP/8.2.0
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59

[
    {
        "created_at": "2023-04-29T15:19:04.000000Z",
        "id": 5,
        "isbn": "9781937785536",
        "name": "Programming Erlang",
        "updated_at": "2023-04-29T15:19:04.000000Z",
        "value": "39.48"
    }
]

```


### Get the recently created book (Bearer token included to the HTTP request header)

```
GET /api/books/5 HTTP/1.1
Accept: application/json, */*;q=0.5
Accept-Encoding: gzip, deflate
Authorization: Bearer 12|X91YFKiRJt569FZmjHInloLZHtx9R5TOn5w9tE1R
Connection: keep-alive
Content-Type: application/json
Host: localhost:8000
User-Agent: HTTPie/2.6.0



HTTP/1.1 200 OK
Access-Control-Allow-Origin: *
Cache-Control: no-cache, private
Connection: close
Content-Type: application/json
Date: Sat, 29 Apr 2023 15:22:15 GMT, Sat, 29 Apr 2023 15:22:15 GMT
Host: localhost:8000
X-Powered-By: PHP/8.2.0
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 52

{
    "created_at": "2023-04-29T15:19:04.000000Z",
    "id": 5,
    "isbn": "9781937785536",
    "name": "Programming Erlang",
    "updated_at": "2023-04-29T15:19:04.000000Z",
    "value": 39.48
}
```

### Update a book (Bearer token included to the HTTP request header)

```
PUT /api/books/5 HTTP/1.1
Accept: application/json, */*;q=0.5
Accept-Encoding: gzip, deflate
Authorization: Bearer 12|X91YFKiRJt569FZmjHInloLZHtx9R5TOn5w9tE1R
Connection: keep-alive
Content-Length: 90
Content-Type: application/json
Host: localhost:8000
User-Agent: HTTPie/2.6.0

{
    "isbn": "9781937785536",
    "name": "Programming Erlang by Joe Armstrong",
    "value": "49.48"
}


HTTP/1.1 200 OK
Access-Control-Allow-Origin: *
Cache-Control: no-cache, private
Connection: close
Content-Type: text/html; charset=UTF-8
Date: Sat, 29 Apr 2023 15:26:01 GMT, Sat, 29 Apr 2023 15:26:01 GMT
Host: localhost:8000
X-Powered-By: PHP/8.2.0
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59

```

### Delete a book (Bearer token included to the HTTP request header)

```
DELETE /api/books/5 HTTP/1.1
Accept: application/json, */*;q=0.5
Accept-Encoding: gzip, deflate
Authorization: Bearer 12|X91YFKiRJt569FZmjHInloLZHtx9R5TOn5w9tE1R
Connection: keep-alive
Content-Length: 0
Content-Type: application/json
Host: localhost:8000
User-Agent: HTTPie/2.6.0



HTTP/1.1 200 OK
Access-Control-Allow-Origin: *
Cache-Control: no-cache, private
Connection: close
Content-Type: text/html; charset=UTF-8
Date: Sat, 29 Apr 2023 15:27:00 GMT, Sat, 29 Apr 2023 15:27:00 GMT
Host: localhost:8000
X-Powered-By: PHP/8.2.0
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 58

```

### User logout (Bearer token included to the HTTP request header)

```
POST /api/logout HTTP/1.1
Accept: application/json, */*;q=0.5
Accept-Encoding: gzip, deflate
Authorization: Bearer 12|X91YFKiRJt569FZmjHInloLZHtx9R5TOn5w9tE1R
Connection: keep-alive
Content-Length: 0
Content-Type: application/json
Host: localhost:8000
User-Agent: HTTPie/2.6.0



HTTP/1.1 200 OK
Access-Control-Allow-Origin: *
Cache-Control: no-cache, private
Connection: close
Content-Type: text/html; charset=UTF-8
Date: Sat, 29 Apr 2023 15:29:44 GMT, Sat, 29 Apr 2023 15:29:44 GMT
Host: localhost:8000
X-Powered-By: PHP/8.2.0
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59


```
