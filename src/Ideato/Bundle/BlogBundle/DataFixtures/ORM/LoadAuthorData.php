<?php
namespace Ideato\Bundle\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ideato\Bundle\BlogBundle\Entity\Author;

class LoadAuthorData extends AbstractFixture implements OrderedFixtureInterface {
    
    public function getOrder() 
    {
        return 1;
    }

    public function load(ObjectManager $em) 
    {
        $author = new Author();
        $author->setName("cirpo");
        $this->setReference('cirpo',$author);
        $em->persist($author);
        
        $author1 = new Author();
        $author1->setName("devis");
        $this->setReference('devis',$author1);
        $em->persist($author1);

        $author2 = new Author();
        $author2->setName("marco");
        $this->setReference('marco',$author2);
        $em->persist($author2);
        
        $em->flush();
    }
}
