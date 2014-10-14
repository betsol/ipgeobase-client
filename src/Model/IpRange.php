<?php

namespace Betsol\IpGeoBase\Api\Model;

use Betsol\IpGeoBase\Api\Exception\IpRangeParsingException;


class IpRange
{
    /**
     * @var string
     */
    protected $startIp;

    /**
     * @var string
     */
    protected $endIp;


    /**
     * @param string $startIp
     * @param string $endIp
     */
    public function __construct($startIp, $endIp)
    {
        $this->startIp = (string) $startIp;
        $this->endIp = (string) $endIp;
    }

    /**
     * @return string
     */
    public function getStartIp()
    {
        return $this->startIp;
    }

    /**
     * @param string $startIp
     */
    public function setStartIp($startIp)
    {
        $this->startIp = (string) $startIp;
    }

    /**
     * @return string
     */
    public function getEndIp()
    {
        return $this->endIp;
    }

    /**
     * @param string $endIp
     */
    public function setEndIp($endIp)
    {
        $this->endIp = (string) $endIp;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return ($this->getStartIp() . ' - ' . $this->getEndIp());
    }

    /**
     * @param string $range
     *
     * @throws \Exception
     *
     * @return IpRange
     */
    public static function createFromString($range)
    {
        $range = (string) $range;

        $parts = explode('-', $range, 2);

        if (2 !== count($parts)) {
            throw new IpRangeParsingException('Failed to parse IP range: "' . $range . '".');
        }

        return (new self(
            trim($parts[0]),
            trim($parts[1])
        ));
    }
}