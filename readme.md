# Quai antique - Restaurant

#### Pour ce projet, vous devrez connaître et utiliser : PHP/Symfony, Doctrine, Twig, Tailwindcss, Webpack-encore, npm, Symfony CLI. Même si la commande 'composer install' que nous lancerons un peu plus loin va en installer quelques-uns, veuillez svp vérifier que vous les avez téléchargés sur votre machine.

## Instructions de déployement en local  

1 - Git Clone https://github.com/MatVD/quai-antique.git. Utiliser un IDE pour ouvrir l'application web.

2 - Créer un fichier .env.local
- Y intégrer les variables d'environment contenu dans l'annexe A (_les variables APP_SECRET et DATABASE_URL sont nécessaires avant toutes les étapes ci-dessous_)

3 - Via un terminal lancer les commandes suivantes:
- Composer install
- npm install (_avant tout node.js doit être installé_ => https://nodejs.org/en/download/)

4 - Etapes de création et alimentation de la base de données (_avec Doctrine_). Via le terminal:
- php bin/console d:d:c (doctrine:database:create)
- php bin/console d:m:m (doctrine:migrations:migrate)

5 - Pour générer les dossiers et fichiers de build, lancer la commande:
- npm run build

6 - Lancer le serveur local (_nécessite Symfony CLI_ => https://nodejs.org/en/download/): 
- symfony server:start ou symfony serve -d

7 - Si vous faites un tour sur le site, vous noterez qu'il fonctionne mais qu'il manque certains éléments (images sur la page d'accueil, menus et plats dans l'onglet Carte/Menus ..etc).  
- Il est nécessaire de lancer les fictures avec la commande : php bin/console doctrine:fixtures:load

8 - Accès à la partie administration du site
- S'inscrire via le formulaire d'insciption du site puis dans un terminal taper la commande :
  - php bin/console doctrine:query:sql "UPDATE user SET roles = '[\"ROLE_ADMIN\"]' where email = _<entrer email de l'inscription>_";


  
## Déployement en ligne
J'ai déployer le site sur hostinger via mon repository github