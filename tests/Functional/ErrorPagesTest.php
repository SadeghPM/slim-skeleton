<?php

namespace Tests\Functional;

use Tests\BaseTestCase;

class ErrorPagesTest extends BaseTestCase
{
    /**
     * test 404 page
     */
    public function testGetNotFoundError()
    {
        $response = $this->runApp('GET', '/not/found');

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertContains(__('error.404.title'), (string)$response->getBody());
    }

    /**
     * Test that the index route with optional name argument returns a rendered greeting
     */
    public function testCsrfError()
    {
        $response = $this->runApp('post', '/');

        $this->assertEquals(406, $response->getStatusCode());
        $this->assertContains(__('error.406.title'), (string)$response->getBody());
    }
}