<?php

namespace Betsol\IpGeoBase\Api;

use Betsol\IpGeoBase\Api\Exception\GenericException;
use Betsol\IpGeoBase\Api\Exception\IncorrectRequestException;
use Betsol\IpGeoBase\Api\Exception\IpNotFoundException;

use Betsol\IpGeoBase\Api\Model\GeoCoordinates;
use Betsol\IpGeoBase\Api\Model\IpLookupResponse;
use Betsol\IpGeoBase\Api\Model\IpRange;

Use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Message\ResponseInterface;


/**
 * Class Client
 *
 * @package Betsol\IpGeoBase\Api\Client
 */
class Client extends GuzzleClient
{
    const DEFAULT_BASE_URL = 'http://ipgeobase.ru:7020';

    /**
     * @param string|null $baseUrl
     */
    public function __construct($baseUrl = null)
    {
        // Calling parent constructor for Guzzle Client.
        parent::__construct([
            'base_url' => ($baseUrl ? $baseUrl : self::DEFAULT_BASE_URL),
            'defaults' => [
                'headers' => [
                    'User-Agent' => 'betsol-ipgeobase',
                ],
            ],
        ]);
    }

    /**
     * @param string $ip Lookup IP address
     *
     * @throws \Exception
     *
     * @return IpLookupResponse
     */
    public function lookupIp($ip)
    {
        /** @var ResponseInterface $response */
        $response = $this->get('/geo', [
            'query' => [
                'ip' => $ip,
            ],
        ]);

        $xmlResponse = $response->xml();

        if (!property_exists($xmlResponse, 'ip') || count($xmlResponse->ip) <= 0) {
            throw new IncorrectRequestException('Failed to lookup IP, request is incorrect for IP: "' . $ip . '".');
        }

        $responseData = $xmlResponse->ip[0];

        if (property_exists($responseData, 'message')) {

            $message = (string) $responseData->message;

            switch ($message) {
                case 'Not found':
                    throw new IpNotFoundException('IP not found: "' . $ip . '".');
                default:
                    throw new GenericException('Unknown exception: "' . $message . '" for IP: "' . $ip . '".');
            }
        }

        $lookupResponse = new IpLookupResponse;

        $lookupResponse->setIpRange(
            IpRange::createFromString(
                $responseData->inetnum
            )
        );

        $lookupResponse->setCountry(
            $responseData->country
        );

        $lookupResponse->setCity(
            $responseData->city
        );

        $lookupResponse->setRegion(
            $responseData->region
        );

        $lookupResponse->setDistrict(
            $responseData->district
        );

        $lookupResponse->setCoordinates(
            new GeoCoordinates(
                $responseData->lat,
                $responseData->lng
            )
        );

        return $lookupResponse;
    }
}