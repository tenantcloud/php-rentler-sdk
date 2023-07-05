<?php

namespace TenantCloud\RentlerSDK\Listings;

use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Enums\MediaItemType;

/**
 * @method self          setListingMediaItemId(int $listingMediaItemId)
 * @method int           getListingMediaItemId()
 * @method bool          hasListingMediaItemId()
 * @method self          setMediaItemId(string $mediaItemId)
 * @method string        getMediaItemId()
 * @method bool          hasMediaItemId()
 * @method MediaItemType getType()
 * @method bool          hasType()
 * @method self          setListingId(?int $listingId)
 * @method int|null      getListingId()
 * @method bool          hasListingId()
 * @method self          setTitle(?string $title)
 * @method string|null   getTitle()
 * @method bool          hasTitle()
 * @method self          setUrl(?string $url)
 * @method string|null   getUrl()
 * @method bool          hasUrl()
 * @method self          setCdnUrl(?string $cdnUrl)
 * @method string|null   getCdnUrl()
 * @method bool          hasCdnUrl()
 * @method self          setSmallUrl(?string $smallUrl)
 * @method string|null   getSmallUrl()
 * @method bool          hasSmallUrl()
 * @method self          setMediumUrl(?string $mediumUrl)
 * @method string|null   getMediumUrl()
 * @method bool          hasMediumUrl()
 * @method self          setLargeUrl(?string $largeUrl)
 * @method string|null   getLargeUrl()
 * @method bool          hasLargeUrl()
 */
class MediaItemDTO extends CamelDataTransferObject
{
	protected array $enums = [
		'type' => MediaItemType::class,
	];

	protected array $fields = [
		'listingMediaItemId',
		'mediaItemId',
		'type',
		'listingId',
		'title',
		'url',
		'cdnUrl',
		'smallUrl',
		'mediumUrl',
		'largeUrl',
	];

	/**
	 * @param string|MediaItemType|null $type
	 */
	public function setType($type): self
	{
		if ($type) {
			return $this->set('type', MediaItemType::fromValue($type));
		}

		return $this;
	}
}
