<?php

namespace TenantCloud\RentlerSDK\Fake;

use TenantCloud\RentlerSDK\ProfileShares\CreditReportDTO;
use TenantCloud\RentlerSDK\ProfileShares\CriminalReportDTO;
use TenantCloud\RentlerSDK\ProfileShares\EvictionReportDTO;
use TenantCloud\RentlerSDK\TenantProfiles\ScreeningReportDTO;
use TenantCloud\RentlerSDK\TenantProfiles\TenantProfileDTO;
use TenantCloud\RentlerSDK\TenantProfiles\TenantProfilesApi;
use TenantCloud\RentlerSDK\TenantProfiles\TenantProfileVerificationAnswerExamDTO;
use TenantCloud\RentlerSDK\TenantProfiles\TenantProfileVerificationDTO;
use TenantCloud\RentlerSDK\TenantProfiles\TenantProfileVerificationExamDTO;

class FakeTenantProfilesApi implements TenantProfilesApi
{
	public const FAKE_TENANT_PROFILE = [
		'firstName'        => 'string',
		'lastName'         => 'string',
		'phone'            => 'string',
		'email'            => 'string',
		'doesSmoke'        => true,
		'isMilitary'       => true,
		'hasConviction'    => true,
		'convictionText'   => 'string',
		'isCitizen'        => true,
		'citizenText'      => 'string',
		'hasFiledBankrupt' => true,
		'bankruptText'     => 'string',
		'hasRefusedRent'   => true,
		'refusedRentText'  => 'string',
		'hasEviction'      => true,
		'evictionText'     => 'string',
		'incomeSources'    => [
			[
				'source'        => 'string',
				'monthlyIncome' => 0,
				'incomeType'    => 'string',
			],
		],
		'vehicles' => [
			[
				'type'               => 'string',
				'make'               => 'string',
				'model'              => 'string',
				'year'               => 0,
				'color'              => 'string',
				'licensePlateNumber' => 'string',
				'licensePlateState'  => 'string',
			],
		],
		'employers' => [
			[
				'companyName' => 'string',
				'position'    => 'string',
				'isFullTime'  => true,
				'address'     => [
					'address1' => 'string',
					'address2' => 'string',
					'city'     => 'string',
					'state'    => 'string',
					'zip'      => 'string',
				],
				'yearsEmployed' => 0,
				'monthlyIncome' => 0,
				'isCurrent'     => true,
				'companyPhone'  => 'string',
				'startDateUtc'  => '2022-05-19T14:54:30.141Z',
				'endDateUtc'    => '2022-05-19T14:54:30.141Z',
			],
		],
		'dependents' => [
			[
				'firstName'    => 'string',
				'lastName'     => 'string',
				'age'          => 0,
				'relationship' => 'string',
			],
		],
		'rentals' => [
			[
				'address' => [
					'address1' => 'string',
					'address2' => 'string',
					'city'     => 'string',
					'state'    => 'string',
					'zip'      => 'string',
				],
				'type'          => 'string',
				'monthlyRent'   => 0,
				'tenancyLength' => 0,
				'isCurrent'     => true,
				'landlordName'  => 'string',
				'landlordPhone' => 'string',
				'landlordEmail' => 'string',
			],
		],
		'contacts' => [
			[
				'name'         => 'string',
				'relationship' => 'string',
				'phone'        => 'string',
				'email'        => 'string',
			],
		],
		'pets' => [
			[
				'type'       => 'string',
				'name'       => 'string',
				'breed'      => 'string',
				'coloration' => 'string',
				'age'        => 0,
				'weight'     => 0,
				'sex'        => 'string',
				'isNeutered' => true,
				'otherType'  => 'string',
			],
		],
		'id'          => 'string',
		'screeningId' => 0,
	];

