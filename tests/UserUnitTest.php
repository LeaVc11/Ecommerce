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
        $this->assertTrue(true);
    }
}
