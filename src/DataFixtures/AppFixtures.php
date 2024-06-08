<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
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
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 5; ++$i) {
            $user = new User();

            $user->setEmail($faker->email())
                ->setFirstname($faker->firstName())
                ->setLastname($faker->lastName());

            $user->setPassword($this->hasher->hashPassword($user, 'user'));

            $manager->persist($user);

            $manager->flush();
        }
    }
}
