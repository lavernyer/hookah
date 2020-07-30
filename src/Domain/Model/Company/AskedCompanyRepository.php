<?php

declare(strict_types=1);

namespace App\Domain\Model\Company;

interface AskedCompanyRepository
{
    public function byId(CompanyId $id): ?AskedCompany;

    public function byExternalId(string $id): ?AskedCompany;

    public function add(AskedCompany $askedCompany): void;

    public function update(AskedCompany $askedCompany): void;

    public function delete(AskedCompany $askedCompany): void;
}
