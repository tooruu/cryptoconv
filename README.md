# Dockerized Laravel App

This is a simple Dockerized Laravel application that shows currency value in BTC.

## Prerequisites

-   [Docker](https://www.docker.com/get-started)

## Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/tooruu/cryptoconv.git
cd cryptoconv
```

### 2. Set Up Environment Variables

Copy the example environment file and adjust it according to your needs:

`cp .env.example .env`

### 3. Build and Run the Docker Container

`docker-compose up -d`

### 4. Install Dependencies and Run Migrations

_This is needed to generate & populate currencies table_

`docker-compose exec app composer update && composer install`

`docker-compose exec app php artisan migrate --seed --force`

### 5. Access the Application

Once the containers are running, you can access your Laravel application at http://localhost/public.

## Stopping the Application

To stop the Docker containers, run:

`docker-compose down`
