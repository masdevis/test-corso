<?php
namespace Ideato\Bundle\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ideato\Bundle\BlogBundle\Entity\Post;

class LoadPostData extends AbstractFixture implements OrderedFixtureInterface {
    
    public function getOrder() 
    {
        return 2;
    }

    public function load(ObjectManager $em) 
    {

        for($i=0;$i<10;$i++) {
            $post = new Post();
            $post->setTitle("Post title #".$i);
            $post->setContent(" #".$i." lorem ipsum bla bla");
            $post->setPublicationDate(new \DateTime('-'.$i.' days'));

            if($i<3)
                $post->setAuthor ($this->getReference ('cirpo'));
            elseif($i>=3 && $i<7)
                $post->setAuthor ($this->getReference ('devis'));
            else
                $post->setAuthor ($this->getReference ('marco'));

            $em->persist($post);
        }
        $em->flush();
    }
}