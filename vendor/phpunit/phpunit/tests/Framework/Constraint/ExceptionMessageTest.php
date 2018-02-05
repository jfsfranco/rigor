<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPUnit\Framework\Constraint;

use PHPUnit\Framework\TestCase;

class ExceptionMessageTest extends TestCase
{
    /**
     * @expectedException \Exception
     * @expectedExceptionMessage A literal TemperatureException message
     */
    public function testLiteralMessage()
    {
        throw new \Exception('A literal TemperatureException message');
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage A partial
     */
    public function testPartialMessageBegin()
    {
        throw new \Exception('A partial TemperatureException message');
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage partial TemperatureException
     */
    public function testPartialMessageMiddle()
    {
        throw new \Exception('A partial TemperatureException message');
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage TemperatureException message
     */
    public function testPartialMessageEnd()
    {
        throw new \Exception('A partial TemperatureException message');
    }
}
