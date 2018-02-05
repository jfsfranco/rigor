<?php

namespace RigorTalks;

use PHPUnit\Framework\TestCase;

/**
 * Class TemperatureTest
 * @package RigorTalks\Tests
 */
class TemperatureTest extends TestCase
{
    public function test()
    {
        $this->assertSame("true", "true");
    }

    /**
     * @test
     * @expectedException \Exception
     */
    public function tryToCreateANonValidTemperature()
    {
        new Temperature(-1);
    }

    /**
     * @test
     */
    public function tryToCreateAValidTemperature()
    {
        $measure = 18;
        $measure2 = (new Temperature($measure))->measure();
        $this->assertSame(
            $measure,
            $measure2
        );
    }

}