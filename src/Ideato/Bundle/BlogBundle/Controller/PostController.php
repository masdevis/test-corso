<?php

namespace Ideato\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ideato\Bundle\BlogBundle\Entity\Post;

class PostController extends Controller
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
        $posts = array();
        return array('posts' => $posts);
    }
    
}
