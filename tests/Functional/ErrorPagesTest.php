<?php

namespace Tests\Functional;

class ErrorPagesTest extends BaseTestCase
{
    /**
     * test 404 page
     */
    public function testGetNotFoundError()
    {
        $response = $this->runApp('GET', '/not/found');

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertContains('The page not found', (string)$response->getBody());
    }

    /**
     * Test that the index route with optional name argument returns a rendered greeting
     */
    public function testCsrfError()
    {
        $response = $this->runApp('post', '/');

        $this->assertEquals(406, $response->getStatusCode());
        $this->assertContains('The request not acceptable', (string)$response->getBody());
    }
}