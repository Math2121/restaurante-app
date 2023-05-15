## App Back


Crie o Arquivo .env
```sh
cp .env.example .env
```
Atualize as variáveis de ambiente do arquivo .env
```dosini
APP_NAME=restaurante
APP_URL=http://localhost:8080

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=restaurante
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```


Acessar o container
```sh
docker-compose exec app bash
```


Instalar as dependências do projeto
```sh
composer install
```


Gerar a key do projeto Laravel
```sh
php artisan key:generate

```
Para executar as migrations
```sh
php artisan migrate
```

Para executar as seeds. Serão geradas dois usuários e 10 reservas para teste da aplicação
```sh
php artisan db:seed
```

Conecte-se ao banco de dados da aplicação para obter informações do usuário. A senha setada para os usuários na seed e: "password".

Acessar o projeto
[http://localhost:8080](http://localhost:8080)
