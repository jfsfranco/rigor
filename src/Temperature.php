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
    private function __construct(int $measure)
    {
        $this->setMeasure($measure);
    }

    /**
     * @param int $measure
     */
    private function setMeasure(int $measure)
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
            throw TemperatureNegativeException::fromMeasure($measure);
        }
    }

    /**1
     * @param $measure
     * @return Temperature
     */
    public static function take($measure): Temperature
    {
        return new static($measure);
//        return new self($measure);
    }

    /**
     * @return bool
     */
    public function isSuperHot(): bool
    {
        $threshold = $this->getThreshold();

        return $this->measure() > $threshold;
    }

    /**
     * @return mixed
     */
    private function getThreshold()
    {
        $conn = \Doctrine\DBAL\DriverManager::getConnection(array(
            'dbname' => 'mydb',
            'user' => 'user',
            'password' => 'secret',
            'host' => 'localhost',
            'driver' => 'pdo_mysql',
        ), new \Doctrine\DBAL\Configuration());

        $threshold = $conn->fetchColumn("select * from config");
        return $threshold;
    }

    public function isSuperCold(ColdThresholdSource $coldThresholdSource)
    {
        $threshold = $coldThresholdSource->getThreshold();
        return $this->measure() < $threshold;
    }
}