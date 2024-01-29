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

### 4. Install Dependencies, Run Migrations, and Set Application Key

Due to how Docker ~~just works~~, we have to run these commands **after** `up`ing the container.
You only need to run this step once.

```bash
docker-compose exec app composer update
docker-compose exec app composer install
docker-compose exec app php artisan migrate --seed --force
docker-compose exec app php artisan key:generate
```

### 5. Access the Application

Once the container is running, you can access the application at http://localhost/public.

## Stopping the Application

To stop the Docker container, run:

`docker-compose down`
