# api-requirements

## run & installation

1. Copy .env.example to .env `cp .env.example .env`, then change default values. For getting UID and GID, run the following commands.
```shell
    id -u #UID
    id -g #GID
```

2. Copy src/.env.example to src/.env `cp src/.env.example src/.env` (you can change default values)  

3. Run this command to install the dependencies:
```shell
    docker-compose run --rm app composer install
```

4. Generate the key:
```shell
    docker-compose run --rm app php artisan key:generate
```

5. Run migrations:
```shell
    docker-compose run --rm app php artisan migration --seed
```

6. Use the following command to launch the project:

```shell
    docker-compose up --build -d
```

## usage

### api filters:
- category:    `/api/v1/products?category=insurance`
- price:       `/api/v1/products?price=99000`
- price range: `/api/v1/products?price_range[min]=10000&price_range[max]=90000`
- pagination:  `/api/v1/products?page=1&per_page=12`

**_NOTE:_** Use `Accept:application/json` header if you want see errors and so on