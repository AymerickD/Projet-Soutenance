<?php

namespace App\DataFixtures;

use App\Entity\Artwork;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $artwork = new Artwork();
        // $manager->persist($artwork);

        $manager->flush();
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        $faker->addProvider(new \Liior\Faker\Prices($faker));

        for ($i = 0; $i < 10; $i++) {
            $artwork = new Artwork();
            $artwork->setTitle($faker->artworkName)
                ->setPrice($faker->price(20, 200))
                ->setGallery($faker->imageUrl(400, 400));

            $manager->persist($artwork);
        }
        $manager->flush();

    }
}
