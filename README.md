## Groupe 6

- LOUZOUN Nathanael
- TEIXEIRA FERNANDES Celine 
- MONTEFERRARIO Quentin
- GUEZ Geoffrey
- BARLET Maxime

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

## Schéma 

![Schéma](https://github.com/NatsuDzn/bar_tp/blob/master/assets/schema/schema.png)

## Question 4

```php
public function findCatSpecial(int $id)
    {
        return $this->createQueryBuilder('c')
            ->join('c.beers', 'b') // raisonner en terme de relation
            ->where('b.id = :id')
            ->setParameter('id', $id)
            ->andWhere('c.term = :term')
            ->setParameter('term', 'special')
            ->getQuery()
            ->getResult();
    }
```

Cette méthode permet d’obtenir la catégorie spéciale d’une bière en utilisant son id, les résultats seront donc filtrés pour uniquement avoir les bières dont la catégorie est "spécial"