<?php

namespace RigorTalks;

/**
 * Class TemperatureNegativeException
 * @package RigorTalks
 */
class TemperatureNegativeException extends \Exception
{
    public static function fromMeasure(int $measure)
    {
        return static(
          sprintf("Measure %d must be positive", $measure)
        );
    }
}