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
}
