Laravel Base is based on Laravel 6

### copy .env
```
    cp .env.example .env
```

### build docker-compose and run
```
    docker-compose up --build
```

### install package and add key
```
    docker exec -it travel-laravel-1 sh
    composer install
```