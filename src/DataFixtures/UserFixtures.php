<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture {

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $admin = new User();
        $admin->setUsername('admin')
            ->setPassword(
                $this->encoder->encodePassword(
                    $admin,
                    'admin'
                )
            )
            ->setEmail('admin@admin.com')
            ->setFirstname('admin')
            ->setLastname('admin')
            ->setAddress('Lorem ipsum');

        $manager->persist($admin);
        $manager->flush();
    }
}