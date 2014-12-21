<?php

namespace Blog\NewsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Blog\NewsBundle\Entity\User;

class LoadUserData extends AbstractFixture implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstName('Jack');
        $user->setLastName('London');
        $user->setEmail('jack@gmail.com');
        $user->setPassword('lkfosadhfoasdfoa');
        $user->setLogin('jjj');

        $manager->persist($user);
        $manager->flush();

        $user = new User();
        $user->setFirstName('ggg');
        $user->setLastName('jjjj');
        $user->setEmail('jack@gmail.com');
        $user->setPassword('lkfosadhfoasdfoa');
        $user->setLogin('iii');

        $manager->persist($user);
        $manager->flush();

        $user = new User();
        $user->setFirstName('ff');
        $user->setLastName('Londddddddon');
        $user->setEmail('jack@gmail.com');
        $user->setPassword('lkfosadhfoasdfoa');
        $user->setLogin('jjdsafaj');

        $manager->persist($user);
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
