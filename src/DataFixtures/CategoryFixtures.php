<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    private const CATEGORIES = [
        'it' => 'IT',
        'world' => 'World',
        'sport' => 'Sport',
        'science' => 'Science',
    ];

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        foreach (self::CATEGORIES as $slug => $title) {
            $category = new Category($title, $slug);
            $category->setDescription($faker->sentence(15));

            $manager->persist($category);
        }

        $manager->flush();
    }
}
