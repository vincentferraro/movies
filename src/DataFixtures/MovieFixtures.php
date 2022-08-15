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
       $movie -> setTitle('The Dark Night');
       $movie -> setReleaseYear(2008);
       $movie -> setDescription('This is an description of the Dark Night');
       $movie -> setImagePath('https://cdn.pixabay.com/photo/2021/06/18/11/22/batman-6345897_1280.jpg');
      
        //ADD DATA to PIVOT TABLE
       $movie->addActor($this->getReference('actor_1'));
       $movie->addActor($this->getReference('actor_2'));

        $manager->persist($movie);

        $movie2 = new Movie();
        $movie2 -> setTitle('Avengers:Endgame');
        $movie2 -> setReleaseYear(2019);
        $movie2 -> setDescription('This is an description of the Avengers: End game');
        $movie2 -> setImagePath('https://cdn.pixabay.com/photo/2020/07/02/19/36/marvel-5364165_1280.jpg');
        
        //ADD DATA to PIVOT TABLE
       $movie2->addActor($this->getReference('actor_3'));
       $movie2->addActor($this->getReference('actor_4'));

        $manager->persist($movie2);

        $manager->flush();
    } 
}
