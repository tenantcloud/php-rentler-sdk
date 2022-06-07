<?php

namespace TenantCloud\RentlerSDK\Enums;

use TenantCloud\Standard\Enum\ValueEnum;

class ListingAmenity extends ValueEnum
{
	public const GROUP_DEFAULT = 'default';
	public const GROUP_WASHERDRYER = 'washerdryer';
	public const GROUP_PARKING = 'parking';
	public const GROUP_AIRCONDITIONING = 'airconditioning';

	/** @see self::GROUP_DEFAULT */
	public static self $DISHWASHER;

	public static self $HANDICAP_ACCESSIBLE;

	public static self $TILE;

	public static self $FIREPLACE;

	public static self $REMODELED;

	public static self $NEW_COUNTERTOPS;

	public static self $NEW_PAINT;

	public static self $STORAGE;

	public static self $HOT_TUB;

	public static self $VIEW;

	public static self $INTERNET_READY;

	public static self $HARDWOOD_FLOORS;

	public static self $WALK_IN_CLOSETS;

	public static self $ALARM;

	public static self $NEW_CARPET;

	public static self $POOL;

	public static self $DECK;

	public static self $FENCED_YARD;

	public static self $FURNISHED;

	public static self $UNFURNISHED;

	public static self $COMMUNITY_FITNESS;

	public static self $COMMUNITY_TENNIS;

	public static self $COMMUNITY_BASKETBALL;

	public static self $COMMUNITY_VOLLEYBALL;

	public static self $COMMUNITY_CLUBHOUSE;

	public static self $COMMUNITY_BUSINESS_CENTER;

	public static self $COMMUNITY_PLAYGROUND;

	public static self $COMMUNITY_LAUNDRY;

	public static self $COMMUNITY_POOL;

	public static self $COMMUNITY_HOT_TUB;

	public static self $COMMUNITY_PARK;

	public static self $COMMUNITY_BBQ;

	public static self $COMMUNITY_PET_WASHING_STATION;

	public static self $COMMUNITY_DOG_PARK;

	public static self $COMMUNITY_SPLASH_PAD;

	public static self $COMMUNITY_GAME_ROOM;

	public static self $COMMUNITY_THEATER_ROOM;

	public static self $COMMUNITY_ELEVATOR_ACCESS;

	public static self $COMMUNITY_CONTROLLED_ACCESS;

	public static self $COMMUNITY_PUBLIC_TRANSIT;

	public static self $COMMUNITY_WIFI_ACCESS;

	public static self $COMMUNITY_ATTACHED_GARAGE;

	public static self $COMMUNITY_BIKE_LOCKERS_STORAGE;

	public static self $COMMUNITY_GARDEN;

	public static self $COMMUNITY_PARCEL_PENDING;

	public static self $COMMUNITY_FIRE_PITS;

	public static self $COMMUNITY_INTERNET_CAFE;

	/** @see self::GROUP_WASHERDRYER */
	public static self $WASHER_DRYER_IN_UNIT;

	public static self $WASHER_DRYER_ON_SITE;

	public static self $WASHER_DRYER_HOOK_UPS;

	public static self $WASHER_DRYER_OTHER;

	public static self $WASHER_DRYER_NONE;

	/** @see self::GROUP_PARKING */
	public static self $PARKING_GARAGE;

	public static self $PARKING_ON_STREET;

	public static self $PARKING_DEDICATED_SPOT;

	public static self $PARKING_DRIVEWAY;

	public static self $PARKING_COVERED;

	public static self $PARKING_PRIVATE_LOT;

	public static self $PARKING_CALL_FOR_AVAILABILITY;

	public static self $PARKING_OTHER;

	public static self $PARKING_NONE;

	/** @see self::GROUP_AIRCONDITIONING */
	public static self $AIR_CONDITIONING_CENTRAL_AIR;

	public static self $AIR_CONDITIONING_WINDOW_UNIT;

	public static self $AIR_CONDITIONING_EVAPORATIVE_COOLER;

	public static self $AIR_CONDITIONING_OTHER;

	public static self $AIR_CONDITIONING_NONE;

	private string $label;

	private string $group;

	protected function __construct($value, string $label, string $group = self::GROUP_DEFAULT)
	{
		parent::__construct($value);

		$this->label = $label;
		$this->group = $group;
	}

