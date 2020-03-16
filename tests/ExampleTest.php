<?php

namespace Zunky44\Aakashsms\Tests;

use Orchestra\Testbench\TestCase;
use Zunky44\Aakashsms\AakashsmsServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [AakashsmsServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
