<?php

namespace TenantCloud\RentlerSDK\Common;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;

/**
 * @method self  setTicks(int $ticks)
 * @method int   getTicks()
 * @method bool  hasTicks()
 * @method self  setDays(int $days)
 * @method int   getDays()
 * @method bool  hasDays()
 * @method self  setHours(int $hours)
 * @method int   getHours()
 * @method bool  hasHours()
 * @method self  setMilliseconds(int $milliseconds)
 * @method int   getMilliseconds()
 * @method bool  hasMilliseconds()
 * @method self  setMinutes(int $minutes)
 * @method int   getMinutes()
 * @method bool  hasMinutes()
 * @method self  setSeconds(int $seconds)
 * @method int   getSeconds()
 * @method bool  hasSeconds()
 * @method self  setTotalDays(float $totalDays)
 * @method float getTotalDays()
 * @method bool  hasTotalDays()
 * @method self  setTotalHours(float $totalHours)
 * @method float getTotalHours()
 * @method bool  hasTotalHours()
 * @method self  setTotalMilliseconds(float $totalMilliseconds)
 * @method float getTotalMilliseconds()
 * @method bool  hasTotalMilliseconds()
 * @method self  setTotalMinutes(float $totalMinutes)
 * @method float getTotalMinutes()
 * @method bool  hasTotalMinutes()
 * @method self  setTotalSeconds(float $totalSeconds)
 * @method float getTotalSeconds()
 * @method bool  hasTotalSeconds()
 */
class TimeSpanDTO extends CamelDataTransferObject
{
	protected array $fields = [
		'ticks',
		'days',
		'hours',
		'milliseconds',
		'minutes',
		'seconds',
		'totalDays',
		'totalHours',
		'totalMilliseconds',
		'totalMinutes',
		'totalSeconds',
	];
}
