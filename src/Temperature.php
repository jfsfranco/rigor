<?php

namespace RigorTalks;

/**
 * Class Temperature
 * @package RigorTalks
 */
class Temperature
{
    /**
     * @var int
     */
    private $measure;

    /**
     * Temperature constructor.
     * @param int $measure
     * @throws TemperatureNegativeException
     */
    public function __construct(int $measure)
    {
        $this->checkTemperatureIsNotNegative($measure);
        $this->measure = $measure;
    }

    /**
     * @return int
     */
    public function measure(): int
    {
        return $this->measure;
    }

    /**
     * @param int $measure
     * @throws TemperatureNegativeException
     */
    private function checkTemperatureIsNotNegative(int $measure)
    {
        if ($measure <= 0) {
            throw new TemperatureNegativeException("Measure should be positive");
        }
    }
}