# Quai antique - Restaurant

#### Pour le bon suivi des instructions, vous devrez avoir téléchargé sur votre machine : 
- Composer (_il est possible de le télécharger ici_ : https://getcomposer.org/download/)
- Node.js et npm ou yarn (=> https://nodejs.org/en/download/)
- Symfony CLI (=> https://nodejs.org/en/download/)
- Et peut-être un outil du type XAMPP, WAMP ou LAMP pour un server local et une base de données.

## Instructions de déployement en local  

1 - Git Clone https://github.com/MatVD/quai-antique.git. Utiliser un IDE pour ouvrir l'application web.

2 - Dans le fichier .env (ou créer un fichier .env.local)
- Y intégrer la variables d'environnement DATABASE_URL. Il vous faudra peut-être un outil du type MAMPP, XAMPP ou LAMP.
- Inclure également la variable APP_ENV=dev

3 - Via un terminal, lancer les commandes suivantes:
- Composer install
- npm install ou yarn

4 - Etapes de création et alimentation de la base de données (_avec Doctrine_). Via le terminal:
- php bin/console d:d:c (doctrine:database:create)
- php bin/console d:m:m (doctrine:migrations:migrate)

5 - Pour générer les dossiers et fichiers de build, lancer la commande:
- npm run build ou yarn run build

6 - Lancer le serveur local (_nécessite Symfony CLI_): 
- symfony server:start ou symfony serve -d

7 - A ce stade, si vous faites un tour sur le site, vous noterez qu'il fonctionne mais qu'il manque certains éléments (images sur la page d'accueil, menus et plats dans l'onglet Carte/Menus ..etc). Il est nécessaire de lancer les fixtures avec la commande suivante:
- php bin/console doctrine:fixtures:load 
- Taper "Yes" à la question générée par la commande.

8 - Et le tour est joué... 

9 - Un administrateur est créé par défault via les fixtures :
- Id : capitaine-admin@gmail.com,
- Mot de passe : cap_ad/1264ADMIN,
  - Mais si vous souhaitez en créer un nouveau voici la démarche:
  - Créer votre compte sur la page de création de compte => http://127.0.0.1:8000/creation_compte
  - Puis, dans le terminal taper la commande suivante : php bin/console doctrine:query:sql "UPDATE User SET roles = '[\\"ROLE_ADMIN\\"]' WHERE email = '_votre email_'";


## Déployement en ligne
J'ai déployer le site sur l'hébergeur hostinger via mon repository github. Un webhook a été ajouté au repo pour un déploiement continu