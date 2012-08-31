<?php

namespace Ideato\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ideato\Bundle\BlogBundle\Entity\Post;
use Ideato\Bundle\BlogBundle\Form\PostType;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/post", name="post_list")
     * @Template()
     */
    public function indexAction()
    {
        $posts = $this->getDoctrine()->getRepository('Ideato\Bundle\BlogBundle\Entity\Post')->findAll();
        return array('posts' => $posts);
    }
    
     /**
     * @Route("/post/new", name="new_post")
     * @Template()
     */
    public function newAction(Request $request)
    {
        $author = $this->getDoctrine()
                ->getRepository('Ideato\Bundle\BlogBundle\Entity\Author')
                ->findOneBy(array('name' => 'devis'));
        $form_type = new PostType();
        $post = new Post();
        
        $form = $this->createForm($form_type,$post);
        
        if($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if($form->isValid())
            {
                $post = $form->getData();
                $post->setPublicationDate(new \DateTime);
                $post->setAuthor($author);
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($post);
                $em->flush();
                
                return $this->redirect($this->generateUrl('post_list'));
            }
        }
        
        return array('form' => $form->createView());
    }
    
}
