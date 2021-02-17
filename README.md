## 📝 Table of Contents
- [Groupe](#authors)
- [Setup](#setup)
- [Schéma](#schema)
- [Partie 4](#part4)

## Groupe 6 <a name = "authors"></a>

- LOUZOUN Nathanael
- TEIXEIRA FERNANDES Celine 
- MONTEFERRARIO Quentin
- GUEZ Geoffrey
- BARLET Maxime

## 🏁 Setup <a name = "setup"></a>

### Install dependencies

```
composer i && npm i
```

### Config your env

Check the .env file

### Setup your database

```
php bin/console doctrine:database:create
php bin/console make:migration
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

## Schéma <a name = "schema"></a>

![Schéma](https://github.com/NatsuDzn/bar_tp/blob/master/assets/schema/schema.png)

## Question 4 <a name = "part4"></a>

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

Cette méthode est une requête vers la BDD afin de trouver une bière en fonction de son ID et du terme (term) spécial.<br>
On voit que la fonction prend un paramètre (un int) qui correspondra à l’id de la bière et va faire une recherche dans la BDD.<br>
Cette recherche sortira la bière qui aura l’id correspondant ainsi que le terme (term) ‘spécial’.<br>
Cette fonction est utile si on recherche une bière avec le terme (term) ‘spécial’ en fonction de son id.<br>
