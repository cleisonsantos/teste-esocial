# Teste eSocial

## Após clonar o projeto execute os passos abaixo para realizar a instalação

#### Instalar dependências necessárias para o projeto:
```
composer install
```

#### Mais algumas dependências com npm:
```
npm install && npm run dev
```

#### Copie o arquivo .env.example para .env:
```
cp .env.example .env
```

#### Configure todas as variaveis de ambiente do banco de dados(mysql) e do email(smtp, MAIL_TO).


#### Execute as migrations para gerar as tabelas no banco de dados:
```
php artisan migrate
```

#### E finalmente execute o projeto
```
php artisan serve
```