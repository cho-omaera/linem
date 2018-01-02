<?php
namespace App\Classes;

use GuzzleHttp\ClientInterface;
use Monolog\Logger;
use Psr\Container\ContainerInterface;

abstract class Client
{
    /**
     * @const array NODES
     */
    const NODES = [
        'alice2.nem.ninja',
        'alice3.nem.ninja',
        'alice4.nem.ninja',
        'alice5.nem.ninja',
        'alice6.nem.ninja',
        'alice7.nem.ninja'
    ];

    /**
     * @const int PORT
     */
    const PORT = 7890;

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Logger
     */
    protected $logger;

    /**
     * @var string
     */
    protected $node;

    /**
     * Controller constructor.
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->client = $container['client'];
        $this->logger = $container['logger'];
        $this->node = self::NODES[rand(0, count(self::NODES) - 1)];
    }

    /**
     * @param string $url
     *
     * @return array
     */
    protected function get($url)
    {
        $url = $this->generateUrl($url);
        $ret = $this->client->request('GET', $url);

        return json_decode($ret->getBody(), true);
    }

    /**
     * @param string $url
     * @return string
     */
    private function generateUrl($url)
    {
        return 'http://' . $this->node . ':' . self::PORT . $url;
    }
}