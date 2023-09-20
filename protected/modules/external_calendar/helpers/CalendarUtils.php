<?php

namespace humhub\modules\external_calendar\helpers;

use Yii;
use DateTime;
use DateTimeZone;

/**
 * Description of CalendarUtils
 *
 * @author David Born ([staxDB](https://github.com/staxDB))
 */
class CalendarUtils
{

    private static $userTimezone;

    const DB_DATE_FORMAT = 'Y-m-d H:i:s';
    const ICAL_TIME_FORMAT        = 'Ymd\THis';
    const ICAL_DATE_FORMAT        = 'Ymd';

    const REGEX_DBFORMAT_DATETIME = '/^(\d{4})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2})$/';

    /**
     *
     * @param DateTime $date1
     * @param DateTime $date2
     * @param bool $endDateMomentAfter
     * @return bool
     */
    public static function isFullDaySpan(DateTime $date1, DateTime $date2, $endDateMomentAfter = false)
    {
        $dateInterval = $date1->diff($date2, true);

        if ($endDateMomentAfter) {
            if ($dateInterval->days > 0 && $dateInterval->h == 0 && $dateInterval->i == 0 && $dateInterval->s == 0) {
                return true;
            }
        } else if ($dateInterval->h == 23 && $dateInterval->i == 59) {
                return true;
        }

        return false;
    }

    public static function isInDbFormat($value)
    {
        return preg_match(self::REGEX_DBFORMAT_DATETIME, $value);
    }

    public static function cleanRecurrentId($recurrentId, $targetTZ = null)
    {
        $date = ($recurrentId instanceof \DateTimeInterface) ? $recurrentId : new DateTime($recurrentId, new DateTimeZone('UTC'));

        if($targetTZ) {
            $date->setTimezone(new DateTimeZone($targetTZ));
        }

        return $date->format(static::ICAL_TIME_FORMAT);
    }

    /**
     * @return DateTimeZone
     */
    public static function getUserTimeZone()
    {
        if(!static::$userTimezone) {
            $tz =  Yii::$app->user->isGuest
                ? Yii::$app->timeZone
                : Yii::$app->user->getTimeZone();

            if(!$tz) {
                $tz = Yii::$app->timeZone;
            }

            if($tz) {
                static::$userTimezone = new DateTimeZone($tz);
            }
        }

        return static::$userTimezone;
    }

    public static function getSystemTimeZone($asString = false)
    {
        return $asString ? Yii::$app->timeZone : new DateTimeZone(Yii::$app->timeZone);
    }

    public static function formatDateTimeToAppTime($string)
    {
        $timezone = new DateTimeZone(Yii::$app->timeZone);
        $datetime = new DateTime($string);
        return $datetime->setTimezone($timezone);
    }

    public static function toDBDateFormat($date)
    {
        if(!$date) {
            return null;
        }

        if(is_string($date)) {
            $date = new DateTime($date);
        }

        return $date->setTimezone(new DateTimeZone(Yii::$app->timeZone))->format(static::DB_DATE_FORMAT);
    }
}
