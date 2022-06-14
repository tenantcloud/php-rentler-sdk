<?php

namespace TenantCloud\RentlerSDK\TenantProfiles;

use TenantCloud\RentlerSDK\ProfileShares\CreditReportDTO;
use TenantCloud\RentlerSDK\ProfileShares\CriminalReportDTO;
use TenantCloud\RentlerSDK\ProfileShares\EvictionReportDTO;

interface TenantProfilesApi
{
	public function create(int $tenantId, TenantProfileDTO $data): TenantProfileDTO;

	public function get(int $tenantId): TenantProfileDTO;

	public function update(int $tenantId, TenantProfileDTO $data): TenantProfileDTO;

	public function createVerification(int $tenantId, TenantProfileVerificationDTO $data): TenantProfileVerificationDTO;

	public function getVerification(int $tenantId): TenantProfileVerificationDTO;

	public function createVerificationExam(int $tenantId, TenantProfileVerificationExamDTO $data): TenantProfileVerificationExamDTO;

	public function createVerificationExamAnswer(int $tenantId, int $examId, TenantProfileVerificationAnswerExamDTO $data): TenantProfileVerificationExamDTO;

	public function report(int $tenantId): ScreeningReportDTO;

	public function credit(int $tenantId): CreditReportDTO;

	public function criminal(int $tenantId): CriminalReportDTO;

	public function eviction(int $tenantId): EvictionReportDTO;
}
