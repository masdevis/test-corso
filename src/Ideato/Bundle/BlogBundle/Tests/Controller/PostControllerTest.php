<?php

namespace Ideato\Bundle\BlogBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/post');

        $this->assertEquals(10, $crawler->filter('div#post_list h1')->count());
        $this->assertEquals('Post title #0', $crawler->filter('div#post_list h1')->eq(0)->text());
    }
    
    public function testNew()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/post/new');

        $form = $crawler->selectButton('go go go!')->form();
        
        $crawler = $client->submit($form, array(
            'post[title]' => 'brand new post',
            'post[content]' => 'new post content'
        ));
        
        $crawler = $client->followRedirect();
        
        $this->assertEquals(11,$crawler->filter('div@post_list h1')->last()->count());
    }
}
