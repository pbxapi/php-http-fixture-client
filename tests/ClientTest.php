<?php

namespace Pbxapi\Http\Fixture\Tests;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Uri;
use PHPUnit\Framework\TestCase;
use Pbxapi\Http\Fixture\Client;
use Pbxapi\Http\Fixture\ResponseBuilderInterface;

class ClientTest extends TestCase
{
    /**
     * @test
     */
    public function itCanSendARequest()
    {
        $request = new Request('GET', new Uri('http://example.com'));
        /** @var \PHPUnit\Framework\MockObject\MockObject&\Pbxapi\Http\Fixture\ResponseBuilderInterface $responseBuilder */
        $responseBuilder = $this->getMockBuilder(ResponseBuilderInterface::class)->getMock();
        $responseBuilder->expects($this->once())
            ->method('build')
            ->with($request)
            ->willReturn(new Response());

        $client = new Client($responseBuilder);
        $client->sendRequest($request);
    }
}
