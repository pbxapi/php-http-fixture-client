<?php

namespace Swis\Http\Fixture;

use Http\Message\ResponseFactory;
use Http\Mock\Client as MockClient;
use Psr\Http\Message\RequestInterface;

class Client extends MockClient
{
    /**
     * @var \Swis\Http\Fixture\ResponseBuilderInterface
     */
    protected $fixtureResponseBuilder;

    /**
     * @param \Swis\Http\Fixture\ResponseBuilderInterface $fixtureResponseBuilder
     * @param \Http\Message\ResponseFactory|null          $responseFactory
     */
    public function __construct(ResponseBuilderInterface $fixtureResponseBuilder, ResponseFactory $responseFactory = null)
    {
        parent::__construct($responseFactory);

        $this->fixtureResponseBuilder = $fixtureResponseBuilder;
    }

    /**
     * @param \Psr\Http\Message\RequestInterface $request
     *
     * @throws \Http\Client\Exception
     * @throws \Exception
     *
     * @return \Psr\Http\Message\ResponseInterface|mixed|null
     */
    public function sendRequest(RequestInterface $request)
    {
        $this->setDefaultResponse($this->fixtureResponseBuilder->build($request));

        return parent::sendRequest($request);
    }
}