<?php

namespace Wordpress\Support\DateTime;

/**
 * helper class for date time manipulation
 * check supported timeZone list
 * @link https://www.php.net/manual/en/timezones.php
 */
class WpCarbon extends \DateTime
{
    public function __construct(string $dateTime = 'now', ?string $timezone = null)
    {
        $timezone ??= 'Africa/Cairo';
        $dateTimeZone = new \DateTimeZone($timezone);
        parent::__construct($dateTime, $dateTimeZone);
    }
}
