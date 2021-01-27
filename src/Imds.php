<?php

namespace BuiltByEleven\Imds;

use ErrorException;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;

class Imds
{
    private $client;
    private $url;

    private $response;
    private $params;

    public function __construct(Client $client, $url = 'http://169.254.169.254')
    {
        $this->client = $client;
        $this->url = $url . '/latest';
    }

    private function getContent()
    {
        try {
            $this->response = $this->client->get(
                $this->url . $this->params,
                [
                    'connect_timeout' => 2
                ]
            );
        } catch (ClientException $exception) {
            throw new ErrorException('client exception');
        } catch (ConnectException $connectException) {
            throw new Exception('Cannot connect to server');
        }

        return $this->response->getBody()->getContents();
    }

    public function amiId()
    {
        $this->params = '/meta-data/ami-id';
        return $this->getContent();
    }

    public function amiLaunchIndex()
    {
        $this->params = '/meta-data/ami-launch-index';
        return $this->getContent();
    }

    public function amiManifestPath()
    {
        $this->params = '/meta-data/ami-manifest-path';
        return $this->getContent();
    }

    public function blockDeviceMapping()
    {
    }

    public function hostname()
    {
        $this->params = '/meta-data/hostname';
        return $this->getContent();
    }

    public function instanceAction()
    {
        $this->params = '/meta-data/instance-action';
        return $this->getContent();
    }

    public function instanceId()
    {
        $this->params = '/meta-data/instance-id';
        return $this->getContent();
    }

    public function instanceLifeCycle()
    {
        $this->params = '/meta-data/instance-life-cycle';
        return $this->getContent();
    }

    public function instanceType()
    {
        $this->params = '/meta-data/instance-type';
        return $this->getContent();
    }

    public function localHostname()
    {
        $this->params = '/meta-data/local-hostname';
        return $this->getContent();
    }

    public function localIpv4()
    {
        $this->params = '/meta-data/local-ipv4';
        return $this->getContent();
    }

    public function mac()
    {
        $this->params = '/meta-data/mac';
        return $this->getContent();
    }

    public function profile()
    {
        $this->params = '/meta-data/profile';
        return $this->getContent();
    }

    public function publicHostname()
    {
        $this->params = '/meta-data/public-hostname';
        return $this->getContent();
    }

    public function publicIpv4()
    {
        $this->params = '/meta-data/public-ipv4';
        return $this->getContent();
    }

    public function reservationId()
    {
        $this->params = '/meta-data/reservation-id';
        return $this->getContent();
    }

    public function securityGroups()
    {
        $this->params = '/meta-data/securityGroups';
        return $this->getContent();
    }
}
