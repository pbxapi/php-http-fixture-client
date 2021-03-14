<?php

namespace Pbxapi\Http\Fixture\Tests;

use PHPUnit\Framework\TestCase;
use Pbxapi\Http\Fixture\MockNotFoundException;

class MockNotFoundExceptionTest extends TestCase
{
    /**
     * @test
     */
    public function itCanGetPossiblePaths()
    {
        $paths = ['path1', 'path2'];
        $exception = new MockNotFoundException('message', $paths);

        $this->assertSame($paths, $exception->getPossiblePaths());
    }
}
