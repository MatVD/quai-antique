Quai antique - Restaurant
--------------------------

    Instructions de déployement en local  

- Git Clone https://github.com/MatVD/quai-antique.git
- Créer un fichier .env.local
    - Y intégrer les variables d'environment contenu dans l'annexe A
- Ouvrir son IDE préféré, puis via le terminal installer les différents packages avec les commandes suivantes:
    - Composer install
- Créer la base de données et l'alimenter:
    - php bin/console doctrine:database:create
    - php bin/console make:migration
    - php bin/console doctrine:migrations:migrate (ou d:m:m)

- Lancer le serveur local :
  - symfony server:start ou symfony serve -d


    Déployement en ligne
J'ai déployer le site sur hostinger via mon repository github