<?php

namespace Betsol\IpGeoBase\Api\Model;


class IpLookupResponse
{
    /**
     * @var IpRange
     */
    protected $ipRange;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $region;

    /**
     * @var string
     */
    protected $district;

    /**
     * @var GeoCoordinates
     */
    protected $coordinates;


    /**
     * @return IpRange
     */
    public function getIpRange()
    {
        return $this->ipRange;
    }

    /**
     * @param IpRange $ipRange
     */
    public function setIpRange($ipRange)
    {
        $this->ipRange = $ipRange;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = (string) $country;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = (string) $city;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param string $region
     */
    public function setRegion($region)
    {
        $this->region = (string) $region;
    }

    /**
     * @return string
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param string $district
     */
    public function setDistrict($district)
    {
        $this->district = (string) $district;
    }

    /**
     * @return GeoCoordinates
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param GeoCoordinates $coordinates
     */
    public function setCoordinates($coordinates)
    {
        $this->coordinates = $coordinates;
    }
}
