<?php


namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Post;
use App\Repository\CategoryRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * @property  categoryRepository
 */
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

        $slugList = ['it', 'world', 'sport', 'science'];

        $categotyManager = $manager->getRepository(Category::class);


        for ($i = 0; $i < 5; $i++) {
            foreach ($slugList as $slug) {
                $category = $categotyManager->findBySlug($slug);

                $post = new Post();
                $post->setDescription($faker->sentence(15));
                $post->setCategory($category);
                $post->setDate($date);

                $manager->persist($post);
                $manager->flush();
            }
        }
    }
}
