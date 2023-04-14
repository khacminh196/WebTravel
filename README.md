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

###
```
    php artisan storage:link
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

### config supervisor to run queue 
```
    sudo apt-get install supervisor 
```

path:  /etc/supervisor/conf.d
```
    [program:travel-worker]
    process_name=%(program_name)s_%(process_num)02d
    directory=/var/www/html/WebTravel
    command=php artisan queue:work --sleep=1 --tries=1
    autostart=true
    autorestart=true
    user=ubuntu
    numprocs=2
    redirect_stderr=true
    stdout_logfile=/var/www/html/WebTravel/storage/logs/worker.log
```

```
    sudo service supervisor restart
    sudo supervisorctl reread
    sudo supervisorctl update
    sudo supervisorctl start laravel-worker:*
```