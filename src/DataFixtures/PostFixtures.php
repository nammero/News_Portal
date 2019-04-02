<?php


namespace App\DataFixtures;


use App\Entity\Category;
use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Provider\DateTime;

class PostFixtures extends Fixture
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        $date = new \DateTime();
        $cat = new Category('IT', 'it');

//        for ($i = 0; $i < 10; $i++) {
            $post = new Post();
            $post->setDescription($faker->sentence(15));
            $post->setCategory($cat);
//            $post->setDate($date);


            $manager->persist($post);
            $manager->flush();
//        }


    }
}