<?php

namespace Emag\ScmFaqBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertContains('Hello, this will be the best Faq Bundle for Symfony :)', $client->getResponse()->getContent());
    }
}
