<?php

namespace Tests\Component;

use League\Flysystem\Filesystem;
use Tests\BaseTestCase;

class StorageTest extends BaseTestCase
{
    public function testSaveFileOnStorage()
    {
        /** @var Filesystem $storage */
        $storage = dependency(Filesystem::class);
        $testFile = "test_file.txt";
        $content = uniqid('random_text');
        $creationStat = $storage->put($testFile, $content);
        $this->assertTrue($creationStat);
        $this->assertTrue($storage->get($testFile)->exists());
        $this->assertEquals($content, $storage->read($testFile));
        $this->assertTrue($storage->delete($testFile));
    }
}