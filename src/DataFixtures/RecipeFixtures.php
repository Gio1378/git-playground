<?php

namespace App\DataFixtures;

use App\Entity\Recipes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class RecipeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        $numberOfRecipes = 150;


        for ($i = 0; $i < $numberOfRecipes; $i++) {
            $recipe = new Recipes();
            $recipe->setName($faker->sentence(5,true))
                ->setMaking($faker->text(300))
                ->setImage($faker->image('assets/image'))
                ->setIngredients($faker->sentence(6));


            $this->setReference("recipe_$i", $recipe);

            $manager->persist($recipe);
        }

        $manager->flush();
    }
}
