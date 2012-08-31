<?php

namespace Ideato\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \Ideato\Bundle\BlogBundle\Entity\Post;

class DefaultController extends Controller
{
    /**
     * @Route("/ciao/{name}")
     * @Template()
     */
    public function ciaoAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route("/post")
     * @Template()
     */
    public function indexAction()
    {
        return array('posts' => $posts);
    }

    /**
     * @Route("/fixture")
     * @Template()
     */
    public function fixtureAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        for($i=0;$i<10;$i++) {
            $post = new Post();
            $post->setTitle("Post title #".$i);
            $post->setContent(" #".$i." lorem ipsum bla bla");
            $post->setPublicationDate(new \DateTime('-'.$i.' days'));
            //$posts[] = $post;
            
            $em->persist($post);
        }
        $em->flush();
        return array("posts" => $posts);
    }
}
