# Clean Architecture with Vanilla php

A Vanilla PHP implementation of a Clean Architecture.

## To run

```
$ git clone https://github.com/yosugi/clearn-architecture-with-vanilla-php.git
$ cd clearn-architecture-with-vanilla-php
$ composer install
$ php -S localhost:8080 ./src/main.php
$ curl 'localhost:8080/?id=1'
{"id":1,"name":"itemA","price":100,"taxPrice":110}
$ curl 'localhost:8080/?id=99'
item id 99 is not found.
```

## Environment

- php 7.4.9
- composer 1.10.10

## License

MIT License
