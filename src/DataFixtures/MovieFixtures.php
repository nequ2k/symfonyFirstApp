<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('The Dark Knight');
        $movie->setReleaseYear(2008);
        $movie->setDescription('This is the description of the dark knight');
        $movie->setImagePath('https://cdn.pixabay.com/photo/2017/04/13/14/15/mcdonalds-2227657_1280.jpg');
        $movie->addActor($this->getReference('actor_1'));
        $movie->addActor($this->getReference('actor_2'));
        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2->setTitle('Avengers: Endgame');
        $movie2->setReleaseYear(2019);
        $movie2->setDescription('This is the description of Avengers');
        $movie2->setImagePath('https://cdn.pixabay.com/photo/2022/06/05/11/18/action-figures-7243811_1280.jpg');
        $movie->addActor($this->getReference('actor_3'));
        $movie->addActor($this->getReference('actor_4'));
        $manager->persist($movie2);

        $manager->flush();

    }
}
