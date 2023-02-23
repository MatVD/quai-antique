# Quai antique - Restaurant

#### Pour ce projet, les techonoliges importantes utilisées sont : PHP/Symfony, Doctrine, Twig, Tailwindcss, Webpack-encore, du Css, du javascript pour de l'évenementiel et de l'asynchrone, npm.

## Instructions de déployement en local  

1 - Git Clone https://github.com/MatVD/quai-antique.git. Utiliser un IDE pour ouvrir l'application web.

2 - Créer un fichier .env.local
- Y intégrer les variables d'environment contenu dans l'annexe A (_les variables APP_SECRET et DATABASE_URL sont nécessaires avant toutes les étapes ci-dessous_)

3 - Ouvrir son IDE préféré, puis via le terminal installer les différents packages avec les commandes suivantes:
- Composer install
- npm install

4 - Etapes de création et alimentation de la base de données (avec Doctrine):

- php bin/console doctrine:database:create
- php bin/console make:migration
- php bin/console doctrine:migrations:migrate

5 - Dans le dossier "public/uploads/" créer le dossier "images/"

6 - Lancer le serveur local: _symfony server:start_ ou _symfony serve -d_

7 - Accès à la partie administration du site
- S'inscrire via le formulaire d'insciption du site puis dans un terminal taper la commande :
  - php bin/console doctrine:query:sql "UPDATE user SET roles = '[\"ROLE_ADMIN\"]' where email = _<entrer email de l'inscription>_";


  
## Déployement en ligne
J'ai déployer le site sur hostinger via mon repository github