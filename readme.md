Quai antique - Restaurant
---------------------------------

### Instructions de déployement en local  

1 - Git Clone https://github.com/MatVD/quai-antique.git


2 - Créer un fichier .env.local
- Y intégrer les variables d'environment contenu dans l'annexe A (_les variables APP_SECRET et DATABASE_URL sont nécessaires avant toutes les étapes ci-dessous_)


3 - Ouvrir son IDE préféré, puis via le terminal installer les différents packages avec la commande suivante:
- Composer install


4 - Créer la base de données et l'alimenter 

- php bin/console doctrine:database:create
- php bin/console make:migration
- php bin/console doctrine:migrations:migrate (ou d:m:m)

5 - Lancer le serveur local: _symfony server:start_ ou _symfony serve -d_

6 - Accès à la partie administration du site
- S'inscrire via le formulaire d'insciption du site puis dans un terminal taper la commande :
  - php bin/console doctrine:query:sql "UPDATE user SET roles = '[\"ROLE_ADMIN\"]' where email = _<entrer email de l'inscription>_";




### Déployement en ligne
J'ai déployer le site sur hostinger via mon repository github