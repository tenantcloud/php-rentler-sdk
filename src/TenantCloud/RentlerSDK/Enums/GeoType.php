<?php

namespace TenantCloud\RentlerSDK\Enums;

use TenantCloud\Standard\Enum\ValueEnum;

class GeoType extends ValueEnum
{
	public static self $POINT;

	public static self $MULTI_POINT;

	public static self $LINE_STRING;

	public static self $MULTI_LINE_STRING;

	public static self $POLYGON;

	public static self $MULTI_POLYGON;

	public static self $GEOMETRY_COLLECTION;

	public static self $FEATURE;

	public static self $FEATURE_COLLECTION;

	protected static function initializeInstances(): void
	{
		self::$POINT = new self('Point');
		self::$MULTI_POINT = new self('MultiPoint');
		self::$LINE_STRING = new self('LineString');
		self::$MULTI_LINE_STRING = new self('MultiLineString');
		self::$POLYGON = new self('Polygon');
		self::$MULTI_POLYGON = new self('MultiPolygon');
		self::$GEOMETRY_COLLECTION = new self('GeometryCollection');
		self::$FEATURE = new self('Feature');
		self::$FEATURE_COLLECTION = new self('FeatureCollection');
	}
}
