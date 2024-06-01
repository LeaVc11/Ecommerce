<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();

        $user->setEmail('true@test.com')
             ->setFirstName('prenom')
             ->setLastName('nom')
             ->setPassword('password');

        $this->assertTrue($user->getEmail() ==='true@test.com');
        $this->assertTrue($user->getFirstname() ==='prenom');
        $this->assertTrue($user->getLastname() ==='nom');
        $this->assertTrue($user->getPassword() ==='password');

    }
    public function testIsFalse(): void
    {
        $user = new User();

        $user->setEmail('true@test.com')
            ->setFirstName('prenom')
            ->setLastName('nom')
            ->setPassword('password');

        $this->assertFalse($user->getEmail() ==='false@test.com');
        $this->assertFalse($user->getFirstname() ==='false');
        $this->assertFalse($user->getLastname() ==='false');
        $this->assertFalse($user->getPassword() ==='false');

    }
    public function testIsEmpty(): void
    {
        $user = new User();

        $this->assertEmpty($user->getEmail());
        $this->assertEmpty($user->getFirstname());
        $this->assertEmpty($user->getLastname());
        $this->assertEmpty($user->getPassword());


    }
}
