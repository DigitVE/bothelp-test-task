<?php

namespace App\Tests\Feature;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;

class EventControllerTest extends WebTestCase
{
    public function testEventHandler(): void
    {
        $client = static::createClient();

        $client->request(Request::METHOD_POST, '/event/handle', [], [], [], json_encode([["account_id" => 1,"event_id" => 1]]));

        $this->assertResponseIsSuccessful();
        $this->assertEquals('{"success":true}', $client->getResponse()->getContent());
    }
}
