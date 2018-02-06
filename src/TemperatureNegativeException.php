<?php

namespace RigorTalks;

/**
 * Class TemperatureNegativeException
 * @package RigorTalks
 */
class TemperatureNegativeException extends \Exception
{
    /**
     * @param int $measure
     * @return TemperatureNegativeException
     */
    public static function fromMeasure(int $measure): TemperatureNegativeException
    {
        return new self(
            sprintf("Measure %d should be positive", $measure)
        );
    }
}