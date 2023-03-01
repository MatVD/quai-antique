<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use App\Entity\Dishes;
use App\Entity\Images;
use App\Entity\Menus;
use App\Entity\Schedules;
use App\Entity\Tables;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {

        // --------------- Admin --------------- //
        $user_admin = new Users();
        $user_admin->setName('capitaine-admin');
        $user_admin->setEmail('capitaine-admin@gmail.com');
            // Criptage du mot de passe avant de le mettre en bdd
        $password = $this->hasher->hashPassword($user_admin, 'cap_ad/1264ADMIN');
        $user_admin->setPassword($password);
        $user_admin->setRoles(["ROLE_USER", "ROLE_ADMIN"]);
        $manager->persist($user_admin);

        $manager->flush();

        // --------------- Client --------------- //
        $user_customer = new Users();
        $user_customer->setName('client1');
        $user_customer->setEmail('client1@gmail.com');
        // Criptage du mot de passe avant de le mettre en bdd
        $password = $this->hasher->hashPassword($user_customer, 'client1/1264CUSTOMER');
        $user_customer->setPassword($password);
        $user_customer->setRoles(["ROLE_USER"]);
        $manager->persist($user_customer);


        // --------- Tables du restaurant ------- //
        for ($i = 1; $i < 21; $i++) {
            // Boucle pour générer 20 tables
            $table = new Tables();
            $table->setAdmin($user_admin);
            $table->setFree(true);
            $manager->persist($table);
        }


        // -------- Horaires d'ouvertures ------- //
        $days = ['Lundi', "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];
        for ($i = 0; $i < 7; $i++) {
            // Boucle pour générer les horaires d'ouvertures
            $schedule = new Schedules();
            $schedule->setAdmin($user_admin);
            $schedule->setDays($days[$i]);
            if ($i == 0 || $i == 6) {
                // lundi et dimanche
                $schedule->setAMopeningHours(NULL);
                $schedule->setAMclosingHours(NULL);
                $schedule->setPMopeningHours(NULL);
                $schedule->setPMclosingHours(NULL);
            } else {
                // Les autres jours de la semaine
                $schedule->setAMopeningHours(new \DateTimeImmutable('11:30:00'));
                $schedule->setAMclosingHours(new \DateTimeImmutable('14:00:00'));
                $schedule->setPMopeningHours(new \DateTimeImmutable('18:30:00'));
                $schedule->setPMclosingHours(new \DateTimeImmutable('23:00:00'));
            }
            $manager->persist($schedule);
        }


        // ------------ Plats et Catégories ------------- //
        $dishAndCategories = [
            'Entrées' => [
                'Salade césars' => 6.00,
                'Velouté de potimarron' => 5.00,
                'Carpaccio de boeuf' => 5.00,
                'Salade de chèvre chaud' => 6.00,
            ],
            'Plats' => [
                'Lotte sauce au poivre' => 16.00,
                'Agneaux du Velay et pommes sautées' => 16.00,
                'Entrecôte aux échalottes' => 14.00,
                'Veggie de courgettes dorées' => 15.00,
            ],
            'Desserts' => [
                'Thé/café gourmand' => 4.50,
                'Mousse au chocolat maison' => 5.00,
                'Fruits de saison' => 3.50,
            ],
            'Boissons' => [
                'Vin rouge/rosé/blanc (75cl)' => 10.00,
                'Bière brassée dans la région' => 8.50,
                'Soda/Jus d\'orange/Eau pétillante' => 3.50
            ]
        ];


        // Boucle sur le tableau associatif dishAndCategories
        foreach ($dishAndCategories as $category_name => $dishes) {
            $category = new Categories();
            $category->setTitle($category_name);
            $manager->persist($category);
            foreach ($dishes as $dish_name => $price) {
                $dish = new Dishes();
                $dish->setAdmin($user_admin);
                $dish->setTitle($dish_name);
                $dish->setPrice($price);
                $dish->setCategory($category);
                $dish->setDescription("$dish_name Proin porttitor, orci nec nonummy molestie mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, pretium a, enim. Pellentesque congue.");
                $manager->persist($dish);
            }
        }


        // -------------- Menus ---------------- //
        $menus = [
            'Petit trappeur' => 8.00,
            'Menu du chef' => 20.00,
            'Le grand voyage' => 25.00
        ];

        foreach ($menus as $menu_name => $price) {
            $menu = new Menus();
            $menu->setAdmin($user_admin);
            $menu->setTitle($menu_name);
            $menu->setPrice($price);
            $menu->setDescription("$menu_name Proin porttitor, orci nec nonummy molestie mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, pretium a, enim. Pellentesque congue.");
            $manager->persist($menu);
        }

        // -------------- Images ---------------- //
        $images = [
            "image1" => "jed-owen-q6y8xr3soqa-unsplash-63eaaa853dab1900181304-63fe2419dcc01572433692.webp",
            "image2" => "louis-hansel-zbqwr6u-ssk-unsplash-63eaa825d531f563895277.webp",
            "image3" => "brooke-lark-hlncigvui4q-unsplash-63ecd6f32720d966389990-63f67c75dcd73482671475.jpeg",
            "image4" => "matthew-hamilton-ra4mwm9-jka-unsplash-63ecc6b175947233752375.webp",
            "image5" => "toa-heftiba-msxw2vpqzx4-unsplash-63ecd579a337f782518166.webp",
            "image6" => "carlos-fernandez-w3awzjfva6w-unsplash-63ecd8b173fa5025461902.webp"
        ];

        foreach ($images as $title => $image_name) {
            $image = new Images();
            $image->setTitle($title);
            $image->setFile($image_name);
            $image->setAdmin($user_admin);
            $manager->persist($image);
        }


        $manager->flush();
    }
}
