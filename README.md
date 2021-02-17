## Groupe 6

LOUZOUN Nathanael
TEIXEIRA FERNANDES Celine 
MONTEFERRARIO Quentin
GUEZ Geoffrey
BARLET Maxime

## 🏁 Setup 

### Install dependencies

```
composer i && npm i
```

### Config your env

Check the .env file

### Setup your database

```
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

### Start Symfony

```
symfony server:start
```

### Start Webpack

```
npm run dev-server
```