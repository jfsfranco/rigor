<?php

namespace RigorTalks;

use PHPUnit\Framework\TestCase;
use RigorTalks\ColdThresholdSource;

/**
 * Class TemperatureTest
 * @package RigorTalks\Tests
 */
class TemperatureTest extends TestCase implements ColdThresholdSource
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

    /**
     * @test
     */
    public function tryToCreateAValidTemperatureWithNamedConstructor()
    {
        $measure = 18;
        $this->assertSame(
            $measure,
            Temperature::take($measure)->measure()
        );
    }

    /**
     * @test
     */
    public function tryToCheckIfAColdTemperatureIsSuperHot()
    {
        $this->markTestSkipped();
        $this->assertFalse(
            Temperature::take(10)->isSuperHot()
        );
    }

    /**
     * @test
     */
    public function tryToCheckIfASuperHotTemperatureIsSuperHot()
    {
        $this->markTestSkipped();
        $this->assertFalse(
            Temperature::take(100)->isSuperHot()
        );
    }

    /**
     * @test
     */
    public function tryToCheckIfASuperColdTemperatureIsSuperCold()
    {
        $this->markTestSkipped();
        $this->assertTrue(
            Temperature::take(10)->isSuperCold(
                // an object that implements ColdThresholdSource
            )
        );
    }

    /**
     * @test
     */
    public function tryToCheckIfASuperColdTemperatureIsSuperColdAnomClass()
    {
        $this->markTestSkipped();
        $this->assertTrue(
            Temperature::take(10)->isSuperCold(
                new class implements ColdThresholdSource {
                    public function getThreshold(): int
                    {
                        return 50;
                    }
                }
            )
        );
    }

    public function getThreshold(): int
    {
        return 50;
    }

}