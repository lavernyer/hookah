<?php

declare(strict_types=1);

namespace App\Domain\Model\Company;

interface AskedCompanyRepository
{
    public function byId(CompanyId $id): ?AskedCompany;

    public function byExternalId(int $id): ?AskedCompany;

    public function existsByExternalId(int $id): bool;

    public function add(AskedCompany $askedCompany): void;

    public function addMultiple(AskedCompany ...$askedCompanies): void;

    public function update(AskedCompany $askedCompany): void;

    public function delete(AskedCompany $askedCompany): void;
}
