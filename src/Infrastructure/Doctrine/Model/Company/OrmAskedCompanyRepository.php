<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Model\Company;

use App\Domain\Model\Company\AskedCompany;
use App\Domain\Model\Company\AskedCompanyRepository;
use App\Domain\Model\Company\CompanyId;
use App\Infrastructure\Doctrine\Model\RepositoryTrait;
use Doctrine\ORM\EntityManagerInterface;

final class OrmAskedCompanyRepository implements AskedCompanyRepository
{
    use RepositoryTrait;

    public function __construct(EntityManagerInterface $entityManager, string $askedCompanyClassName)
    {
        $this->em = $entityManager;
        $this->className = $askedCompanyClassName;
    }

    public function byId(CompanyId $id): ?AskedCompany
    {
        /** @var AskedCompany $askedCompany */
        $askedCompany = $this->getRepository()->findOneBy(['id' => $id->toString()]);

        return $askedCompany;
    }

    public function byExternalId(int $id): ?AskedCompany
    {
        /** @var AskedCompany $askedCompany */
        $askedCompany = $this->getRepository()->findOneBy(['externalId' => $id]);

        return $askedCompany;
    }

    public function existsByExternalId(int $id): bool
    {
        $criteria = ['externalId' => $id];

        return 0 < $this->getRepository()->count($criteria);
    }

    public function add(AskedCompany $askedCompany): void
    {
        $this->em->persist($askedCompany);
        $this->em->flush();
    }

    public function addMultiple(AskedCompany ...$askedCompanies): void
    {
        array_walk($askedCompanies, function (AskedCompany $askedCompany): void {
            $this->em->persist($askedCompany);
        });

        $this->em->flush();
    }

    public function update(AskedCompany $askedCompany): void
    {
        $this->em->persist($askedCompany);
        $this->em->flush();
    }

    public function delete(AskedCompany $askedCompany): void
    {
        $this->em->remove($askedCompany);
        $this->em->flush();
    }
}
