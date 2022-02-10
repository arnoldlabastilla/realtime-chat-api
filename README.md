## Real-time Chat

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

### Laravel Websockets Installation

First, install pusher server ^4.1
`composer require "pusher/pusher-php-server:^4.1"`

Finally, install the beyondcode's laravel-websockets
`composer require "beyondcode/laravel-websockets:^1.9"`

Set the Pusher host in `config.broadcasting.connections.pusher.options.host`
- Docker (since the supervisor is running on php-worker container)
```
'host' => 'php-worker',
```

Allow port 6001
- Docker `laradock/docker-compose.yml`
```
php-worker:
  ...
  volumes:
    - ...
  ports:
    - "6001:6001"
```

### Reference

https://github.com/christophrumpel/blog-laravel-real-time-notifications
