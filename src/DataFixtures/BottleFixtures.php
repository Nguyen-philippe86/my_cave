<?php

namespace App\DataFixtures;

use App\Entity\Bottles;
use App\Entity\Domaine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BottleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $d1 = new Domaine();
        $d1->setName('Chateau de saint cosme')
            ->setCountry('France')
            ->setRegion('Southern Rhone / Girondas')
        ;
        $manager->persist($d1);

        $d2 = new Domaine();
        $d2->setName('Lan rioja')
            ->setCountry('Sapin')
            ->setRegion('Rioja')
        ;
        $manager->persist($d2);

        $d3 = new Domaine();
        $d3->setName('Margerum sybarite')
            ->setCountry('USA')
            ->setRegion('California Central Cosat')
        ;
        $manager->persist($d3);

        $d4 = new Domaine();
        $d4->setName('Owen roe "Ex umbris')
            ->setCountry('USA')
            ->setRegion('Washington')
        ;
        $manager->persist($d4);

        $b1 = new Bottles();
        $b1->setYear(2009)
            ->setGrapes('Grenache / Syrah')
            ->setDescription('The aromas of fruit and spice give one a hint of the light drinkability of this lovely wine, which makes an excellent complement to fish dishes.')
            ->setPicture('saint_cosme.jpg')
            ->setDomaine($d1)
        ;
        $manager->persist($b1);

        $b2 = new Bottles();
        $b2->setYear(2006)
            ->setGrapes('Tempranillo')
            ->setDescription('A resurgence of interest in boutique vineyards has opened the door for this excellent foray into the dessert wine market. Light and bouncy, with a hint of black truffle, this wine will not fail to tickle the taste buds.')
            ->setPicture('lan_rioja.jpg')
            ->setDomaine($d2)
        ;
        $manager->persist($b2);

        $b3 = new Bottles();
        $b3->setYear(2010)
            ->setGrapes('Sauvignon blanc')
            ->setDescription('The cache of a fine Cabernet in ones wine cellar can now be replaced with a childishly playful wine bubbling over with tempting tastes of
            black cherry and licorice. This is a taste sure to transport you back in time.')
            ->setPicture('margerum.jpg')
            ->setDomaine($d1)
        ;
        $manager->persist($b3);

        $b4 = new Bottles();
        $b4->setYear(2009)
            ->setGrapes('Syrah')
            ->setDescription('A one-two punch of black pepper and jalapeno will send your senses reeling, as the orange essence snaps you back to reality. Don\'t miss this award-winning taste sensation.')
            ->setPicture('ex_umbris.jpg')
            ->setDomaine($d1)
        ;
        $manager->persist($b4);

        $manager->flush();
    }
}
