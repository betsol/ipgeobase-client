# IpGeoBase API Client

[![Latest Stable Version](https://poser.pugx.org/betsol/ipgeobase-client/v/stable.svg)](https://packagist.org/packages/betsol/ipgeobase-client)
[![License](https://poser.pugx.org/betsol/ipgeobase-client/license.svg)](https://packagist.org/packages/betsol/ipgeobase-client)

## Description

This library for *PHP 5* provides you with convenient object-oriented access
to [IPGeoBase][ipgeobase] XML API.

*IpGeoBase* is a free service that allows you to resolve Russian and Ukrainian
IP adresses into geographical locations with the maximum precision of a city.
Database has a daily updates.

### Features

- Uses latest [Guzzle 5][guzzle] library to communicate over HTTP
- [PSR standards][psr-standards] compliant
- Supports [Composer][composer]
- Returns response in convenient and easy to use [models][models]
- Provides distinguishable catchable [exceptions][exceptions]
- Available for commercial products for free ([MIT license](#license))

## Installation

Install library with *Composer*:

`composer require betsol/ipgeobase-client`

## Usage

```php

// Creating a client:
$ipGeoBaseClient = new Betsol\IpGeoBase\Api\Client;

// You can pass API's base URL to it if required:
$ipGeoBaseClient = new Betsol\IpGeoBase\Api\Client('http://ipgeobase.ru:7020');

// Looking up IP address:
$response = $ipGeoBaseClient->lookupIp('93.184.216.119');

// Getting country:
$response->getCountry();
// "RU"

// Getting city:
$response->getCity();
// "Москва"

// Getting region:
$response->getRegion();
// "Москва"

// Getting district:
$response->getDistrict();
// "Центральный федеральный округ"

// Accessing IP range:
$ipRange = $response->getIpRange();

$ipRange->getStartIp();
// "213.180.200.192"

$ipRange->getEndIp();
// "213.180.208.255"

// Returning IP range as a string:
(string) $ipRange;
// "213.180.200.192 - 213.180.208.255"

// Accessing coordinates:
$coordinates = $response->getCoordinates()

$coordinates->getLatitude();
// float(55.755787)

$coordinates->getLongitude();
// float(37.617634)

// Returning coordinates as a string:
(string) $coordinates;
// string(20) "55.755787, 37.617634"

```

## Feedback

If you have found a bug or have another issue with the library - please [create an issue][new-issue]
in this GitHub repository.

If you have a question - file it with [StackOverflow][so-ask] and send me a
link to [s.fomin@betsol.ru][email]. I will be glad to help.

Have any ideas or propositions? Feel free to contact me by [E-Mail][email].

Cheers!

# Sponsor

This library is sponsored by [Winners Academy][winners-academy].

## License

The MIT License (MIT)

Copyright (c) 2014 Slava Fomin II

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.

[models]:          Model/
[exceptions]:      Exception/
[ipgeobase]:       http://ipgeobase.ru/
[so-ask]:          http://stackoverflow.com/questions/ask
[email]:           mailto:s.fomin@betsol.ru
[new-issue]:       //github.com/betsol/ipgeobase-client/issues/new
[guzzle]:          http://guzzle.readthedocs.org/en/latest/
[composer]:        https://getcomposer.org/
[psr-standards]:   http://www.php-fig.org/
[winners-academy]: http://winnersacademy.ru/
