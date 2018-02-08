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
        Temperature::take(-1);
    }

    public function tryToCreateAValidTemperatureWithNamedConstructor()
    {
        $measure = 18;
        $this->assertSame(
            $measure,
            Temperature::take($measure)->measure()
        );
    }

    public function tryToCheckIfAColdTemperatureIsSuperHot()
    {
        $this->markTestSkipped();
        $this->assertFalse(
            Temperature::take(10)->isSuperHot()
        );
    }

    public function tryToCheckIfASuperHotTemperatureIsSuperHot()
    {
        $this->markTestSkipped();
        $this->assertFalse(
            Temperature::take(100)->isSuperHot()
        );

    }

}