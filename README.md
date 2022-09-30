# api-requirements

# run & installation

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

5. Use the following command to launch the project:

```shell
    docker-compose up --build -d
```

6. Run migrations:
```shell
    docker-compose run --rm app php artisan migration --force
```
