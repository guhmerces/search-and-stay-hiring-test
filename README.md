
# Book CRUD - Search and Stay 2023 Dev Team Test - Backend

<b>** To access the requirements for this challange, click [here]()</b>

Hi! I'm [Gustavo](https://github.com/guhmerces) and this repository contains my implementation for the backend technical challenge proposed by Search and Stay.

## Setup

This project does not come with Dockerfile ready. To run this project, make sure you have PHP8 and MYSQL installed.

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

Run tests
```sh
php artisan test
```

Serve the application
```sh
php artisan serve
```

The process will be vailable at port 8000 by default.

