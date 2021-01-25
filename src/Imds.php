<?php

use GuzzleHttp\Client;

class Imds
{
    private $client;
    private $url;

    public function __construct()
    {
        $this->client = new Client();
        $this->url = 'http://169.254.169.254/latest';
    }

    public function getAmiId()
    {
        $params = '/meta-data/ami-id';
        $response = $this->client->get($this->url . $params);
        return $response->getBody();
    }
}
