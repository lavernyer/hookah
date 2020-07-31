<?php

declare(strict_types=1);

namespace App\Domain\Model\Company;

interface CompanyRepository
{
    public function byId(CompanyId $id): ?Company;

    public function byAskedCompanyId(CompanyId $id): ?Company;

    public function byExternalId(string $id): ?Company;

    public function existsByAskedCompanyId(CompanyId $id): bool;

    public function add(Company $company): void;

    public function update(Company $company): void;

    public function delete(Company $company): void;
}
