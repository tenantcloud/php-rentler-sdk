<?php

namespace TenantCloud\RentlerSDK\TenantProfiles;

use Carbon\Carbon;
use TenantCloud\DataTransferObjects\CamelDataTransferObject;
use TenantCloud\RentlerSDK\Enums\ExamStatus;

/**
 * @method self                               setExamId(int $examId)
 * @method int                                getExamId()
 * @method bool                               hasExamId()
 * @method self                               setScreeningId(int $screeningId)
 * @method int                                getScreeningId()
 * @method bool                               hasScreeningId()
 * @method self                               setTransUnionExamId(int $transUnionExamId)
 * @method int                                getTransUnionExamId()
 * @method bool                               hasTransUnionExamId()
 * @method ExamStatus                         getStatus()
 * @method bool                               hasStatus()
 * @method Carbon                             getExpirationDateUtc()
 * @method bool                               hasExpirationDateUtc()
 * @method Carbon                             getCreateDateUtc()
 * @method bool                               hasCreateDateUtc()
 * @method Carbon                             getUpdateDateUtc()
 * @method bool                               hasUpdateDateUtc()
 * @method list<TenantProfileExamQuestionDTO> getQuestions()
 * @method bool                               hasQuestions()
 */
class TenantProfileVerificationExamDTO extends CamelDataTransferObject
{
	protected array $enums = [
		'status' => ExamStatus::class,
	];

	protected array $fields = [
		'examId',
		'screeningId',
		'transUnionExamId',
		'status',
		'expirationDateUtc',
		'createDateUtc',
		'updateDateUtc',
		'questions',
	];

	/**
	 * @param string|ExamStatus $status
	 *
	 * @return $this
	 */
	public function setStatus($status): self
	{
		return $this->set('status', ExamStatus::fromValue($status));
	}

	/**
	 * @param Carbon|string $expirationDateUtc
	 */
	public function setExpirationDateUtc($expirationDateUtc): self
	{
		return $this->set('expirationDateUtc', Carbon::parse($expirationDateUtc));
	}

	/**
	 * @param Carbon|string $createDateUtc
	 */
	public function setCreateDateUtc($createDateUtc): self
	{
		return $this->set('createDateUtc', Carbon::parse($createDateUtc));
	}

	/**
	 * @param Carbon|string $updateDateUtc
	 */
	public function setUpdateDateUtc($updateDateUtc): self
	{
		return $this->set('updateDateUtc', Carbon::parse($updateDateUtc));
	}

	public function setQuestions(array $questions): self
	{
		$result = array_map(static fn ($item) => TenantProfileExamQuestionDTO::from($item), $questions);

		return $this->set('questions', $result);
	}
}
