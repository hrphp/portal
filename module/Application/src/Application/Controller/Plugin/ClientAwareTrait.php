<?php

namespace Application\Controller\Plugin;

trait ClientAwareTrait
{
    /** @var mixed */
    private $client;

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }
}