	public function __toString(): string
	{
		return $this->value();
	}

	protected static function initializeInstances(): void
	{
		self::$DISHWASHER = new self('dishwasher', 'Dishwasher', self::GROUP_DEFAULT);
		self::$HANDICAP_ACCESSIBLE = new self('handicapaccessible', 'Handicap accessible', self::GROUP_DEFAULT);
		self::$TILE = new self('tile', 'Tile', self::GROUP_DEFAULT);
		self::$FIREPLACE = new self('fireplace', 'Fireplace', self::GROUP_DEFAULT);
		self::$REMODELED = new self('remodeled', 'Newly remodeled', self::GROUP_DEFAULT);
		self::$NEW_COUNTERTOPS = new self('upgradedcountertops', 'New countertops', self::GROUP_DEFAULT);
		self::$NEW_PAINT = new self('newpaint', 'New paint', self::GROUP_DEFAULT);
		self::$STORAGE = new self('storage', 'Storage', self::GROUP_DEFAULT);
		self::$HOT_TUB = new self('hottub', 'Hot tub', self::GROUP_DEFAULT);
		self::$VIEW = new self('view', 'View', self::GROUP_DEFAULT);
		self::$INTERNET_READY = new self('internetready', 'Internet ready', self::GROUP_DEFAULT);
		self::$HARDWOOD_FLOORS = new self('hardwood', 'Hardwood floors', self::GROUP_DEFAULT);
		self::$WALK_IN_CLOSETS = new self('walkinclosets', 'Walk-in closets', self::GROUP_DEFAULT);
		self::$ALARM = new self('alarm', 'Alarm', self::GROUP_DEFAULT);
		self::$NEW_CARPET = new self('newcarpet', 'New carpet', self::GROUP_DEFAULT);
		self::$POOL = new self('pool', 'Pool', self::GROUP_DEFAULT);
		self::$DECK = new self('deck', 'Deck', self::GROUP_DEFAULT);
		self::$FENCED_YARD = new self('fencedyard', 'Fenced yard', self::GROUP_DEFAULT);
		self::$FURNISHED = new self('furnished', 'Furnished', self::GROUP_DEFAULT);
		self::$UNFURNISHED = new self('unfurnished', 'Unfurnished', self::GROUP_DEFAULT);

		// Community
		self::$COMMUNITY_FITNESS = new self('fitness', 'Fitness Center', self::GROUP_DEFAULT);
		self::$COMMUNITY_TENNIS = new self('tennis', 'Tennis Court', self::GROUP_DEFAULT);
		self::$COMMUNITY_BASKETBALL = new self('basketball', 'Basketball Court', self::GROUP_DEFAULT);
		self::$COMMUNITY_VOLLEYBALL = new self('volleyball', 'Volleyball Court', self::GROUP_DEFAULT);
		self::$COMMUNITY_CLUBHOUSE = new self('clubhouse', 'Clubhouse', self::GROUP_DEFAULT);
		self::$COMMUNITY_BUSINESS_CENTER = new self('businesscenter', 'Business Center', self::GROUP_DEFAULT);
		self::$COMMUNITY_PLAYGROUND = new self('playground', 'Playground', self::GROUP_DEFAULT);
		self::$COMMUNITY_LAUNDRY = new self('laundry', 'Onsite Laundry', self::GROUP_DEFAULT);
		self::$COMMUNITY_POOL = new self('pool', 'Pool', self::GROUP_DEFAULT);
		self::$COMMUNITY_HOT_TUB = new self('hottub', 'Hot Tub', self::GROUP_DEFAULT);
		self::$COMMUNITY_PARK = new self('park', 'Near Park', self::GROUP_DEFAULT);
		self::$COMMUNITY_BBQ = new self('bbq', 'Bbq Area', self::GROUP_DEFAULT);
		self::$COMMUNITY_PET_WASHING_STATION = new self('petwashingstation', 'Pet Washing Station', self::GROUP_DEFAULT);
		self::$COMMUNITY_DOG_PARK = new self('dogpark', 'Dog Park', self::GROUP_DEFAULT);
		self::$COMMUNITY_SPLASH_PAD = new self('splashpad', 'Splash Pad', self::GROUP_DEFAULT);
		self::$COMMUNITY_GAME_ROOM = new self('gameroom', 'Game Room', self::GROUP_DEFAULT);
		self::$COMMUNITY_THEATER_ROOM = new self('theaterroom', 'Theater Room', self::GROUP_DEFAULT);
		self::$COMMUNITY_ELEVATOR_ACCESS = new self('elevatoraccess', 'Elevator Access', self::GROUP_DEFAULT);
		self::$COMMUNITY_CONTROLLED_ACCESS = new self('controlledaccess', 'Controlled Access', self::GROUP_DEFAULT);
		self::$COMMUNITY_PUBLIC_TRANSIT = new self('publictransit', 'Public Transit', self::GROUP_DEFAULT);
		self::$COMMUNITY_WIFI_ACCESS = new self('wifiaccess', 'WiFi in Common Areas', self::GROUP_DEFAULT);
		self::$COMMUNITY_ATTACHED_GARAGE = new self('attachedgarage', 'Attached Garage', self::GROUP_DEFAULT);
		self::$COMMUNITY_BIKE_LOCKERS_STORAGE = new self('bikelockersstorage', 'Bike Lockers/Storage', self::GROUP_DEFAULT);
		self::$COMMUNITY_GARDEN = new self('garden', 'Community Garden', self::GROUP_DEFAULT);
		self::$COMMUNITY_PARCEL_PENDING = new self('parcelpending', 'Parcel Pending', self::GROUP_DEFAULT);
		self::$COMMUNITY_FIRE_PITS = new self('firepits', 'Fire Pits', self::GROUP_DEFAULT);
		self::$COMMUNITY_INTERNET_CAFE = new self('internetcafe', 'Internet Cafe', self::GROUP_DEFAULT);

		// washerdryer
		self::$WASHER_DRYER_IN_UNIT = new self('washerdryerinunit', 'In Unit', self::GROUP_WASHERDRYER);
		self::$WASHER_DRYER_ON_SITE = new self('washerdryeronsite', 'On-Site', self::GROUP_WASHERDRYER);
		self::$WASHER_DRYER_HOOK_UPS = new self('washerdryerhookups', 'Hook-Ups', self::GROUP_WASHERDRYER);
		self::$WASHER_DRYER_OTHER = new self('washerdryerother', 'Other', self::GROUP_WASHERDRYER);
		self::$WASHER_DRYER_NONE = new self('washerdryernone', 'None', self::GROUP_WASHERDRYER);

		// parking
		self::$PARKING_GARAGE = new self('parkinggarage', 'Garage', self::GROUP_PARKING);
		self::$PARKING_ON_STREET = new self('parkingonstreet', 'On-Street', self::GROUP_PARKING);
		self::$PARKING_DEDICATED_SPOT = new self('parkingdedicatedspot', 'Dedicated Spot', self::GROUP_PARKING);
		self::$PARKING_DRIVEWAY = new self('parkingdriveway', 'Driveway', self::GROUP_PARKING);
		self::$PARKING_COVERED = new self('parkingcovered', 'Covered', self::GROUP_PARKING);
		self::$PARKING_PRIVATE_LOT = new self('parkingprivatelot', 'Private Lot', self::GROUP_PARKING);
		self::$PARKING_CALL_FOR_AVAILABILITY = new self('parkingcallforavailability', 'Call for Availability', self::GROUP_PARKING);
		self::$PARKING_OTHER = new self('parkingother', 'Other', self::GROUP_PARKING);
		self::$PARKING_NONE = new self('parkingnone', 'None', self::GROUP_PARKING);

		// airconditioning
		self::$AIR_CONDITIONING_CENTRAL_AIR = new self('centralair', 'Central Air', self::GROUP_AIRCONDITIONING);
		self::$AIR_CONDITIONING_WINDOW_UNIT = new self('windowunit', 'Window Unit', self::GROUP_AIRCONDITIONING);
		self::$AIR_CONDITIONING_EVAPORATIVE_COOLER = new self('evaporativecooler', 'Evaporative Cooler', self::GROUP_AIRCONDITIONING);
		self::$AIR_CONDITIONING_OTHER = new self('airconditioningother', 'Other', self::GROUP_AIRCONDITIONING);
		self::$AIR_CONDITIONING_NONE = new self('airconditioningnone', 'None', self::GROUP_AIRCONDITIONING);
	}

	public function label(): string
	{
		return $this->label;
	}

	public function group(): string
	{
		return $this->group;
	}
}
