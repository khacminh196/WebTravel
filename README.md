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
    php artisan key:generate
```

### public config sitemap
```
    php artisan vendor:publish --provider="Laravelium\Sitemap\SitemapServiceProvider"
```


### add cronjob create sitemap every day
```
    crontab -e paste line under
    * * * * * cd /usr/share/nginx/html && php artisan schedule:run >> /dev/null 2>&1
```