<?php

namespace TenantCloud\RentlerSDK\Enums;

use TenantCloud\Standard\Enum\ValueEnum;

/**
 * @extends ListingType<string>
 */
final class ListingType extends ValueEnum
{
	public static self $UNDEFINED;

	public static self $HOUSE;

	public static self $APARTMENT;

	public static self $CONDO;

	public static self $MULTIPLEX;

	public static self $TOWNHOME;

	public static self $IN_LAW_BASEMENT;

	public static self $SINGLE_ROOM;

	public static self $SUB_LEASE;

	public static self $UNIVERSITY_APARTMENT;

	public static self $RESIDENCE_HALL;

	public static self $OTHER;

	protected static function initializeInstances(): void
	{
		self::$UNDEFINED = new self('Undefined');
		self::$HOUSE = new self('House');
		self::$APARTMENT = new self('Apartment');
		self::$CONDO = new self('Condo');
		self::$MULTIPLEX = new self('Multiplex');
		self::$TOWNHOME = new self('Townhome');
		self::$IN_LAW_BASEMENT = new self('InLawBasement');
		self::$SINGLE_ROOM = new self('SingleRoom');
		self::$SUB_LEASE = new self('SubLease');
		self::$UNIVERSITY_APARTMENT = new self('UniversityApartment');
		self::$RESIDENCE_HALL = new self('ResidenceHall');
		self::$OTHER = new self('Other');
	}
}
