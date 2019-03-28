<?php

namespace App\DataFixtures;

use App\Model\Money;
use App\Model\Price;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Finder\Finder;
use App\Model\Product;
use App\Model\Category;

class AppFixtures extends Fixture
{
    private $seedDirectory = '/data/seeds';

    public function load(ObjectManager $manager)
    {
        $finder = new Finder();
        $finderSeed = $finder->in( __DIR__ . '/../..' . $this->seedDirectory);

        $categoryRepository = $manager->getRepository(Category::class);

        foreach ($finderSeed as $file) {

            $content = file_get_contents($file->getRealPath());
            $json = json_decode($content, true);

            foreach ($json as $seedName => $seedList) {
                foreach ($seedList as $crtSeed) {
                    if($seedName == 'products') {
                        $product = new Product();
                        $product->setName($crtSeed['name']);

                        $category = $categoryRepository->findOneBy(['name' => $crtSeed['category'] ]);

                        $product->setSku($crtSeed['sku']);
                        // add price
                        $price = new Price();
                        $price->setValue(
                            Money::fromCurrencyAndAmount('USD', $crtSeed['price'] * 100) // store amount as cent
                        );
                        $product->setPrices([$price]);

                        $product->setQuantity($crtSeed['quantity']);
                        $manager->persist($product);

                        if (!$category) {
                            $category = new Category();
                            $category->setName($crtSeed['category']);
                        }

                        $category->setProduct($product);
                        $manager->persist($category);

                    } elseif ($seedName == 'user') {
//                        $user = new User();
//                        $user->setUsername($crtSeed['name']);
//                        $user->setEmail($crtSeed['email']);
//                        $manager->persist($user);
                    }
                }
            }

        }
        $manager->flush();
    }
}