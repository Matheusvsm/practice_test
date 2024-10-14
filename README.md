## Para executar o Docker
```docker-compose up -d```


## Acesse o container do PHP com o seguinte comando:

```docker-compose exec app bash```

## Após acessar o container, execute:
```composer install```
```php artisan migrate```


## Em seguida, adicione as dependências do NPM:

```npm install```
```npm run build```


## Para rodar o seeder, execute:

```php artisan db:seed```

## Para rodar a aplicacao, execute:
Abra dois terminais.

Execute: ```php artisan serve``` e no outro ```npm run dev```
