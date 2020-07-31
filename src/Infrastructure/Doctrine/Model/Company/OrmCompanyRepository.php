<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Model\Company;

use App\Domain\Model\Company\Company;
use App\Domain\Model\Company\CompanyId;
use App\Domain\Model\Company\CompanyRepository;
use App\Infrastructure\Doctrine\Model\RepositoryTrait;
use Doctrine\ORM\EntityManagerInterface;

final class OrmCompanyRepository implements CompanyRepository
{
    use RepositoryTrait;

    public function __construct(EntityManagerInterface $entityManager, string $companyClassName)
    {
        $this->em = $entityManager;
        $this->className = $companyClassName;
    }

    public function byId(CompanyId $id): ?Company
    {
        /** @var Company $company */
        $company = $this->getRepository()->findOneBy(['id' => $id->toString()]);

        return $company;
    }

    public function byAskedCompanyId(CompanyId $id): ?Company
    {
        /** @var Company $company */
        $company = $this->getRepository()->findOneBy(['askedCompanyId' => $id->toString()]);

        return $company;
    }

    public function byExternalId(string $id): ?Company
    {
        /** @var Company $company */
        $company = $this->getRepository()->findOneBy(['externalId' => $id]);

        return $company;
    }

    public function existsByAskedCompanyId(CompanyId $id): bool
    {
        $criteria = ['askedCompanyId' => $id];

        return 0 < $this->getRepository()->count($criteria);
    }

    public function add(Company $company): void
    {
        $this->em->persist($company);
        $this->em->flush();
    }

    public function update(Company $company): void
    {
        $this->em->persist($company);
        $this->em->flush();
    }

    public function delete(Company $company): void
    {
        $this->em->remove($company);
        $this->em->flush();
    }
}
