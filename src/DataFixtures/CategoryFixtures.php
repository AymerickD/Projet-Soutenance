<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture {


    public function load(ObjectManager $manager)
    {
        $abstract = new Category();
        $abstract->setName('abstract');
        $manager->persist($abstract);

        $nature = new Category();
        $nature->setName('nature');
        $manager->persist($nature);

        $tech = new Category();
        $tech->setName('tech');
        $manager->persist($tech);

        $manager->flush();
    }
}