##  Teste Constr Up

Teste de desenvolvimento para a empresa Constr Up.

O teste se resume no desenvolvimento de um CRUD, para gerenciar materiais de construção.

<br>

```bash
# dentro do diretorio do projeto

cd /construp_app

composer install

npm install

npm run dev

# outro terminal, para rodar a API

cd /api

# configurar o banco de dados, no arquivo .env

php artisan migrate

php artisan serve
```

Tecnologias utilizadas: Laravel(PHP), Vue.JS e Mysql.