	public const FAKE_TENANT_VERIFICATION_ITEM = [
		'address1'                      => 'string',
		'address2'                      => 'string',
		'city'                          => 'string',
		'state'                         => 'st',
		'zip'                           => 'string',
		'email'                         => 'user@example.com',
		'firstName'                     => 'string',
		'middleName'                    => 'string',
		'lastName'                      => 'string',
		'phone'                         => 'string',
		'phoneType'                     => 'Mobile',
		'tenantId'                      => 0,
		'isVerified'                    => true,
		'hasReachedDailyScreeningLimit' => true,
		'dailyScreeningCount'           => 0,
		'screeningId'                   => 0,
		'createDateUtc'                 => '2022-05-19T14:57:09.470Z',
		'updateDateUtc'                 => '2022-05-19T14:57:09.470Z',
	];

	public const FAKE_VERIFICATION_EXAM_ITEM = [
		'examId'            => 0,
		'screeningId'       => 0,
		'transUnionExamId'  => 0,
		'status'            => 'Questioned',
		'expirationDateUtc' => '2022-05-19T14:59:13.944Z',
		'createDateUtc'     => '2022-05-19T14:59:13.944Z',
		'updateDateUtc'     => '2022-05-19T14:59:13.944Z',
		'questions'         => [
			[
				'examQuestionId'   => 'string',
				'examQuestionText' => 'string',
				'choices'          => [
					[
						'examChoiceId'   => 'string',
						'examChoiceText' => 'string',
					],
				],
			],
		],
	];

	public const FAKE_REPORT_ITEM = [
		'status'              => 'IdentityVerificationPending',
		'daysUntilExpiration' => 0,
		'credit'              => FakeProfileSharesApi::PROFILE_SHARE_CREDIT_ITEM,
		'criminal'            => FakeProfileSharesApi::PROFILE_SHARE_CRIMINAL_ITEM,
		'eviction'            => FakeProfileSharesApi::PROFILE_SHARE_EVICTION_ITEM,
	];

	public function create(int $tenantId, TenantProfileDTO $data): TenantProfileDTO
	{
		$item = array_merge(self::FAKE_TENANT_PROFILE, $data->toArray());

		return TenantProfileDTO::from($item);
	}

	public function get(int $tenantId): TenantProfileDTO
	{
		return TenantProfileDTO::from(self::FAKE_TENANT_PROFILE);
	}

	public function update(int $tenantId, TenantProfileDTO $data): TenantProfileDTO
	{
		$item = array_merge(self::FAKE_TENANT_PROFILE, $data->toArray());

		return TenantProfileDTO::from($item);
	}

	public function createVerification(int $tenantId, TenantProfileVerificationDTO $data): TenantProfileVerificationDTO
	{
		$item = array_merge(self::FAKE_TENANT_VERIFICATION_ITEM, $data->toArray());

		return TenantProfileVerificationDTO::from($item);
	}

	public function getVerification(int $tenantId): TenantProfileVerificationDTO
	{
		return TenantProfileVerificationDTO::from(self::FAKE_TENANT_VERIFICATION_ITEM);
	}

	public function createVerificationExam(
		int $tenantId,
		TenantProfileVerificationExamDTO $data
	): TenantProfileVerificationExamDTO {
		return TenantProfileVerificationExamDTO::from(self::FAKE_VERIFICATION_EXAM_ITEM);
	}

	public function createVerificationExamAnswer(
		int $tenantId,
		int $examId,
		TenantProfileVerificationAnswerExamDTO $data
	): TenantProfileVerificationExamDTO {
		return TenantProfileVerificationExamDTO::from(self::FAKE_VERIFICATION_EXAM_ITEM);
	}

	public function report(int $tenantId): ScreeningReportDTO
	{
		return ScreeningReportDTO::from(self::FAKE_REPORT_ITEM);
	}

	public function credit(int $tenantId): CreditReportDTO
	{
		return CreditReportDTO::from(FakeProfileSharesApi::PROFILE_SHARE_CREDIT_ITEM);
	}

	public function criminal(int $tenantId): CriminalReportDTO
	{
		return CriminalReportDTO::from(FakeProfileSharesApi::PROFILE_SHARE_CRIMINAL_ITEM);
	}

	public function eviction(int $tenantId): EvictionReportDTO
	{
		return EvictionReportDTO::from(FakeProfileSharesApi::PROFILE_SHARE_EVICTION_ITEM);
	}
}
