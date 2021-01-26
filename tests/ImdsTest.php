<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use BuiltByEleven\Imds\Imds;

class ImdsTest extends TestCase
{
    private $imds;

    public function setUp(): void
    {
        $mock = new MockHandler([
            new Response(200, [], 'i-12345')
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $this->imds = new Imds($client);
    }

    public function testAmiId()
    {
        var_dump($this->imds->amiId());
        $this->assertTrue(true);
    }
}
