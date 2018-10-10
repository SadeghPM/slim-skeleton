<?php

namespace Tests\Functional;

use Tests\BaseTestCase;

class ApiAboutRouteTest extends BaseTestCase
{
    public function testGetApiAboutRoute()
    {
        $response = $this->runApp('get', '/api/v1/');
        $result = json_decode((string)$response->getBody(), true);
        $this->assertArrayHasKey('ok', $result);
        $this->assertArraySubset(['ok' => true], $result);
    }
}